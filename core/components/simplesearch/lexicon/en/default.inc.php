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
 * English Default Topic for SimpleSearch
 *
 * @package simplesearch
 * @subpackage lexicon
 * @language en
 */
$_lang['sisea.no_results'] = 'There were no search results for the search "[[+query]]". Please try using more general terms to get more results.';
$_lang['sisea.search'] = 'Search';
$_lang['sisea.results_found'] = '[[+count]] Results found for "[[+text]]"';
$_lang['sisea.result_pages'] = 'Result pages:';
$_lang['sisea.index_finished'] = 'Finished indexing [[+total]] Resources.';

/* Settings */
$_lang['setting_sisea.driver_class'] = 'Search Driver Class';
$_lang['setting_sisea.driver_class_desc'] = 'Change this to use a different search driver. SimpleSearch provides you with SimpleSearchDriverBasic and SimpleSearchDriverSolr (assuming you have a working Solr server).';
$_lang['setting_sisea.driver_class_path'] = 'Search Driver Class Path';
$_lang['setting_sisea.driver_class_path_desc'] = 'Optional. Set this to point to the absolute path where the search driver_class can be found. Leave blank to use the default driver directory.';
$_lang['setting_sisea.driver_db_specific'] = 'Search Driver Database Specificity';
$_lang['setting_sisea.driver_db_specific_desc'] = 'Set this to Yes if the search driver you are using uses derivative classes for different SQL drivers. (SQL searches will be Yes, Solr and other index-based searches will be No.)';

/* solr settings */
$_lang['setting_sisea.solr.hostname'] = 'Solr Hostname';
$_lang['setting_sisea.solr.hostname_desc'] = 'The hostname for the Solr server.';
$_lang['setting_sisea.solr.port'] = 'Solr Port';
$_lang['setting_sisea.solr.port_desc'] = 'The port number for the Solr server.';
$_lang['setting_sisea.solr.path'] = 'Solr Path';
$_lang['setting_sisea.solr.path_desc'] = 'The absolute path to Solr. If you are running multicore, this will most likely look like: solr/corename';
$_lang['setting_sisea.solr.username'] = 'Solr Username';
$_lang['setting_sisea.solr.username_desc'] = 'The username used for HTTP Authentication, if any.';
$_lang['setting_sisea.solr.password'] = 'Solr Password';
$_lang['setting_sisea.solr.password_desc'] = 'The HTTP Authentication password, if any.';
$_lang['setting_sisea.solr.proxy_host'] = 'Solr Proxy Hostname';
$_lang['setting_sisea.solr.proxy_host_desc'] = 'The hostname for the proxy server to Solr, if any.';
$_lang['setting_sisea.solr.proxy_port'] = 'Solr Proxy Port';
$_lang['setting_sisea.solr.proxy_port_desc'] = 'The port number for the proxy server to Solr, if any.';
$_lang['setting_sisea.solr.proxy_username'] = 'Solr Proxy Username';
$_lang['setting_sisea.solr.proxy_username_desc'] = 'The username for the proxy server to Solr, if any.';
$_lang['setting_sisea.solr.proxy_password'] = 'Solr Proxy Password';
$_lang['setting_sisea.solr.proxy_password_desc'] = 'The password for the proxy server to Solr, if any.';
$_lang['setting_sisea.solr.timeout'] = 'Solr Request Timeout';
$_lang['setting_sisea.solr.timeout_desc'] = 'This is maximum time in seconds allowed for the http data transfer operation to Solr.';
$_lang['setting_sisea.solr.ssl'] = 'Solr Use SSL';
$_lang['setting_sisea.solr.ssl_desc'] = 'If Yes, will connect to Solr via SSL.';
$_lang['setting_sisea.solr.ssl_cert'] = 'Solr SSL Cert';
$_lang['setting_sisea.solr.ssl_cert_desc'] = 'File name to a PEM-formatted file containing the private key + private certificate (concatenated in that order)';
$_lang['setting_sisea.solr.ssl_key'] = 'Solr SSL Key';
$_lang['setting_sisea.solr.ssl_key_desc'] = 'File name to a PEM-formatted private key file only.';
$_lang['setting_sisea.solr.ssl_keypassword'] = 'Solr SSL Key Password';
$_lang['setting_sisea.solr.ssl_keypassword_desc'] = 'Password for private key for SSL key.';
$_lang['setting_sisea.solr.ssl_cainfo'] = 'Solr SSL CA Certificates';
$_lang['setting_sisea.solr.ssl_cainfo_desc'] = 'Name of file holding one or more CA certificates to verify peer with';
$_lang['setting_sisea.solr.ssl_capath'] = 'Solr SSL CA Certificate Path';
$_lang['setting_sisea.solr.ssl_capath_desc'] = 'Name of directory holding multiple CA certificates to verify peer with.';
