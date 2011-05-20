<?php
require_once dirname(__FILE__) . '/simplesearchdriver.class.php';
class SimpleSearchDriverSolr extends SimpleSearchDriver {
    private $_connectionOptions = array();
    public $client;

    public function initialize() {
        $this->_connectionOptions = array(
            'hostname' => $this->modx->getOption('simplesearch.solr.hostname',null,'127.0.0.1'),
            'port' => $this->modx->getOption('simplesearch.solr.port',null,'8983'),
            'path' => $this->modx->getOption('simplesearch.solr.path',null,''),
            'login' => $this->modx->getOption('simplesearch.solr.username',null,''),
            'password' => $this->modx->getOption('simplesearch.solr.password',null,''),
            'timeout' => $this->modx->getOption('simplesearch.solr.timeout',null,30),
            'secure' => $this->modx->getOption('simplesearch.solr.ssl',null,false),
            'ssl_cert' => $this->modx->getOption('simplesearch.solr.ssl_cert',null,''),
            'ssl_key' => $this->modx->getOption('simplesearch.solr.ssl_key',null,''),
            'ssl_keypassword' => $this->modx->getOption('simplesearch.solr.ssl_keypassword',null,''),
            'ssl_cainfo' => $this->modx->getOption('simplesearch.solr.ssl_cainfo',null,''),
            'ssl_capath' => $this->modx->getOption('simplesearch.solr.ssl_capath',null,''),
            'proxy_host' => $this->modx->getOption('simplesearch.solr.proxy_host',null,''),
            'proxy_port' => $this->modx->getOption('simplesearch.solr.proxy_port',null,''),
            'proxy_login' => $this->modx->getOption('simplesearch.solr.proxy_username',null,''),
            'proxy_password' => $this->modx->getOption('simplesearch.solr.proxy_password',null,''),
        );

        try {
            $this->client = new SolrClient($this->_connectionOptions);
        } catch (Exception $e) {
            $this->modx->log(xPDO::LOG_LEVEL_ERROR,'Error connecting to Solr server: '.$e->getMessage());
        }
/*
        $this->removeIndex(1);
        $this->removeIndex(2);
*/
        /*
        $this->index(array(
            'id' => 1,
            'pagetitle' => 'Home',
            'content' => '<p>Welcome to the Test home page.</p>',
            'context_key' => 'web',
            'published' => true,
            'searchable' => true,
            'cacheable' => true,
            'deleted' => false,
        ));
        $this->index(array(
            'id' => 2,
            'pagetitle' => 'Another Test Page',
            'content' => '<p>Testing the Solr search.</p>',
            'context_key' => 'web',
            'published' => true,
            'searchable' => true,
            'cacheable' => true,
            'deleted' => false,
        ));*/
    }

