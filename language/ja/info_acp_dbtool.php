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
	'ACP_OPTIMIZE_REPAIR'	=> '最適化と修復',
	'OPTIMIZE_LOG'			=> '<strong>データベーステーブルを最適化しました</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>データベーステーブルを修復しました</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>データベーステーブルをチェック</strong><br />» %s',
));
