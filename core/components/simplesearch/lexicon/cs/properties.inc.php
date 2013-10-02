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
 * Czech Properties Lexicon Topic for SimpleSearch
 *
 * @package simplesearch
 * @subpackage lexicon
 * @language cs
 */
$_lang['sisea.activefacet_desc'] = 'Aktuální aktivní facet. Nechte to samo o sobě, pokud chcete ukázat výsledek z nestandardního facetu získaném prostřednictvím postHook.';
$_lang['sisea.containertpl_desc'] = 'Chunk, který bude použit pro zabalení všech výsledků vyhledávání, stránkování a zpráv.';
$_lang['sisea.contexts_desc'] = 'Kontexty pro vyhledávání. Pokud nejsou explicitně specifikovány jiné, použije se aktuální kontext.';
$_lang['sisea.currentpagetpl_desc'] = 'Chunk použití pro aktuální odkaz ve stránkování.';
$_lang['sisea.depth_desc'] = 'Pokud je idtype nastaveno na předka, bude se prohledávat strom dokumentů od tohoto ID';
$_lang['sisea.documents'] = 'Dokumenty';
$_lang['sisea.exclude_desc'] = 'Čárkou oddělený seznam ID zdrojů které mají být vynechány při hledání např. "10,15,19". Toto vynechá zdroje s ID "10","15" nebo "19".';
$_lang['sisea.extractellipsis_desc'] = 'Řetězec, který slouží ke zkrácení výsledků. Výchozí hodnota je trojtečka (…).';
$_lang['sisea.extractlength_desc'] = 'Počet znaků na které bude zkrácen vyhledaný text.';
$_lang['sisea.facetlimit_desc'] = 'Počet neaktivních facetů výsledků, které se zobrazí na hlavní stránce výsledků hledání. Výchozí hodnota je 5.';
$_lang['sisea.fieldpotency_desc'] = 'Důležitost jednotlivých částí pro výsledek hledání. Příklad: pagetitle:3,alias:10 Přidělí 3 body pokud bude nalezen řetězec v titulku stránku, 10 bodů pokud bude nalezen v aliasu';
$_lang['sisea.get'] = 'GET';
$_lang['sisea.hidemenu_desc'] = 'Zobrazovat nebo skrývat zdroje, které mají nastaveno „Skrýt z menu“. 0 zobrazí jen viditelné zdroje, 1 zobrazí jen skryté zdroje, 2 zobrazí všechny.';
$_lang['sisea.hidemenu_visible'] = 'Pouze viditelné';
$_lang['sisea.hidemenu_hidden'] = 'Pouze skryté';
$_lang['sisea.hidemenu_both'] = 'Všechny';
$_lang['sisea.highlightclass_desc'] = 'CSS třída pro zvýraznění hledaného řetězce ve výsledcích.';
$_lang['sisea.highlightresults_desc'] = 'Zvýraznit hledaný řetězec ve výsledcích, nebo ne?';
$_lang['sisea.highlighttag_desc'] = 'HTML značka pro obalení hledaného řetězce ve výsledcích hledání.';
$_lang['sisea.ids_desc'] = 'Čárkou oddělený seznam ID zdrojů ze kterých smí být vyhledáváno.';
$_lang['sisea.idtype_desc'] = 'Typ omezení pro parametr ids. Pokud je nastaveno na „Předci“, budou přidána ID všech potomků těchto dokumentů do vyhledávání.  Pokud je nastaveno na „Dokumenty“, bude vyhledáváno pouze z dokumentů jejichž ID je v seznamu.';
$_lang['sisea.includetvs_desc'] = 'Označuje, zda se bude vyhledávat i v obsahu Template variables. Výchozí hodnota je „ne“. Zapnutí této funkce může spomalit vyhledávání, pokud máte hodně TV.';
$_lang['sisea.landing_desc'] = 'Dokument na který bude přesměrován SimpleSearch snippet  po odeslání formuláře, který by měl zobrazit výsledky hledání.';
$_lang['sisea.match'] = 'Úplná shoda';
$_lang['sisea.maxwords_desc'] = 'Maximální povolený počet slov v hledání. Použije se pouze pokud je useAllWords nastaveno na off.';
$_lang['sisea.method_desc'] = 'Protokol kterým se odešle výsledek formuláře vyhledávání (GET nebo POST).';
$_lang['sisea.minchars_desc'] = 'Minimální počet znaků v hledání.';
$_lang['sisea.offsetindex_desc'] = 'Jméno parametru v požadavku pro určení stránky výsledků.';
$_lang['sisea.pagelimit_desc'] = 'Maximální počet odkazů na stránku vykreslených při stránkování.';
$_lang['sisea.pagetpl_desc'] = 'Chunk použitý pro vykreslení odkazu na stránku při stránkování.';
$_lang['sisea.pagefirsttpl_desc'] = 'Chunk použitý pro vykreslení odkazu na první stránku při stránkování.';
$_lang['sisea.pagelasttpl_desc'] = 'Chunk použitý pro vykreslení odkazu na poslední stránku při stránkování.';
$_lang['sisea.pageprevtpl_desc'] = 'Chunk použitý pro vykreslení odkazu na předchozí stránku při stránkování.';
$_lang['sisea.pagenexttpl_desc'] = 'Chunk použitý pro vykreslení odkazu na další stránku při stránkování.';
$_lang['sisea.pagingseparator_desc'] = 'Oddělovací znak mezi jednotlivými odkazy na stránku při stránkování.';
$_lang['sisea.parents'] = 'Předci';
$_lang['sisea.partial'] = 'Částečná shoda';
$_lang['sisea.perpage_desc'] = 'Počet výsledků na stránku výsledků vyhledávání.';
$_lang['sisea.placeholderprefix_desc'] = 'Předložka pro globální placeholdery použité tímto snippetem.';
$_lang['sisea.post'] = 'POST';
$_lang['sisea.posthooks_desc'] = 'Nějaké hooky které se mají spustit po odeslání formuláře které mohou umožnit rozdělení výsledků vyhledávání do jednotlivých facetů ve výsledcích hledání.';
$_lang['sisea.processtvs_desc'] = 'Určuje zda se hodnoty Template variables mají vykreslit ve výsledcích hledání. Výchozí hodnota je Ne. Poznámka: TV jsou zpracovány v průběhu indexace pro vyhledávání přes Solr, takže není potřeba to aktivovat zde.';
$_lang['sisea.searchindex_desc'] = 'Jméno parametru v požadavku po odeslání formuláře, který obsahuje hledaný řetězec.';
$_lang['sisea.showextract_desc'] = 'Zobrazovat nebo skrývat zkrácený obsah dokumentu ve výsledcích hledání.';
$_lang['sisea.sortby_desc'] = 'Čárkou oddělený seznam ID dokumentů podle kterých se má řadit výsledek vyhledávání. Nechte prázdné, pokud se má řadit podle relevance k vyhledávanému řetězci.';
$_lang['sisea.sortdir_desc'] = 'Čárkou oddělený seznam směrů řazení. Musí obsahovat stejný počet položek jako parametr sortBy.';
$_lang['sisea.tpl_desc'] = 'Chunk který se použije pro vykreslení obsahu pro každý výsledek hledání.';
$_lang['sisea.tpl_form_desc'] = 'Chunk který se použije pro vykreslení vyhledávacího formuláře.';
$_lang['sisea.toplaceholder_desc'] = 'Má se výsledek vyhledání rovnou vrátit, nebo nastavit jako placeholder s tímto jménem.';
$_lang['sisea.useallwords_desc'] = 'Pokud je nastaveno na Ano, zobrazí se pouze výsledky obsahující všechna hledaná slova.';
$_lang['sisea.searchstyle_desc'] = 'Vyhledávat Částečnou (LIKE) nebo Úplnou (MATCH) shodu dokumentu s vyhledávaným řetězcem.';
$_lang['sisea.andterms_desc'] = 'Má se přidat logické AND mezi jednotlivá vyhledávaná slova.';
$_lang['sisea.matchwildcard_desc'] = 'Umožnit vyhledávání s použitím zástupných znaků. Nastavte na ne, pokud se má vyhledávat řetězec přesně jak je.';
$_lang['sisea.docfields_desc'] = 'Čárkou oddělený seznam ID dokumentů ze kterých se má vyhledávat.';
$_lang['sisea.urlscheme_desc'] = 'URL schéma které chcete použít: http, https, celé, absolutní, relativní, atd. Podívajte se na dokumentaci $modx->makeUrl(). Toto se použije, když je generováno stránkování.';
$_lang['sisea.url_relative'] = 'Relativní';
$_lang['sisea.url_absolute'] = 'Absolutní';
$_lang['sisea.url_full'] = 'Celé';
$_lang['sisea.ascending'] = 'Vzestupně';
$_lang['sisea.descending'] = 'Sestupně';