    public function search($string,array $scriptProperties = array()) {
        $oldLogTarget = $this->modx->getLogTarget();
        $this->modx->setLogTarget('ECHO');

        $query = new SolrQuery();
        $query->setQuery($string);

    	/* set limit */
        $perPage = $this->modx->getOption('perPage',$scriptProperties,10);
    	if (!empty($perPage)) {
            $offset = $this->modx->getOption('start',$scriptProperties,0);
            $offsetIndex = $this->modx->getOption('offsetIndex',$scriptProperties,'sisea_offset');
            if (isset($_REQUEST[$offsetIndex])) $offset = (int)$_REQUEST[$offsetIndex];
            $query->setStart($offset);
            $query->setRows($perPage);
    	}

        /* add fields to search */
    	$fields = $this->modx->getFields('modResource');
        foreach ($fields as $fieldName => $default) {
            $query->addField($fieldName);
        }

        /* handle hidemenu option */
        $hideMenu = $this->modx->getOption('hideMenu',$scriptProperties,2);
        if ($hideMenu != 2) {
            $query->addFilterQuery('hidemenu:'.($hideMenu ? 1 : 0));
        }

        /* handle contexts */
        $contexts = $this->modx->getOption('contexts',$scriptProperties,'');
        $contexts = !empty($contexts) ? $contexts : $this->modx->context->get('key');
        $contexts = implode(' ',explode(',',$contexts));
    	$query->addFilterQuery('context_key:('.$contexts.')');

        /* handle restrict search to these IDs */
        $ids = $this->modx->getOption('ids',$scriptProperties,'');
    	if (!empty($ids)) {
            $idType = $this->modx->getOption('idType',$this->config,'parents');
            $depth = $this->modx->getOption('depth',$this->config,10);
            $ids = $this->processIds($ids,$idType,$depth);
            $query->addFilterQuery('id:('.implode(' ',$ids).')');
        }
        /* handle exclude IDs from search */
        $exclude = $this->modx->getOption('exclude',$scriptProperties,'');
        if (!empty($exclude)) {
            $exclude = $this->cleanIds($exclude);
            $exclude = implode(' ',explode(',', $exclude));
            $query->addFilterQuery('-id:('.$exclude.')');
        }
        /* basic always-on conditions */
        $query->addFilterQuery('published:1');
        $query->addFilterQuery('searchable:1');
        $query->addFilterQuery('deleted:0');

        /* add conditions */
        /*
        foreach ($conditions as $k => $v) {
            $query->addFilterQuery($k.':'.$v);
        }*/

        $response = array(
            'total' => 0,
            'start' => !empty($offset) ? $offset : 0,
            'limit' => $perPage,
            'status' => 0,
            'query_time' => 0,
            'results' => array(),
        );
        try {
            $queryResponse = $this->client->query($query);
            $responseObject = $queryResponse->getResponse();
            if ($responseObject) {
                $response['total'] = $responseObject->response->numFound;
                $response['query_time'] = $responseObject->responseHeader->QTime;
                $response['status'] = $responseObject->responseHeader->status;
                $response['results'] = array();
                if (!empty($responseObject->response->docs)) {
                    foreach ($responseObject->response->docs as $doc) {
                        $d = array();
                        foreach ($doc as $k => $v) {
                            if ($k == 'createdon') {
                                //$v = strftime($this->discuss->dateFormat,strtotime($v));
                            }
                            $d[$k] = $v;
                        }
                        $response['results'][] = $d;
                    }
                }
            }
        } catch (Exception $e) {
            $this->modx->log(xPDO::LOG_LEVEL_ERROR,'Error running query on Solr server: '.$e->getMessage());
        }
        //var_dump($response); die();

        $this->modx->setLogTarget($oldLogTarget);
        return $response;
    }

    public function index(array $fields = array()) {
        if (isset($fields['searchable']) && empty($fields['searchable'])) return false;
        if (isset($fields['published']) && empty($fields['published'])) return false;
        if (isset($fields['deleted']) && !empty($fields['deleted'])) return false;

        $document = new SolrInputDocument();
        $dateFields = array('createdon','editedon','deletedon','publishedon');
        foreach ($fields as $fieldName => $value) {
            if (is_string($fieldName) && !is_array($value) && !is_object($value)) {
                if (in_array($fieldName,$dateFields)) {
                    $value = ''.strftime('%Y-%m-%dT%H:%M:%SZ',strtotime($value));
                    $fields[$fieldName] = $value;
                }
                $document->addField($fieldName,$value);
            }
        }
        $this->modx->log(modX::LOG_LEVEL_DEBUG,'[SimpleSearch] Indexing Resource: '.print_r($fields,true));
        $response = false;
        try {
            $response = $this->client->addDocument($document);
        } catch (Exception $e) {
            $this->modx->log(xPDO::LOG_LEVEL_ERROR,'Error adding Document to index on Solr server: '.$e->getMessage());
        }
        $this->commit();
        return $response;
    }

    public function removeIndex($id) {
        $this->modx->log(modX::LOG_LEVEL_DEBUG,'[SimpleSearch] Removing Resource From Index: '.$id);
        $this->client->deleteById($id);
        $this->commit();
    }

    public function commit() {
        try {
            $this->client->commit();
        } catch (Exception $e) {
            $this->modx->log(xPDO::LOG_LEVEL_ERROR,'Error committing query on Solr server: '.$e->getMessage());
        }
    }
}
