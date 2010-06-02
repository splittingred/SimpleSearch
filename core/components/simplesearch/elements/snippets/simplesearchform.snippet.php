<?php
/**
 * Show the search form
 *
 * @package simplesearch
 */
$search = $modx->getService('simplesearch','SimpleSearch',$modx->getOption('sisea.core_path',null,$modx->getOption('core_path').'components/simplesearch/').'model/simplesearch/',$scriptProperties);
if (!($search instanceof SimpleSearch)) return '';

/* setup default options */
$tpl = $modx->getOption('tpl',$scriptProperties,'SearchForm');

/* if get value already exists, set it as default */
$searchIndex = $modx->getOption('searchIndex',$scriptProperties,'search');
$searchValue = isset($_POST[$searchIndex]) ? $_POST[$searchIndex] : (isset($_GET[$searchIndex]) ? urldecode($_GET[$searchIndex]) : '');

$placeholders = array(
    'method' => $modx->getOption('method',$scriptProperties,'GET'),
    'landing' => $modx->getOption('landing',$scriptProperties,$modx->resource->get('id')),
    'searchValue' => $searchValue,
    'searchIndex' => $searchIndex,
);

$output = $search->getChunk($tpl,$placeholders);

/* set to placeholder or output */
$toPlaceholder = $modx->getOption('toPlaceholder',$scriptProperties,false);
if ($toPlaceholder) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return '';
}
return $output;