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
 * German Properties Lexicon Topic for SimpleSearch
 *
 * @package simplesearch
 * @subpackage lexicon
 * @language de
 */
$_lang['sisea.containertpl_desc'] = 'Gibt den Chunk an der die Suchergebnisse, Seitennavigation und Nachrichten enth&auml;lt.';
$_lang['sisea.contexts_desc'] = 'Gibt den zu durchsuchenden Kontext an. Ist kein Kontext angegeben wird der aktive Kontext verwendet.';
$_lang['sisea.currentpagetpl_desc'] = 'Gibt den Chunk des "aktiven" Seitennavigations Link an.';
$_lang['sisea.depth_desc'] = 'Wenn "idtype" auf "Eltern" gesetzt ist, gibt "depth" die Tiefe der zu durchsuchenden Unterseiten an.';
$_lang['sisea.documents'] = 'Dokumente';
$_lang['sisea.exclude_desc'] = 'Eine durch Kommata getrennte Liste von Dokument IDs, die von der Suche ausgschlossen werden. Beispiel: "10,15,19" bei einer Suchanfrage werden die Dokumente mit der ID "10","15" und "19" nicht durchsucht.';
$_lang['sisea.extractellipsis_desc'] = 'Eine voran und nachfolgende Zeichenkette die den Auszug eines Suchergebnis umschlie&szlig;t.';
$_lang['sisea.extractlength_desc'] = 'Gibt die L&auml;nge des Auszug eines Suchergebnis an.';
$_lang['sisea.get'] = 'get';
$_lang['sisea.hidemenu_desc'] = 'Filter zum durchsuchen ver&ouml;ffentlichter oder versteckter Dokumente. "0" Es werden nur sichtbare Dokumente durchsucht, "1" es werden nur versteckte Dokumente durchsucht, "2" es werden beide Arten von Dokumenten durchsucht.';
$_lang['sisea.hidemenu_visible'] = 'Nur Ver&ouml;ffentlichte';
$_lang['sisea.hidemenu_hidden'] = 'Nur Versteckte';
$_lang['sisea.hidemenu_both'] = 'Alle durchsuchen';
$_lang['sisea.highlightclass_desc'] = 'Gibt den CSS-Klassenname hervorgehobener Ergebnisse an.';
$_lang['sisea.highlightresults_desc'] = 'Bestimmt ob Suchergebnisse hervorgehoben werden.';
$_lang['sisea.highlighttag_desc'] = 'Gibt das HTML Tag an welches das hervorgehobene Suchergebnis umschlie&szlig;t.';
$_lang['sisea.ids_desc'] = 'Eine durch Kommata getrennte Liste von Dokument IDs, auf die sich die Suche beschr&auml;nkt. Beispiel: "10,15,19".';
$_lang['sisea.idtype_desc'] = 'Gibt an auf welche Weise die Dokument IDs durchsucht werden. "Eltern": es werden alle Unterseiten der angegebenen Dokumente durchsucht. "Dokument": es werden nur die angegebenen Dokumente durchsucht.';
$_lang['sisea.includetvs_desc'] = 'Gibt an ob Template-Variablen in der Ausgabe zur verf&uuml;gung stehen. Standardwert "false".';
$_lang['sisea.landing_desc'] = 'Gibt die Zielseite zur darstellung der Suchergebnisse an.';
$_lang['sisea.match'] = 'Genau';
$_lang['sisea.maxwords_desc'] = 'Die maximale Anzahl an W&ouml;rtern an, die bei der Suche einbezogen werden. Voraussetzung: "useAllWords" ist nicht aktiv.';
$_lang['sisea.method_desc'] = 'Gibt die Methode an wie das Formular versendet wird. POST oder GET.';
$_lang['sisea.minchars_desc'] = 'Gibt die Mindestanzahl an Buchstaben f&uuml;r einen Suchbegriff an.';
$_lang['sisea.offsetindex_desc'] = 'Der Name des REQUEST Parameter der f&uuml;r die Seitennavigation verwendet wird.';
$_lang['sisea.pagetpl_desc'] = 'Gibt den Chunk an der f&uuml;r die Seitennavigation Links verwendet wird.';
$_lang['sisea.pagingseparator_desc'] = 'Gibt das Trennzeichen an welches die Seitennavigation Links von einander trennt.';
$_lang['sisea.parents'] = 'Eltern';
$_lang['sisea.partial'] = 'Partiell';
$_lang['sisea.perpage_desc'] = 'Gibt die maximale Anzahl der Suchergebnisse pro Seite an.';
$_lang['sisea.placeholderprefix_desc'] = 'Gibt das globale Prefix f&uuml;r Platzhalter an.';
$_lang['sisea.post'] = 'post';
$_lang['sisea.processtvs_desc'] = 'Gibt an ob Template-Variablen verarbeitet ausgegeben werden sollen.';
$_lang['sisea.searchindex_desc'] = 'Der Name des REQUEST Parameter welcher den Suchbegriff enth&auml;lt.';
$_lang['sisea.showextract_desc'] = 'Gibt an ob ein Auszug des Suchergebnis angezeigt werden soll.';
$_lang['sisea.tpl_desc'] = 'Gibt den Chunk f&uuml;r die einzelnen Suchergebnisse an.';
$_lang['sisea.tpl_form_desc'] = 'Gibt den Chunk f&uuml;r das Suchformular an.';
$_lang['sisea.toplaceholder_desc'] = 'Gibt an ob die Ausgabe direkt oder in einem Platzhalter mit diesem Namen ausgegeben werden soll.';
$_lang['sisea.useallwords_desc'] = 'Wenn "useAllWords" aktiv ist werden nur Suchergebnisse mit der genauen Wortkombination des Suchbegriffs angezeigt.';
$_lang['sisea.searchstyle_desc'] = 'Gibt an wie nach einem Suchbegriff gesucht werden soll. "Partiell" (SQL Like) oder "Genau" (SQL MATCH).';
$_lang['sisea.andterms_desc'] = 'Bestimmt ob nach der genauen Wortkombination gesucht werden soll.';
$_lang['sisea.matchwildcard_desc'] = 'Wenn "true" wird der Suchbegriff von "wildcards" umschlossen. Bei "false" wird nach dem genauen Suchbegriff gesucht.';
$_lang['sisea.docfields_desc'] = 'Eine durch Kommata getrennte Liste von Dokument-Feldern die durchsucht werden sollen. Beispiel: "pagetitle,longtitle,description".';