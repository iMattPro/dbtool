<?php
/**
*
* Database Optimize & Repair Tool [Italian]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Ottimizza & Ripara',
	'OPTIMIZE_LOG'			=> '<strong>Tabelle del database ottimizzate</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Tabelle del database riparate</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Tabelle del database verificate</strong><br />» %s',
));
