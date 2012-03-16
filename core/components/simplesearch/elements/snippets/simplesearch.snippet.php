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
/**
 * SimpleSearch snippet
 *
 * @var modX $modx
 * @var array $scriptProperties
 * @package simplesearch
 */
require_once $modx->getOption('sisea.core_path',null,$modx->getOption('core_path').'components/simplesearch/').'model/simplesearch/simplesearch.class.php';
$search = new SimpleSearch($modx,$scriptProperties);

/* find search index and toplaceholder setting */
$searchIndex = $modx->getOption('searchIndex',$scriptProperties,'search');
$toPlaceholder = $modx->getOption('toPlaceholder',$scriptProperties,false);
$noResultsTpl = $modx->getOption('noResultsTpl',$scriptProperties,'SearchNoResults');

/* get search string */
if (empty($_REQUEST[$searchIndex])) {
    $output = $search->getChunk($noResultsTpl,array(
        'query' => '',
    ));
    return $search->output($output,$toPlaceholder);
}
$searchString = $search->parseSearchString($_REQUEST[$searchIndex]);
if (!$searchString) {
    $output = $search->getChunk($noResultsTpl,array(
        'query' => $searchString,
    ));
    return $search->output($output,$toPlaceholder);
}

/* setup default properties */
$tpl = $modx->getOption('tpl',$scriptProperties,'SearchResult');
$containerTpl = $modx->getOption('containerTpl',$scriptProperties,'SearchResults');
$showExtract = $modx->getOption('showExtract',$scriptProperties,true);
$extractLength = $modx->getOption('extractLength',$scriptProperties,200);
$extractEllipsis = $modx->getOption('extractEllipsis',$scriptProperties,'...');
$highlightResults = $modx->getOption('highlightResults',$scriptProperties,true);
$highlightClass = $modx->getOption('highlightClass',$scriptProperties,'sisea-highlight');
$highlightTag = $modx->getOption('highlightTag',$scriptProperties,'span');
$perPage = $modx->getOption('perPage',$scriptProperties,10);
$pagingSeparator = $modx->getOption('pagingSeparator',$scriptProperties,' | ');
$placeholderPrefix = $modx->getOption('placeholderPrefix',$scriptProperties,'sisea.');
$includeTVs = $modx->getOption('includeTVs',$scriptProperties,'');
$processTVs = $modx->getOption('processTVs',$scriptProperties,'');
$offsetIndex = $modx->getOption('offsetIndex',$scriptProperties,'sisea_offset');
$idx = isset($_REQUEST[$offsetIndex]) ? intval($_REQUEST[$offsetIndex]) + 1 : 1;
$postHooks = $modx->getOption('postHooks',$scriptProperties,'');
$activeFacet = $modx->getOption('facet',$_REQUEST,$modx->getOption('activeFacet',$scriptProperties,'default'));
$activeFacet = $modx->sanitizeString($activeFacet);
$facetLimit = $modx->getOption('facetLimit',$scriptProperties,5);

/* get results */
$response = $search->getSearchResults($searchString,$scriptProperties);
$placeholders = array('query' => $searchString);
$resultsTpl = array('default' => array('results' => array(),'total' => $response['total']));
if (!empty($response['results'])) {
    /* iterate through search results */
    foreach ($response['results'] as $resourceArray) {
        $resourceArray['idx'] = $idx;
        if (empty($resourceArray['link'])) {
            $ctx = !empty($resourceArray['context_key']) ? $resourceArray['context_key'] : $modx->context->get('key');
            $resourceArray['link'] = $modx->makeUrl($resourceArray['id'],$ctx);
        }
        if ($showExtract) {
            $extract = array_pop($search->searchArray);
            $extract = $search->createExtract($resourceArray['content'],$extractLength,$extract,$extractEllipsis);
            /* cleanup extract */
            $extract = strip_tags(preg_replace("#\<!--(.*?)--\>#si",'',$extract));
            $extract = preg_replace("#\[\[(.*?)\]\]#si",'',$extract);
            $extract = str_replace(array('[[',']]'),'',$extract);
            $resourceArray['extract'] = !empty($highlightResults) ? $search->addHighlighting($extract,$highlightClass,$highlightTag) : $extract;
        }
        $resultsTpl['default']['results'][] = $search->getChunk($tpl,$resourceArray);
        $idx++;
    }
}

