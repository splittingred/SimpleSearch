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
 * Show the search form
 *
 * @var modX $modx
 * @var array $scriptProperties
 * @package simplesearch
 */
require_once $modx->getOption('sisea.core_path',null,$modx->getOption('core_path').'components/simplesearch/').'model/simplesearch/simplesearch.class.php';
$search = new SimpleSearch($modx,$scriptProperties);

/* setup default options */
$scriptProperties = array_merge(array(
  'tpl' => 'SearchForm',
  'method' => 'get',
  'searchIndex' => 'search',
  'toPlaceholder' => false,
  'landing' => $modx->resource->get('id'),
), $scriptProperties);

if (empty($scriptProperties['landing'])) {
  $scriptProperties['landing'] = $modx->resource->get('id');
}

/* if get value already exists, set it as default */
$searchValue = isset($_REQUEST[$scriptProperties['searchIndex']]) ? $_REQUEST[$scriptProperties['searchIndex']] : '';
$searchValues = explode(' ', $searchValue);
array_map(array($modx, 'sanitizeString'), $searchValues);
$searchValue = implode(' ', $searchValues);
$placeholders = array(
    'method' => $scriptProperties['method'],
    'landing' => $scriptProperties['landing'],
    'searchValue' => strip_tags(str_replace(array('[',']','"',"'"),array('&#91;','&#93;','&quot;','&apos;'),$searchValue)),
    'searchIndex' => $scriptProperties['searchIndex'],
);

$output = $search->getChunk($scriptProperties['tpl'],$placeholders);
return $search->output($output,$scriptProperties['toPlaceholder']);
