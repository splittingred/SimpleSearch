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
 * Japanese Default Topic for SimpleSearch
 *
 * @package simplesearch
 * @subpackage lexicon
 * @language ja
 */
$_lang['sisea.no_results'] = '"[[+query]]"の検索結果は見つかりませんでした。 検索ワードを変更してもう一度お試しください。';
$_lang['sisea.search'] = '検索';
$_lang['sisea.results_found'] = '[[+count]] 件の検索結果 : "[[+text]]"';
$_lang['sisea.result_pages'] = '検索結果:';
$_lang['sisea.index_finished'] = '[[+total]] 件のリソースをインデックスに登録しました。';

/* Settings */
$_lang['setting_sisea.driver_class'] = '検索ドライバークラス';
$_lang['setting_sisea.driver_class_desc'] = '異なる検索ドライバーを設定します。SimpleSearchは標準の設定であるSimpleSearchDriverBasic以外にSimpleSearchDriverSolrを提供します。(Solrを使用するときは別途Solrサーバーを準備する必要があります)';
$_lang['setting_sisea.driver_class_path'] = '検索ドライバークラスの場所';
$_lang['setting_sisea.driver_class_path_desc'] = 'オプション 必要に応じて検索ドライバークラスが定義されているファイルへの絶対パスを設定します。空欄の場合、デフォルトのドライバーディレクトリから検索します。';
$_lang['setting_sisea.driver_db_specific'] = '特定の検索ドライバーデータベース';
$_lang['setting_sisea.driver_db_specific_desc'] = '異なるSQLドライバーの派生クラスを検索ドライバーとして使う場合、"はい"を選択してください。このプロパティは通常、SQL検索ならはい、Solrなどインデックス方式の検索ならいいえになります。';

/* solr settings */
$_lang['setting_sisea.solr.hostname'] = 'Solrホスト名';
$_lang['setting_sisea.solr.hostname_desc'] = 'Solrサーバーのホスト名を設定します。';
$_lang['setting_sisea.solr.port'] = 'Solrポート番号';
$_lang['setting_sisea.solr.port_desc'] = 'Solrサーバーのポート番号を設定します。';
$_lang['setting_sisea.solr.path'] = 'Solrの場所';
$_lang['setting_sisea.solr.path_desc'] = 'Solrの絶対パスを設定します。 マルチコア環境で実行している場合、solr/corenameのような形式になります。';
$_lang['setting_sisea.solr.username'] = 'Solrユーザー名';
$_lang['setting_sisea.solr.username_desc'] = 'HTTP認証で使用するユーザー名を設定します。';
$_lang['setting_sisea.solr.password'] = 'Solrパスワード';
$_lang['setting_sisea.solr.password_desc'] = 'HTTP認証で使用するパスワードを設定します。';
$_lang['setting_sisea.solr.proxy_host'] = 'Solrプロキシホスト名';
$_lang['setting_sisea.solr.proxy_host_desc'] = 'Solrサーバーへの接続に使用するプロキシのホスト名を設定します。';
$_lang['setting_sisea.solr.proxy_port'] = 'Solrプロキシポート番号';
$_lang['setting_sisea.solr.proxy_port_desc'] = 'Solrサーバーへの接続に使用するプロキシのポート番号を設定します。';
$_lang['setting_sisea.solr.proxy_username'] = 'Solrプロキシユーザー名';
$_lang['setting_sisea.solr.proxy_username_desc'] = 'Solrサーバーへの接続に使用するプロキシのユーザー名を設定します。';
$_lang['setting_sisea.solr.proxy_password'] = 'Solrプロキシパスワード';
$_lang['setting_sisea.solr.proxy_password_desc'] = 'Solrサーバーへの接続に使用するプロキシのパスワードを設定します。';
$_lang['setting_sisea.solr.timeout'] = 'Solrリクエストタイムアウト';
$_lang['setting_sisea.solr.timeout_desc'] = 'Solrの処理を待機する時間の上限を秒数で設定します。';
$_lang['setting_sisea.solr.ssl'] = 'SolrにSSLで接続する';
$_lang['setting_sisea.solr.ssl_desc'] = '"はい"にするとSolrへのSSL接続を試みます。';
$_lang['setting_sisea.solr.ssl_cert'] = 'Solr SSL証明書';
$_lang['setting_sisea.solr.ssl_cert_desc'] = '秘密鍵と個人証明書を含んだPEM形式ファイル(内容は表記した順序になっていること)の名前を設定します。';
$_lang['setting_sisea.solr.ssl_key'] = 'Solr SSLキー';
$_lang['setting_sisea.solr.ssl_key_desc'] = '秘密鍵のみを含んだPEM形式ファイルの名前を設定します。';
$_lang['setting_sisea.solr.ssl_keypassword'] = 'Solr SSLキーのパスワード';
$_lang['setting_sisea.solr.ssl_keypassword_desc'] = 'SSLキーのパスワードを設定します。';
$_lang['setting_sisea.solr.ssl_cainfo'] = 'Solr SSL CA証明書';
$_lang['setting_sisea.solr.ssl_cainfo_desc'] = 'ピアの証明に使用するCA証明書を一つ以上格納したファイルの名前を設定します。';
$_lang['setting_sisea.solr.ssl_capath'] = 'Solr SSL CA証明書の場所';
$_lang['setting_sisea.solr.ssl_capath_desc'] = 'ピアの証明に使用するCA証明書ファイルが格納されているディレクトリの名前を設定します。';
