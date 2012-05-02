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
 * Default properties for SimpleSearch snippet
 * 
 * @package simplesearch
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'sisea.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'SearchResult',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'containerTpl',
        'desc' => 'sisea.containertpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'SearchResults',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'useAllWords',
        'desc' => 'sisea.useallwords_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'maxWords',
        'desc' => 'sisea.maxwords_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 7,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'minChars',
        'desc' => 'sisea.minchars_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 3,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'searchStyle',
        'desc' => 'sisea.searchstyle_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'sisea.partial','value' => 'partial'),
            array('text' => 'sisea.match','value' => 'match'),
        ),
        'value' => 'partial',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'perPage',
        'desc' => 'sisea.perpage_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 10,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'showExtract',
        'desc' => 'sisea.showextract_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'extractLength',
        'desc' => 'sisea.extractlength_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 200,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'extractEllipsis',
        'desc' => 'sisea.extractellipsis_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '...',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'includeTVs',
        'desc' => 'sisea.includetvs_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'processTVs',
        'desc' => 'sisea.processtvs_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'highlightResults',
        'desc' => 'sisea.highlightresults_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'highlightClass',
        'desc' => 'sisea.highlightclass_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'sisea-highlight',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'highlightTag',
        'desc' => 'sisea.highlighttag_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'span',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'pageLimit',
        'desc' => 'sisea.pagelimit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '0',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'pageTpl',
        'desc' => 'sisea.pagetpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'PageLink',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'pageFirstTpl',
        'desc' => 'sisea.pagefirsttpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'pageLastTpl',
        'desc' => 'sisea.pagelasttpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'pagePrevTpl',
        'desc' => 'sisea.pageprevtpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'pageNextTpl',
        'desc' => 'sisea.pagenexttpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'currentPageTpl',
        'desc' => 'sisea.currentpagetpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'CurrentPageLink',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'pagingSeparator',
        'desc' => 'sisea.pagingseparator_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => ' | ',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'ids',
        'desc' => 'sisea.ids_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'idType',
        'desc' => 'sisea.idtype_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'sisea.parents','value' => 'parents'),
            array('text' => 'sisea.documents','value' => 'documents'),
        ),
        'value' => 'parents',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'exclude',
        'desc' => 'sisea.exclude_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'depth',
        'desc' => 'sisea.depth_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 10,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'hideMenu',
        'desc' => 'sisea.hidemenu_desc',
        'type' => 'textfield',
        'options' => array(
            array('text' => 'sisea.hidemenu_visible','value' => 0),
            array('text' => 'sisea.hidemenu_hidden','value' => 1),
            array('text' => 'sisea.hidemenu_both','value' => 2),
        ),
        'value' => 2,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'contexts',
        'desc' => 'sisea.contexts_desc',
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
        'name' => 'offsetIndex',
        'desc' => 'sisea.offsetindex_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'sisea_offset',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'placeholderPrefix',
        'desc' => 'sisea.placeholderprefix_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'sisea.',
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
    array(
        'name' => 'andTerms',
        'desc' => 'sisea.andterms_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'matchWildcard',
        'desc' => 'sisea.matchwildcard_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'docFields',
        'desc' => 'sisea.docfields_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'pagetitle,longtitle,alias,description,introtext,content',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'fieldPotency',
        'desc' => 'sisea.fieldpotency_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'urlScheme',
        'desc' => 'sisea.urlscheme_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'sisea.url_relative','value' => -1),
            array('text' => 'sisea.url_absolute','value' => 'abs'),
            array('text' => 'sisea.url_full','value' => 'full'),
        ),
        'value' => -1,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'postHooks',
        'desc' => 'sisea.posthooks_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'activeFacet',
        'desc' => 'sisea.activefacet_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'default',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'facetLimit',
        'desc' => 'sisea.facetlimit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 5,
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'sortBy',
        'desc' => 'sisea.sortby_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'sisea:properties',
    ),
    array(
        'name' => 'sortDir',
        'desc' => 'sisea.sortdir_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'sisea.ascending','value' => 'ASC'),
            array('text' => 'sisea.descending','value' => 'DESC'),
        ),
        'value' => 'DESC',
        'lexicon' => 'sisea:properties',
    ),
);

return $properties;
