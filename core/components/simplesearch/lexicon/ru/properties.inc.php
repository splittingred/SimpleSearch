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
 * @language ru
 */
$_lang['sisea.containertpl_desc'] = 'Чанк который будет использован как шаблон обёртка для результатов поиска, разбивки на страницы и сообщений.';
$_lang['sisea.contexts_desc'] = 'Контексты в которых будет происходить поиск. По умолчанию текущий контекст, если не указан другой.';
$_lang['sisea.currentpagetpl_desc'] = 'Чанк который будет использован как шаблон для ссылки на текущую страницу в разбивке на страницы.';
$_lang['sisea.depth_desc'] = 'Если idtype установлен parents, глубина на которую будет происходить поиск в дереве ресурсов.';
$_lang['sisea.documents'] = 'Documents';
$_lang['sisea.exclude_desc'] = 'A comma-separated list of resource IDs to exclude from search eg. "10,15,19". This will exclude the resources with the ID "10","15" or "19".';
$_lang['sisea.extractellipsis_desc'] = 'Строка которая используется для обёртывания извлечённого из содержимого ресурса фрагмента. По умолчанию многоточие.';
$_lang['sisea.extractlength_desc'] = 'Количество символов  которые будут извлечены из содержимого ресурса для показа в результатах поиска.';
$_lang['sisea.get'] = 'get';
$_lang['sisea.hidemenu_desc'] = 'Включить или нет в поиск ресурсы у которых отмечен пункт &laquo;Не показывать в меню&raquo;. 0 искать только в ресурсах видимых в меню, 1 искать только в ресурсах не видимых в меню, 2 искать и в тех и в других.';
$_lang['sisea.hidemenu_visible'] = 'Искать в видимых';
$_lang['sisea.hidemenu_hidden'] = 'Искать в скрытых';
$_lang['sisea.hidemenu_both'] = 'Искать в скрытых и видимых';
$_lang['sisea.highlightclass_desc'] = 'Имя CSS класса который будет добавляться для подсветки результатов поиска.';
$_lang['sisea.highlightresults_desc'] = 'Подсвечивать или нет поисковый запрос в результатах поиска.';
$_lang['sisea.highlighttag_desc'] = 'HTML тег которым будет обёрнут подсвеченный поисковый запрос в результатах поиска.';
$_lang['sisea.ids_desc'] = 'Разделённый запятыми список идентификаторов ресурсов которыми будет ограничен поиск.';
$_lang['sisea.idtype_desc'] = 'Тип ограничения для параметра ids. Если parents, в поиске будут участвовать все дочернии документы указанного родителя. Если documents, в поиске будут участвовать только ресурсы с указанными идентификаторами.';
$_lang['sisea.includetvs_desc'] = 'Indicates if TemplateVar values should be included in the properties available to each resource template. Defaults to false.';
$_lang['sisea.landing_desc'] = 'Ресурс на котором будет вызов сниппета SimpleSearch отображающий результаты поиска.';
$_lang['sisea.match'] = 'Match';
$_lang['sisea.maxwords_desc'] = 'Максимальное количество слов по которым будет происходить поиск. Применяется только если useAllWords выключен.';
$_lang['sisea.method_desc'] = 'Какой метод будет использован в форме поиска, POST или GET.';
$_lang['sisea.minchars_desc'] = 'The minimum number of characters to trigger the search.';
$_lang['sisea.offsetindex_desc'] = 'Имя параметра который будет использоваться как смещение для разбивки на страницы результатов поиска.';
$_lang['sisea.pagetpl_desc'] = 'Чанк который будет использован как шаблон для ссылок в разбивке на страницы.';
$_lang['sisea.pagingseparator_desc'] = 'Разделитель который будет помещён между ссылками в разбивке на страницы.';
$_lang['sisea.parents'] = 'Parents';
$_lang['sisea.partial'] = 'Partial';
$_lang['sisea.perpage_desc'] = 'Количество результатов поиска для отображения на странице..';
$_lang['sisea.placeholderprefix_desc'] = 'The prefix for global placeholders set by this snippet.';
$_lang['sisea.post'] = 'post';
$_lang['sisea.processtvs_desc'] = 'Indicates if TemplateVar values should be rendered as they would on the resource being summarized. Defaults to false.';
$_lang['sisea.searchindex_desc'] = 'Имя параметра который будет использоваться для передачи поискового запроса.';
$_lang['sisea.showextract_desc'] = 'Показывать или нет фрагмент содержимого ресурса с найденным поисковым запросом в результатах поиска.';
$_lang['sisea.tpl_desc'] = 'Чанк, который будет использоваться как шаблон для отображения содержимого каждого отдельного результата поиска.';
$_lang['sisea.tpl_form_desc'] = 'Чанк, который будет использоваться как шаблон для отображения формы поиска.';
$_lang['sisea.toplaceholder_desc'] = 'Выводить результат работы сниппета непосредственно, или использовать для вывода подстановщик с этим именем.';
$_lang['sisea.useallwords_desc'] = 'Если включено, будет искать только результаты в которых есть все указанные в строке поиска слова.';
$_lang['sisea.searchstyle_desc'] = 'To search either with a partial LIKE search, or a relevance-based MATCH search.';
$_lang['sisea.andterms_desc'] = 'Whether or not to add a logical AND between words.';
$_lang['sisea.matchwildcard_desc'] = 'Enable wildcard search. Set to false to do exact searching on a search term.';
$_lang['sisea.docfields_desc'] = 'A comma-separated list of specific Resource fields to search.';