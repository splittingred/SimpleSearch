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
 * English Properties Lexicon Topic for SimpleSearch
 *
 * @package simplesearch
 * @subpackage lexicon
 * @language en
 */
$_lang['sisea.containertpl_desc'] = 'De naam van de chunk dat gebruikt zal worden om alle zoekresultaten, paginering en de boodschap te verpakken.';
$_lang['sisea.contexts_desc'] = 'De contexts om te doorzoeken. Standaard waarde is de huidige context als er geen expliciet wordt vermeld.';
$_lang['sisea.currentpagetpl_desc'] = 'De naam van de chunk om te gebruiken voor de huidige paginering link.';
$_lang['sisea.depth_desc'] = 'Als idtype is ingesteld op parents, de diepte van de bronnen-boom die wordt doorzocht met het opgegeven ID.';
$_lang['sisea.documents'] = 'Documenten';
$_lang['sisea.exclude_desc'] = 'Een door komma\'s gescheiden lijst van bronnen-ID\'s om uit te sluiten uit de zoekresultaten. Bijvoorbeeld: "10,15,19". Dit zorgt ervoor dat de bronnen met de ID\'s "10", "15" of "19" worden uitgesloten.';
$_lang['sisea.extractellipsis_desc'] = 'De gebruikte tekenreeks om resultaten mee te omhullen. Standaard een weglatingsteken (ellipsis).';
$_lang['sisea.extractlength_desc'] = 'Het aantal tekens voor de inhoud extractie van elk zoekresultaat.';
$_lang['sisea.get'] = 'get';
$_lang['sisea.hidemenu_desc'] = 'Wel of geen bronnen weergeven die hidemenu op 0 hebben staan. 0 toont alleen zichtbare bronnen, 1 toont alleen verborgen bronnen, 2 toont beide.';
$_lang['sisea.hidemenu_visible'] = 'Alleen zichtbaar';
$_lang['sisea.hidemenu_hidden'] = 'Alleen verborgen';
$_lang['sisea.hidemenu_both'] = 'Toon alle';
$_lang['sisea.highlightclass_desc'] = 'De CSS class naam toe te voegen aan gemarkeerde termen in de zoekresultaten.';
$_lang['sisea.highlightresults_desc'] = 'Al dan niet de zoekterm in de resultaten te markeren.';
$_lang['sisea.highlighttag_desc'] = 'De html-tag om de gemarkeerde term mee te omhullen in de zoekresultaten.';
$_lang['sisea.ids_desc'] = 'Een door komma\'s gescheiden lijst van ID\'s om de zoekopdracht tot te beperken.';
$_lang['sisea.idtype_desc'] = 'De aard van de beperking voor de ID\'s-parameter. Bij parents, voegt alle ID\'s van de kinderen in de ID\'s-parameter aan de zoekopdracht toe. Bij documents, wordt alleen gebruik gemaakt van de opgegeven ID\'s in de zoekopdracht.';
$_lang['sisea.includetvs_desc'] = 'Geeft aan of TemplateVar-waarden moeten worden opgenomen in de eigenschappen die beschikbaar zijn voor elke bronnen sjabloon. Standaard ingesteld op false.';
$_lang['sisea.landing_desc'] = 'De bron waar vanaf de SimpleSearch snippet wordt aangesproken, waar de resultaten van de zoekopdracht op wordt weergegeven.';
$_lang['sisea.match'] = 'Evenaren';
$_lang['sisea.maxwords_desc'] = 'Het maximum aantal woorden op te nemen in de zoekopdracht. Alleen van toepassing indien useAllWords is uitgeschakeld.';
$_lang['sisea.method_desc'] = 'Zoekopdracht via POST of GET verzenden.';
$_lang['sisea.minchars_desc'] = 'Het minimum aantal tekens om de zoekopdracht te activeren.';
$_lang['sisea.offsetindex_desc'] = 'De naam van de REQUEST-parameter te gebruiken voor de paginering offset.';
$_lang['sisea.pagelimit_desc'] = 'Het maximaal aantal pagina links om af te beelden bij de paginering.';
$_lang['sisea.pagetpl_desc'] = 'De naam van de chunk om te gebruiken voor een paginering link.';
$_lang['sisea.pagefirsttpl_desc'] = 'De naam van de chunk om te gebruiken voor de eerste pagina paginering link.';
$_lang['sisea.pagelasttpl_desc'] = 'De naam van de chunk om te gebruiken voor de laatste pagina paginering link.';
$_lang['sisea.pageprevtpl_desc'] = 'De naam van de chunk om te gebruiken voor de vorige pagina paginering link.';
$_lang['sisea.pagenexttpl_desc'] = 'De naam van de chunk om te gebruiken voor de volgende pagina paginering link.';
$_lang['sisea.pagingseparator_desc'] = 'Het scheidingsteken te gebruiken tussen de paginering links.';
$_lang['sisea.parents'] = 'Parents';
$_lang['sisea.partial'] = 'Gedeeltelijk';
$_lang['sisea.perpage_desc'] = 'Het aantal zoekresultaten om te laten zien per pagina.';
$_lang['sisea.placeholderprefix_desc'] = 'Het voorvoegsel voor global placeholders ingesteld door deze snippet.';
$_lang['sisea.post'] = 'post';
$_lang['sisea.processtvs_desc'] = 'Geeft aan of TemplateVar-waarden samengevat moeten worden weergegeven zoals ze zouden op de bron. Standaard ingesteld op false.';
$_lang['sisea.searchindex_desc'] = 'De naam van de REQUEST-parameter dat de zoekopdracht zal gebruiken.';
$_lang['sisea.showextract_desc'] = 'Al dan niet weergeven van een extractie van de inhoud van elk zoekresultaat.';
$_lang['sisea.tpl_desc'] = 'De chunk dat zal worden gebruikt om de inhoud van elk zoekresultaat weer te geven.';
$_lang['sisea.tpl_form_desc'] = 'De chunk dat zal worden gebruikt om het zoekformulier weer te geven.';
$_lang['sisea.toplaceholder_desc'] = 'Al dan niet het resultaat direct weer te geven, of het resultaat aan een placeholder toekennen met deze eigenschappen naam.';
$_lang['sisea.useallwords_desc'] = 'Als deze waarde op true is ingesteld, wordt er alleen resultaten weergegeven met alle opgegeven zoektermen.';
$_lang['sisea.searchstyle_desc'] = 'Ofwel met een gedeeltelijke LIKE term zoeken, of op een relevantie basis MATCH zoeken.';
$_lang['sisea.andterms_desc'] = 'Wel of niet toevoegen van een logische AND tussen woorden.';
$_lang['sisea.matchwildcard_desc'] = 'In staat stellen om via een Wildcard-methode te zoeken. Zet dit op false om een exacte zoekopdracht op een zoekterm te doen.';
$_lang['sisea.docfields_desc'] = 'Een door komma\'s gescheiden lijst van specifieke bron-velden om te doorzoeken.';