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
    'snippet' => getSnippetContent($sources['elements'].'snippets/simplesearch.snippet.php'),
),'',true,true);
$properties = include $sources['properties'].'properties.simplesearch.php';
$snippets[1]->setProperties($properties);
unset($properties);

$snippets[2]= $modx->newObject('modSnippet');
$snippets[2]->fromArray(array(
    'id' => 2,
    'name' => 'SimpleSearchForm',
    'description' => '',
    'snippet' => getSnippetContent($sources['elements'].'snippets/simplesearchform.snippet.php'),
),'',true,true);
$properties = include $sources['properties'].'properties.simplesearchform.php';
$snippets[2]->setProperties($properties);
unset($properties);

$snippets[3]= $modx->newObject('modSnippet');
$snippets[3]->fromArray(array(
    'id' => 3,
    'name' => 'SimpleSearchIndexAll',
    'description' => '',
    'snippet' => getSnippetContent($sources['elements'].'snippets/simplesearchindexall.snippet.php'),
),'',true,true);
unset($properties);

return $snippets;