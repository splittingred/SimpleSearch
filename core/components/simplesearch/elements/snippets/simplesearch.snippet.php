<?php
/**
 * SimpleSearch
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
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
 * @package simplesearch
 */
require_once $modx->getOption('sisea.core_path',null,$modx->getOption('core_path').'components/simplesearch/').'model/simplesearch/simplesearch.class.php';
$search = new SimpleSearch($modx,$scriptProperties);

/* find search index and toplaceholder setting */
$searchIndex = $modx->getOption('searchIndex',$scriptProperties,'search');
$toPlaceholder = $modx->getOption('toPlaceholder',$scriptProperties,false);

/* get search string */
if (empty($_REQUEST[$searchIndex])) return $search->output($modx->lexicon('sisea.no_results'),$toPlaceholder);
$searchString = $search->parseSearchString($_REQUEST[$searchIndex]);
if (!$searchString) return $search->output($modx->lexicon('sisea.no_results'),$toPlaceholder);

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
$idx = isset($_REQUEST[$offsetIndex]) ? intval($_REQUEST[$offsetIndex]) + 1 : 1;

/* get results */
$results = $search->getSearchResults($searchString,$scriptProperties);
if (empty($results)) return $search->output($modx->lexicon('sisea.no_results'),$toPlaceholder);

/* iterate through search results */
$placeholders = array();
$resultsTpl = '';
$offsetIndex = $modx->getOption('offsetIndex',$scriptProperties,'sisea_offset');
$idx = (isset($_REQUEST[$offsetIndex]))? intval($_REQUEST[$offsetIndex])+1 : 1;
foreach ($results as $resource) {
    $resourceArray = $resource->toArray();
    $resourceArray['idx'] = $idx;
    if ($showExtract) {
        $extract = $search->createExtract($resource->content,$extractLength,$search->searchArray[0],$extractEllipsis);
        $resourceArray['extract'] = !empty($highlightResults) ? $search->addHighlighting($extract,$highlightClass,$highlightTag) : $extract;
    }
    if (!empty($includeTVs)) {
        $templateVars =& $resource->getMany('TemplateVars');
        foreach ($templateVars as $tvId => $templateVar) {
            $resourceArray[$templateVar->get('name')] = !empty($processTVs) ? $templateVar->renderOutput($resource->get('id')) : $templateVar->get('value');
        }
    }
    $resultsTpl .= $search->getChunk($tpl,$resourceArray);
    $idx++;
}
$placeholders['results'] = $resultsTpl;

/* add results found message */
$placeholders['resultInfo'] = $modx->lexicon('sisea.results_found',array(
    'count' => $search->searchResultsCount,
    'text' => !empty($highlightResults) ? $search->addHighlighting($search->searchString,$highlightClass,$highlightTag) : $search->searchString,
));

/* if perPage set to >0, add paging */
if ($perPage > 0) {
    $placeholders['paging'] = $search->getPagination($perPage,$pagingSeparator);
}

/* output */
$modx->setPlaceholder($placeholderPrefix.'query',$searchString);
$modx->setPlaceholder($placeholderPrefix.'count',$search->searchResultsCount);
$output = $search->getChunk($containerTpl,$placeholders);
return $search->output($output,$toPlaceholder);