<?php
/**
*
* Database Optimize & Repair Tool [Deutsch]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimieren &amp; Reparieren',
	'OPTIMIZE_LOG'			=> '<strong>Datenbank Tabellen optimiert</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Datenbank Tabellen repariert</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Datenbank Tabellen überprüft</strong><br />» %s',
));
