<?php
/**
 * SimpleSearch
 *
 * Copyright 2010-11 by Shaun McCormick <shaun+sisea@modx.com>
 *
 * This file is part of SimpleSearch, a simple search component for MODx
 * Revolution. It is loosely based off of AjaxSearch for MODx Evolution by
 * coroico/kylej, minus the ajax.
 *
 * SimpleSearch is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * SimpleSearch is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * SimpleSearch; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package simplesearch
 */
require_once dirname(__FILE__) . '/simplesearchdriver.class.php';
/**
 * Standard sql-based search driver for SimpleSearch
 * 
 * @package simplesearch
 */
class SimpleSearchDriverBasic extends SimpleSearchDriver {
    public $searchString;

    public function initialize() { return true; }
    public function index(array $fields) { return true; }
    public function removeIndex($id) { return true; }

    public function search($str,array $scriptProperties = array()) {
        if (!empty($str)) $this->searchString = strip_tags($this->modx->sanitizeString($str));

        $ids = $this->modx->getOption('ids',$scriptProperties,'');
        $exclude = $this->modx->getOption('exclude',$scriptProperties,'');
        $useAllWords = $this->modx->getOption('useAllWords',$scriptProperties,false);
        $searchStyle = $this->modx->getOption('searchStyle',$scriptProperties,'partial');
        $hideMenu = $this->modx->getOption('hideMenu',$scriptProperties,2);
        $maxWords = $this->modx->getOption('maxWords',$scriptProperties,7);
        $andTerms = $this->modx->getOption('andTerms',$scriptProperties,true);
        $matchWildcard = $this->modx->getOption('matchWildcard',$scriptProperties,true);
        $docFields = explode(',',$this->modx->getOption('docFields',$scriptProperties,'pagetitle,longtitle,alias,description,introtext,content'));

    	$c = $this->modx->newQuery('modResource');
        $c->leftJoin('modTemplateVarResource','TemplateVarResources');

        /* if using customPackages, add here */
        $customPackages = array();
        if (!empty($scriptProperties['customPackages'])) {
            $packages = explode('||',$scriptProperties['customPackages']);
            if (is_array($packages) && !empty($packages)) {
                $searchArray = array(
                    '{core_path}',
                    '{assets_path}',
                    '{base_path}',
                );
                $replacePaths = array(
                    $this->modx->getOption('core_path',null,MODX_CORE_PATH),
                    $this->modx->getOption('assets_path',null,MODX_ASSETS_PATH),
                    $this->modx->getOption('base_path',null,MODX_BASE_PATH),
                );
                foreach ($packages as $package) {
                    /* 0: class name, 1: field name(s) (csl), 2: package name, 3: package path, 4: criteria */
                    $package = explode(':',$package);
                    if (!empty($package[4])) {
                        $package[3] = str_replace($searchArray, $replacePaths, $package[3]);
                        $this->modx->addPackage($package[2],$package[3]);
                        $c->leftJoin($package[0],$package[0],$package[4]);
                        $customPackages[] = $package;
                    }
                }
            }
        }

    	/* process conditional clauses */
        $whereGroup=1;
        if ($searchStyle == 'partial' || $this->modx->config['dbtype'] == 'sqlsrv') {
            $wildcard = ($matchWildcard)? '%' : '';
            $whereArray = array();
            if (empty($useAllWords)) {
                $i = 1;
                foreach ($this->search->searchArray as $term) {
                    if ($i > $maxWords) break;
                    $term = $wildcard.$term.$wildcard;
                    foreach ($docFields as $field) {$whereArray[] = array($field.':LIKE', $term,xPDOQuery::SQL_OR,$whereGroup);}
                    $whereArray[] = array('TemplateVarResources.value:LIKE', $term, xPDOQuery::SQL_OR, $whereGroup);
                    if (is_array($customPackages) && !empty($customPackages)) {
                        foreach ($customPackages as $package) {
                            $fields = explode(',',$package[1]);
                            foreach ($fields as $field) {
                                $whereArray[] = array($package[0].'.'.$field.':LIKE', $term, xPDOQuery::SQL_OR, $whereGroup);
                            }
                        }
                    }
                    if ($andTerms) $whereGroup++;
                    $i++;
                }
            } else {
                $term = $wildcard.$this->searchString.$wildcard;
                foreach ($docFields as $field) {$whereArray[] = array($field.':LIKE', $term,xPDOQuery::SQL_OR,$whereGroup);}
                $whereArray[] = array('TemplateVarResources.value:LIKE', $term, xPDOQuery::SQL_OR, $whereGroup);
                if (is_array($customPackages) && !empty($customPackages)) {
                    foreach ($customPackages as $package) {
                        $fields = explode(',',$package[1]);
                        foreach ($fields as $field) {
                            $whereArray[] = array($package[0].'.'.$field.':LIKE', $term, xPDOQuery::SQL_OR, $whereGroup);
                        }
                    }
                }
            }
            $prevWhereGrp=0;
            foreach ($whereArray as $clause) {
                // The following works, but i consider it a hack, and should be fixed. -oori
                $c->where(array($clause[0] => $clause[1]), $clause[2] , null, $clause[3]);
                if ($clause[3] > $prevWhereGrp) $c->andCondition(array('AND:id:!=' => ''),null,$prevWhereGrp); // hack xpdo to prefix the whole thing with AND
                $prevWhereGrp = $clause[3];
                if ($andTerms) $whereGroup++;
            }
            $c->andCondition(array('AND:id:!=' => ''),null,$whereGroup-1); // xpdo hack: pad last condition...

    	} else {
            $fields = $this->modx->getSelectColumns('modResource', '', '', $docFields);
            if (is_array($customPackages) && !empty($customPackages)) {
                foreach ($customPackages as $package) {
                    $fields .= (!empty($fields) ? ',' : '').$this->modx->getSelectColumns($package[0],$package[0],'',explode(',',$package[1]));
                    if (!empty($package[4])) {
                        $c->where($package[4]);
                    }
                }
            }
            $wildcard = ($matchWildcard)? '*' : '';
            $relevancyTerms = array();
            if (empty($useAllWords)) {
                $i = 0;
                foreach ($this->search->searchArray as $term) {
                    if ($i > $maxWords) break;
                    $relevancyTerms[] = $this->modx->quote($term.$wildcard);
                    $i++;
                }
            } else {
                $relevancyTerms[] = $this->modx->quote($str.$wildcard);
            }
            $this->addRelevancyCondition($c, array(
                'class'=> 'modResource',
                'fields'=> $fields,
                'terms'=> $relevancyTerms
            ));
    	}
    	if (!empty($ids)) {
            $idType = $this->modx->getOption('idType',$this->config,'parents');
            $depth = $this->modx->getOption('depth',$this->config,10);
            $ids = $this->processIds($ids,$idType,$depth);
            $f = $this->modx->getSelectColumns('modResource','modResource','',array('id'));
            $c->where(array("{$f}:IN" => $ids),xPDOQuery::SQL_AND,null,$whereGroup);
        }
        if (!empty($exclude)) {
            $exclude = $this->cleanIds($exclude);
            $f = $this->modx->getSelectColumns('modResource','modResource','',array('id'));
            $c->where(array("{$f}:NOT IN" => explode(',', $exclude)),xPDOQuery::SQL_AND,null,2);
        }
    	$c->where(array('published:=' => 1), xPDOQuery::SQL_AND, null, $whereGroup);
    	$c->where(array('searchable:=' => 1), xPDOQuery::SQL_AND, null, $whereGroup);
    	$c->where(array('deleted:=' => 0), xPDOQuery::SQL_AND, null, $whereGroup);

        /* restrict to either this context or specified contexts */
        $ctx = !empty($this->config['contexts']) ? $this->config['contexts'] : $this->modx->context->get('key');
        $f = $this->modx->getSelectColumns('modResource','modResource','',array('context_key'));
    	$c->where(array("{$f}:IN" => explode(',', $ctx)), xPDOQuery::SQL_AND, null, $whereGroup);
        if ($hideMenu != 2) {
            $c->where(array('hidemenu' => $hideMenu == 1 ? true : false));
        }
        $total = $this->modx->getCount('modResource', $c);
        $c->query['distinct'] = 'DISTINCT';

        if (!empty($scriptProperties['sortBy'])) {
            $sortDir = $this->modx->getOption('sortDir',$scriptProperties,'DESC');
            $sortDirs = explode(',',$sortDir);
            $sortBys = explode(',',$scriptProperties['sortBy']);
            $dir = 'desc';
            for ($i=0;$i<count($sortBys);$i++) {
                if (isset($sortDirs[$i])) {
                    $dir= $sortDirs[$i];
                }
                $c->sortby('modResource.'.$sortBys[$i],strtoupper($dir));
            }
        }

    	/* set limit */
        $perPage = $this->modx->getOption('perPage',$this->config,10);
    	if (!empty($perPage)) {
            $offset = $this->modx->getOption('start',$this->config,0);
            $offsetIndex = $this->modx->getOption('offsetIndex',$this->config,'sisea_offset');
            if (isset($_REQUEST[$offsetIndex])) $offset = (int)$_REQUEST[$offsetIndex];
            $c->limit($perPage,$offset);
    	}

        $resources = $this->modx->getCollection('modResource', $c);
        if (empty($scriptProperties['sortBy'])) {
            $resources = $this->sortResults($resources,$scriptProperties);
        }

        $includeTVs = $this->modx->getOption('includeTVs',$scriptProperties,'');
        $processTVs = $this->modx->getOption('processTVs',$scriptProperties,'');
        $list = array();
        /** @var modResource $resource */
        foreach ($resources as $resource) {
            if (!$resource->checkPolicy('list')) continue;
            $resourceArray = $resource->toArray();

            if (!empty($includeTVs)) {
                $templateVars =& $resource->getMany('TemplateVars');
                /** @var modTemplateVar $templateVar */
                foreach ($templateVars as $tvId => $templateVar) {
                    $resourceArray[$templateVar->get('name')] = !empty($processTVs) ? $templateVar->renderOutput($resource->get('id')) : $templateVar->get('value');
                }
            }
            $list[] = $resourceArray;
        }

        return array(
            'total' => $total,
            'results' => $list,
        );
    }

    /**
     * add relevancy search criteria to query
     *
     * @param xPDOQuery $query
     * @param array $options
     * @param string $options['class'] class name (not currently used but may be needed with custom classes)
     * @param string $options['fields'] query-ready list of fields to search for the terms
     * @param array $options['terms'] search terms (will only be one array member if useAllWords parameter is set)
     * @return boolean
     */
    public function addRelevancyCondition(&$query, $options) {
        $class = $this->modx->getOption('class', $options, 'modResource');
        $fields = $this->modx->getOption('fields', $options, '');
        $terms = $this->modx->getOption('terms', $options, array());
        if(!empty($fields)) {
            foreach($terms as $term) {
                $query->where("MATCH ( {$fields} ) AGAINST ( {$term} IN BOOLEAN MODE )");
            }
        }
        return true;
    }
    
}