<?php
/**
*
* Database Optimize & Repair Tool [Turkish]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimize et &amp; Onar',
	'OPTIMIZE_LOG'			=> '<strong>Veritabanı tabloları optimize edildi</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Veritabanı tabloları onarıldı</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Veritabanı tabloları incelendi</strong><br />» %s',
));
