<?php
/**
*
* Database Optimize & Repair Tool [English]
* Nederlandse vertaling @ Solidjeuh <https://www.muziekpromo.net>
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimaliseren &amp; repareren',
	'OPTIMIZE_LOG'			=> '<strong>Database tabellen geoptimaliseerd</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Database tabellen gerepareerd</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Database tabellen gecontroleerd</strong><br />» %s',
));
