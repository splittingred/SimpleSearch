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
function getSnippetContent($filename) {
    $o = file_get_contents($filename);
    $o = str_replace('<?php','',$o);
    $o = str_replace('?>','',$o);
    $o = trim($o);
    return $o;
}

/* Due to a bug in Revo RC-2, lexicon-based properties cannot be done.
 * To workaround this until RC-3, auto-translate them to en here.
 */
function adjustProperties($modx,$properties = array(),$lexiconDir = false) {
    $_lang = array();
    if (empty($lexiconDir)) return $_lang;
    include $lexiconDir.'en/properties.inc.php';

    $newProperties = array();
    foreach ($properties as $property) {
        $property['desc'] = $_lang[$property['desc']];
        unset($property['lexicon']);
        $newProperties[] = $property;
    }
    return $newProperties;
}