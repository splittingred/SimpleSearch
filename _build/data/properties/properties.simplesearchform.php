<?php
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
            array('text' => 'sisea.get','value' => 'GET'),
            array('text' => 'sisea.post','value' => 'POST'),
        ),
        'value' => 'GET',
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