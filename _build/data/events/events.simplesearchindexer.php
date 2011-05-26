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
 * Adds events to SimpleSearchIndexer plugin
 *
 * @package simplesearch
 * @subpackage build
 */
$events = array();

$events['OnDocFormSave']= $modx->newObject('modPluginEvent');
$events['OnDocFormSave']->fromArray(array(
    'event' => 'OnDocFormSave',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnDocPublished']= $modx->newObject('modPluginEvent');
$events['OnDocPublished']->fromArray(array(
    'event' => 'OnDocPublished',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnDocUnPublished']= $modx->newObject('modPluginEvent');
$events['OnDocUnPublished']->fromArray(array(
    'event' => 'OnDocUnPublished',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnResourceDuplicate']= $modx->newObject('modPluginEvent');
$events['OnResourceDuplicate']->fromArray(array(
    'event' => 'OnResourceDuplicate',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnResourceDelete']= $modx->newObject('modPluginEvent');
$events['OnResourceDelete']->fromArray(array(
    'event' => 'OnResourceDelete',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

$events['OnResourceUndelete']= $modx->newObject('modPluginEvent');
$events['OnResourceUndelete']->fromArray(array(
    'event' => 'OnResourceUndelete',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

return $events;