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
 * SimpleSearchIndexAll snippet, used for indexing all resources with alternate search drivers
 *
 * @package simplesearch
 */
require_once $modx->getOption('sisea.core_path',null,$modx->getOption('core_path').'components/simplesearch/').'model/simplesearch/simplesearch.class.php';
$search = new SimpleSearch($modx,$scriptProperties);
$search->loadDriver($scriptProperties);

$memoryLimit = $modx->getOption('memory_limit',$scriptProperties,'512M');
@ini_set('memory_limit',$memoryLimit);
@set_time_limit(0);

$includeTVs = $modx->getOption('includeTVs',$scriptProperties,true);
$processTVs = $modx->getOption('processTVs',$scriptProperties,true);

/* build query */
$c = $modx->newQuery('modResource');
$c->where(array(
    'searchable' => true,
    'deleted' => false,
    'published' => true,
));
$c->sortby('id','ASC');
$resources = $modx->getIterator('modResource',$c);

$i = 0;
foreach ($resources as $resource) {
    $resourceArray = $resource->toArray();
    $templateVars =& $resource->getMany('TemplateVars');
    if (!empty($templateVars) && $includeTVs) {
        foreach ($templateVars as $tvId => $templateVar) {
            $resourceArray[$templateVar->get('name')] = !empty($processTVs) ? $templateVar->renderOutput($resource->get('id')) : $templateVar->get('value');
        }
    }

    if ($search->driver->index($resourceArray,false)) {
        $modx->log(modX::LOG_LEVEL_INFO,'[SimpleSearch] Indexing Resource: '.$resourceArray['pagetitle']);
        $i++;
    }
}

return $modx->lexicon('sisea.index_finished',array('total' => $i));