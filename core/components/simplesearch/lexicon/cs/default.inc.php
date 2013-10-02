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
 * Czech Default Topic for SimpleSearch
 *
 * @package simplesearch
 * @subpackage lexicon
 * @language cs
 */
$_lang['sisea.no_results'] = 'Pro hledaný text "[[+query]]" nebyl nalezen žádný výsledek. Použijte, prosím, obecnější text pro hledání.';
$_lang['sisea.search'] = 'Hledat';
$_lang['sisea.results_found'] = '[[+count]] výskytů nalezeno pro "[[+text]]"';
$_lang['sisea.result_pages'] = 'Stránky výsledků hledání: ';
$_lang['sisea.index_finished'] = 'Dokončeno indexování [[+total]] dokumentů.';

/* Settings */
$_lang['setting_sisea.driver_class'] = 'Vyhledávací třída';
$_lang['setting_sisea.driver_class_desc'] = 'Změňte tento záznam pro použití jiného vyhledávacího jádra. SimpleSearch s sebou přináší  SimpleSearchDriverBasic a SimpleSearchDriverSolr (Očekává přístup k Solr serveru).';
$_lang['setting_sisea.driver_class_path'] = 'Cesta vyhledávací třídy';
$_lang['setting_sisea.driver_class_path_desc'] = 'Volitelně. Nastavte tento záznam, aby obsahoval část absolutní cesty kde je search driver_class umístěn. Nechte prázdné, pokud se má použít výchozí adresář třídy.';
$_lang['setting_sisea.driver_db_specific'] = 'Specifická nastavení vyhledávací třídy';
$_lang['setting_sisea.driver_db_specific_desc'] = 'Natsavte na Ano, pokud vyhledávací třída kterou používáte očekává odvozené třídy pro různé SQL ovladače. (SQL vyhledávání by mělo býtYes, Solr a jiná indexovací vyhledávání by měla být Ne.)';

/* solr settings */
$_lang['setting_sisea.solr.hostname'] = 'Solr hostname';
$_lang['setting_sisea.solr.hostname_desc'] = 'Hostname Solr serveru.';
$_lang['setting_sisea.solr.port'] = 'Solr port';
$_lang['setting_sisea.solr.port_desc'] = 'Číslo portu Solr serveru.';
$_lang['setting_sisea.solr.path'] = 'Solr cesta';
$_lang['setting_sisea.solr.path_desc'] = 'Absolutní cesta k Solr. Pokud používáte multicore, bude to nejspíše vypadat takto: solr/corename';
$_lang['setting_sisea.solr.username'] = 'Solr jméno uživatele';
$_lang['setting_sisea.solr.username_desc'] = 'Jméno uživatele pro HTTP authentizaci (pokud je zapnuta).';
$_lang['setting_sisea.solr.password'] = 'Solr heslo';
$_lang['setting_sisea.solr.password_desc'] = 'Heslo HTTP authentizace (pokud je zapnuta).';
$_lang['setting_sisea.solr.proxy_host'] = 'Solr Proxy hostname';
$_lang['setting_sisea.solr.proxy_host_desc'] = 'Hostname proxy serveru pro Solr (pokud je).';
$_lang['setting_sisea.solr.proxy_port'] = 'Solr Proxy port';
$_lang['setting_sisea.solr.proxy_port_desc'] = 'Číslo portu proxy server pro Solr (pokud je).';
$_lang['setting_sisea.solr.proxy_username'] = 'Solr proxy jméno uživatele';
$_lang['setting_sisea.solr.proxy_username_desc'] = 'Jméno uživatele proxy serveru pro Solr (pokud je).';
$_lang['setting_sisea.solr.proxy_password'] = 'Solr Proxy heslo';
$_lang['setting_sisea.solr.proxy_password_desc'] = 'Heslo proxy serveru pro Solr (pokud je).';
$_lang['setting_sisea.solr.timeout'] = 'Časový limit Solr požadavků';
$_lang['setting_sisea.solr.timeout_desc'] = 'Maximální čas v sekundách pro http data přenášená k Solr.';
$_lang['setting_sisea.solr.ssl'] = 'Solr používá SSL';
$_lang['setting_sisea.solr.ssl_desc'] = 'Pokud ano, připojení na Solr je pomocí SSL.';
$_lang['setting_sisea.solr.ssl_cert'] = 'Solr SSL certifikát';
$_lang['setting_sisea.solr.ssl_cert_desc'] = 'Název souboru s PEM souborem obsahujícím privátní klíč a certifikát (sloučené v tomto pořadí)';
$_lang['setting_sisea.solr.ssl_key'] = 'Solr SSL klíč';
$_lang['setting_sisea.solr.ssl_key_desc'] = 'Název souboru s PEM souborem obsahujícím pouze privátní klíč.';
$_lang['setting_sisea.solr.ssl_keypassword'] = 'Heslo k Solr SSL klíči';
$_lang['setting_sisea.solr.ssl_keypassword_desc'] = 'Heslo k privátnímu klíči pro SSL klíč.';
$_lang['setting_sisea.solr.ssl_cainfo'] = 'Solr SSL CA certifikát';
$_lang['setting_sisea.solr.ssl_cainfo_desc'] = 'Jméno souboru obsahujícího jeden nebo více CA certifikátů pro ověření';
$_lang['setting_sisea.solr.ssl_capath'] = 'Cesta k Solr SSL CA certifkátu';
$_lang['setting_sisea.solr.ssl_capath_desc'] = 'Jméno adresáře obsahujícího více CA certifikátů pro ověření.';
