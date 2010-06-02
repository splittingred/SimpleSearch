<?php
/**
 * Search
 *
 * @package simplesearch
 */
$search = $modx->getService('simplesearch','SimpleSearch',$modx->getOption('sisea.core_path',null,$modx->getOption('core_path').'components/simplesearch/').'model/simplesearch/',$scriptProperties);
if (!($search instanceof SimpleSearch)) return '';

/* setup default properties */
$searchIndex = $modx->getOption('searchIndex',$scriptProperties,'search');

/* get search string */
if (empty($_REQUEST[$searchIndex])) return $modx->lexicon('sisea.no_results');
$searchString = $search->parseSearchString($_REQUEST[$searchIndex]);
if (!$searchString) return $modx->lexicon('sisea.no_results');

/* get results */
$results = $search->getSearchResults($searchString);
if (empty($results)) return $modx->lexicon('sisea.no_results');

$tpl = $modx->getOption('tpl',$scriptProperties,'SearchResult');
$containerTpl = $modx->getOption('containerTpl',$scriptProperties,'SearchResults');
$showExtract = $modx->getOption('showExtract',$scriptProperties,true);
$extractLength = $modx->getOption('extractLength',$scriptProperties,200);
$highlightResults = $modx->getOption('highlightResults',$scriptProperties,true);
$highlightClass = $modx->getOption('highlightClass',$scriptProperties,'sisea-highlight');
$limit = $modx->getOption('limit',$scriptProperties,10);
$pagingSeparator = $modx->getOption('pagingSeparator',$scriptProperties,' | ');

/* iterate through search results */
$resultsTpl = '';
foreach ($results as $resource) {
    $resourceArray = $resource->toArray();
    if ($showExtract) {
        $extract = $search->createExtract($resource->content,$extractLength,$search->searchArray[0]);
        $resourceArray['extract'] = !empty($highlightResults) ? $search->addHighlighting($extract,$highlightClass) : $extract;
    }
    $resultsTpl .= $search->getChunk($tpl,$resourceArray);
}
$resultsArray['resultInfo'] = $modx->lexicon('sisea.results_found',array(
    'count' => $search->searchResultsCount,
    'text' => !empty($highlightResults) ? $search->addHighlighting($search->searchString) : $search->searchString,
));
$resultsArray['results'] = $resultsTpl;
if ($limit > 0) {
    $resultsArray['paging'] = $search->getPagination($limit,$pagingSeparator);
}
return $search->getChunk($containerTpl,$resultsArray);