/* load postHooks to get faceted results */
if (!empty($postHooks)) {
    $limit = !empty($facetLimit) ? $facetLimit : $perPage;
    $search->loadHooks('post');
    $search->postHooks->loadMultiple($postHooks,$response['results'],array(
        'hooks' => $postHooks,
        'search' => $searchString,
        'offset' => !empty($_GET[$offsetIndex]) ? intval($_GET[$offsetIndex]) : 0,
        'limit' => $limit,
        'perPage' => $limit,
    ));
    if (!empty($search->postHooks->facets)) {
        foreach ($search->postHooks->facets as $facetKey => $facetResults) {
            if (empty($resultsTpl[$facetKey])) {
                $resultsTpl[$facetKey] = array();
                $resultsTpl[$facetKey]['total'] = $facetResults['total'];
                $resultsTpl[$facetKey]['results'] = array();
            } else {
                $resultsTpl[$facetKey]['total'] = $resultsTpl[$facetKey]['total'] = $facetResults['total'];
            }

            $idx = !empty($resultsTpl[$facetKey]) ? count($resultsTpl[$facetKey]['results'])+1 : 1;
            foreach ($facetResults['results'] as $r) {
                $r['idx'] = $idx;
                $fTpl = !empty($scriptProperties['tpl'.$facetKey]) ? $scriptProperties['tpl'.$facetKey] : $tpl;
                $resultsTpl[$facetKey]['results'][] = $search->getChunk($fTpl,$r);
                $idx++;
            }
        }
    }
}

/* set faceted results to placeholders for easy result positioning */
$output = array();
foreach ($resultsTpl as $facetKey => $facetResults) {
    $resultSet = implode("\n",$facetResults['results']);
    $placeholders[$facetKey.'.results'] = $resultSet;
    $placeholders[$facetKey.'.total'] = !empty($facetResults['total']) ? $facetResults['total'] : 0;
    $placeholders[$facetKey.'.key'] = $facetKey;
}
$placeholders['results'] = $placeholders[$activeFacet.'.results']; /* set active facet results */
$placeholders['total'] = !empty($resultsTpl[$activeFacet]['total']) ? $resultsTpl[$activeFacet]['total'] : 0;
$placeholders['page'] = isset($_REQUEST[$offsetIndex]) ? ceil(intval($_REQUEST[$offsetIndex]) / $perPage) + 1 : 1;
$placeholders['pageCount'] = !empty($resultsTpl[$activeFacet]['total']) ? ceil($resultsTpl[$activeFacet]['total'] / $perPage) : 1;

if (!empty($response['results'])) {
    /* add results found message */
    $placeholders['resultInfo'] = $modx->lexicon('sisea.results_found',array(
        'count' => $placeholders['total'],
        'text' => !empty($highlightResults) ? $search->addHighlighting($searchString,$highlightClass,$highlightTag) : $searchString,
    ));
    /* if perPage set to >0, add paging */
    if ($perPage > 0) {
        $placeholders['paging'] = $search->getPagination($searchString,$perPage,$pagingSeparator,$placeholders['total']);
    }
}
$placeholders['query'] = $searchString;
$placeholders['facet'] = $activeFacet;

/* output */
$modx->setPlaceholder($placeholderPrefix.'query',$searchString);
$modx->setPlaceholder($placeholderPrefix.'count',$response['total']);
$modx->setPlaceholders($placeholders,$placeholderPrefix);
if (empty($response['results'])) {
    $output = $search->getChunk($noResultsTpl,array(
        'query' => $searchString,
    ));
} else {
    $output = $search->getChunk($containerTpl,$placeholders);
}
return $search->output($output,$toPlaceholder);