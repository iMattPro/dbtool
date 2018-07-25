<?php
/**
*
* Database Optimize & Repair Tool [Polish]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optymalizacja &amp; Naprawa',
	'OPTIMIZE_LOG'			=> '<strong>Tabele bazy danych zoptymalizowane</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Tabele bazy danych naprawione</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Tabele bazy danych sprawdzone</strong><br />» %s',
));
