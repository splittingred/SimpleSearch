<?php

/**
 * Loads system settings
 *
 * @package simplesearch
 * @subpackage build
 */
$settings = array();

$settings['sisea.driver_class']= $modx->newObject('modSystemSetting');
$settings['sisea.driver_class']->fromArray(array(
    'key' => 'sisea.driver_class',
    'value' => 'SimpleSearchDriverBasic',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Drivers',
),'',true,true);

$settings['sisea.driver_class_path']= $modx->newObject('modSystemSetting');
$settings['sisea.driver_class_path']->fromArray(array(
    'key' => 'sisea.driver_class_path',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Drivers',
),'',true,true);

$settings['sisea.driver_db_specific']= $modx->newObject('modSystemSetting');
$settings['sisea.driver_db_specific']->fromArray(array(
    'key' => 'sisea.driver_db_specific',
    'value' => true,
    'xtype' => 'combo-boolean',
    'namespace' => 'sisea',
    'area' => 'Drivers',
),'',true,true);

/* Solr Settings */
$settings['sisea.solr.hostname']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.hostname']->fromArray(array(
    'key' => 'sisea.solr.hostname',
    'value' => '127.0.0.1',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.port']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.port']->fromArray(array(
    'key' => 'sisea.solr.port',
    'value' => '8983',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.path']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.path']->fromArray(array(
    'key' => 'sisea.solr.path',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.username']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.username']->fromArray(array(
    'key' => 'sisea.solr.username',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.password']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.password']->fromArray(array(
    'key' => 'sisea.solr.password',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.timeout']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.timeout']->fromArray(array(
    'key' => 'sisea.solr.',
    'value' => 30,
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.ssl']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.ssl']->fromArray(array(
    'key' => 'sisea.solr.ssl',
    'value' => false,
    'xtype' => 'combo-boolean',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.ssl_cert']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.ssl_cert']->fromArray(array(
    'key' => 'sisea.solr.ssl_cert',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.ssl_key']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.ssl_key']->fromArray(array(
    'key' => 'sisea.solr.ssl_key',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.ssl_keypassword']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.ssl_keypassword']->fromArray(array(
    'key' => 'sisea.solr.ssl_keypassword',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.ssl_cainfo']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.ssl_cainfo']->fromArray(array(
    'key' => 'sisea.solr.ssl_cainfo',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.ssl_capath']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.ssl_capath']->fromArray(array(
    'key' => 'sisea.solr.ssl_capath',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.proxy_host']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.proxy_host']->fromArray(array(
    'key' => 'sisea.solr.proxy_host',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.proxy_port']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.proxy_port']->fromArray(array(
    'key' => 'sisea.solr.proxy_port',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.proxy_username']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.proxy_username']->fromArray(array(
    'key' => 'sisea.solr.proxy_username',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);

$settings['sisea.solr.proxy_password']= $modx->newObject('modSystemSetting');
$settings['sisea.solr.proxy_password']->fromArray(array(
    'key' => 'sisea.solr.proxy_password',
    'value' => '',
    'xtype' => 'textfield',
    'namespace' => 'sisea',
    'area' => 'Solr',
),'',true,true);



return $settings;