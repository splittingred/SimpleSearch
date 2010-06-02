<?php
/**
 * @package simplesearch
 * @subpackage build
 */
$snippets = array();

/* general snippets */
$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 1,
    'name' => 'SimpleSearch',
    'description' => '',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.simplesearch.php'),
),'',true,true);
$properties = include $sources['properties'].'properties.simplesearch.php';
$snippets[1]->setProperties($properties);
unset($properties);

$snippets[2]= $modx->newObject('modSnippet');
$snippets[2]->fromArray(array(
    'id' => 2,
    'name' => 'SimpleSearchForm',
    'description' => '',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.simplesearchform.php'),
),'',true,true);
$properties = include $sources['properties'].'properties.simplesearchform.php';
$snippets[2]->setProperties($properties);
unset($properties);

return $snippets;