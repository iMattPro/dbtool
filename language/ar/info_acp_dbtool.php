<?php
/**
*
* Database Optimize & Repair Tool [Arabic]
*
* @copyright (c) 2013 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated By : Bassel Taha Alhitary <http://alhitary.net>
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
	'ACP_OPTIMIZE_REPAIR'	=> 'تحسين وإصلاح',
	'OPTIMIZE_LOG'			=> '<strong>تم تحسين جداول قاعدة البيانات</strong><br>» %s',
	'REPAIR_LOG'			=> '<strong>تم إصلاح جداول قاعدة البيانات</strong><br>» %s',
	'CHECK_LOG'				=> '<strong>تم فحص جداول قاعدة البيانات</strong><br>» %s',
));
