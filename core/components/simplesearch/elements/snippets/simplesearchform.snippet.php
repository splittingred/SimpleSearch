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
 * Show the search form
 *
 * @package simplesearch
 */
require_once $modx->getOption('sisea.core_path',null,$modx->getOption('core_path').'components/simplesearch/').'model/simplesearch/simplesearch.class.php';
$search = new SimpleSearch($modx,$scriptProperties);

/* setup default options */
$tpl = $modx->getOption('tpl',$scriptProperties,'SearchForm');

/* if get value already exists, set it as default */
$searchIndex = $modx->getOption('searchIndex',$scriptProperties,'search');
$searchValue = isset($_POST[$searchIndex]) ? $_POST[$searchIndex] : (isset($_GET[$searchIndex]) ? urldecode($_GET[$searchIndex]) : '');

$placeholders = array(
    'method' => $modx->getOption('method',$scriptProperties,'get'),
    'landing' => $modx->getOption('landing',$scriptProperties,$modx->resource->get('id')),
    'searchValue' => $searchValue,
    'searchIndex' => $searchIndex,
);

$output = $search->getChunk($tpl,$placeholders);
return $search->output($output,$toPlaceholder);
