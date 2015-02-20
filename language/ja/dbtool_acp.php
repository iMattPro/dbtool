<?php
/**
*
* Database Optimize & Repair Tool [Japanese]
*
* @copyright (c) 2013 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_OPTIMIZE_REPAIR'			=> '最適化と修復',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'ここでは、phpBBに関連するテーブルを最適化または修復することが出来ます。巨大なデータベースについては、完了までに時間を要することが有ります。<strong>最適化</strong>はデータベースをデフラグし、データベースのパフォーマンスを改善することが出来ます。<strong>修復</strong>はあなたのデータベーステーブルがクラッシュしたまたは破損したと信じる理由がある場合にのみ使用すべきです。注: <strong>InnoDB</strong>テーブルは修復をサポートしていません。',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'データベースオプション',
	'DISABLE_BOARD'					=> '掲示板を閉鎖する',
	'DISABLE_BOARD_EXPLAIN'			=> 'この処理を実行している間掲示板を閉鎖します。掲示板は処理が終了すると有効化されます。',
	'OPTIMIZE'			=> '最適化',
	'OPTIMIZE_SUCCESS'	=> '選択したテーブルの最適化が完了しました。',
	'REPAIR'			=> '修復',
	'REPAIR_SUCCESS'	=> '選択したテーブルの修復が完了しました。',
	'CHECK'				=> 'チェック',
	'CHECK_SUCCESS'		=> 'チェックが完了しました。<br />“OK”になっていない場合、または“Table is already up to date”になっている場合、テーブルの修復を実行したほうがよいでしょう。',
	'WARNING'			=> '警告',
	'WARNING_EXPLAIN'	=> 'このツールは、障害が発生した場合に備えてこのツールのユーザーはデータベース全体をバックアップする必要があり、無保証で提供されます。<br /><br />続ける前に、データベースのバックアップを確実に行ってください！',
	'WARNING_MYSQL'		=> 'この機能はMySQLデータベースでのみ動作します。',
	'MARK_OVERHEAD'		=> 'オーバーヘッドを持っているテーブルをマーク',
	'PROCESSING'		=> 'リクエストを処理しています... お待ちください...',
	'TH_NAME'			=> 'テーブル名',
	'TH_TYPE'			=> 'タイプ',
	'TH_SIZE'			=> 'サイズ',
	'TH_TOTAL'			=> '合計',
	'TH_OVERHEAD'		=> 'オーバーヘッド',
	'TABLE_ERROR'		=> '少なくとも1つテーブルを選択する必要があります。',
	'TABLE_EMPTY'		=> 'テーブルストレージエンジンはサポートされていません。',
));
