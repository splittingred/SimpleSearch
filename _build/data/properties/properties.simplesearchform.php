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
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'sisea.tpl_form_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'SearchForm',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'landing',
        'desc' => 'sisea.landing_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'searchIndex',
        'desc' => 'sisea.searchindex_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'search',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'method',
        'desc' => 'sisea.method_desc',
        'type' => 'combo-boolean',
        'options' => array(
            array('text' => 'sisea.get','value' => 'get'),
            array('text' => 'sisea.post','value' => 'post'),
        ),
        'value' => 'get',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'toPlaceholder',
        'desc' => 'sisea.toplaceholder_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
);

return $properties;