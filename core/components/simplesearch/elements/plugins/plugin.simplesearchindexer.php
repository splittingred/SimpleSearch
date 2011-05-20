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

$search->loadDriver($scriptProperties);
if (!$search->driver || !($search->driver instanceof SimpleSearchDriverSolr)) return;

/* helper method for missing params in events */
function SimpleSearchGetChildren(&$modx,&$children,$parent) {
    $success = false;
    $kids = $modx->getCollection('modResource',array(
        'parent' => $parent,
    ));
    if (!empty($kids)) {
        foreach ($kids as $kid) {
            $children[] = $kid->toArray();
            SimpleSearchGetChildren($modx,$children,$kid->get('id'));
        }
    }
    return $success;
}

$action = 'index';
$resourcesToIndex = array();
switch ($modx->event->name) {
    case 'OnDocFormSave':
        $action = 'index';
        $resourceArray = $scriptProperties['resource']->toArray();
        unset($resourceArray['ta'],$resourceArray['action'],$resourceArray['tiny_toggle'],$resourceArray['HTTP_MODAUTH'],$resourceArray['modx-ab-stay'],$resourceArray['resource_groups']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case 'OnDocPublished':
        $action = 'index';
        $resourceArray = $scriptProperties['resource']->toArray();
        unset($resourceArray['ta'],$resourceArray['action'],$resourceArray['tiny_toggle'],$resourceArray['HTTP_MODAUTH'],$resourceArray['modx-ab-stay'],$resourceArray['resource_groups']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case 'OnDocUnpublished':
    case 'OnDocUnPublished':
        $action = 'removeIndex';
        $resourceArray = $scriptProperties['resource']->toArray();
        unset($resourceArray['ta'],$resourceArray['action'],$resourceArray['tiny_toggle'],$resourceArray['HTTP_MODAUTH'],$resourceArray['modx-ab-stay'],$resourceArray['resource_groups']);
        $resourcesToIndex[] = $resourceArray;
        break;
    case 'OnResourceDuplicate':
        $action = 'index';
        $resourcesToIndex[] = $newResource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$newResource->get('id'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
    case 'OnResourceDelete':
        $action = 'removeIndex';
        $resourcesToIndex[] = $resource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$resource->get('id'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
    case 'OnResourceUndelete':
        $action = 'index';
        $resourcesToIndex[] = $resource->toArray();
        $children = array();
        SimpleSearchGetChildren($modx,$children,$resource->get('id'));
        foreach ($children as $child) {
            $resourcesToIndex[] = $child;
        }
        break;
}

foreach ($resourcesToIndex as $resourceArray) {
    if (!empty($resourceArray['id'])) {
        if ($action == 'index') {
            $search->driver->index($resourceArray);
        } else if ($action == 'removeIndex') {
            $search->driver->removeIndex($resourceArray['id']);
        }
    }
}
return;