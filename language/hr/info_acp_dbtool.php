<?php
/**
*
* Database Optimize & Repair Tool [Croatian]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimizacija &amp; Reparacija',
	'OPTIMIZE_LOG'			=> '<strong>Tablice databaze su optimizirane</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Tablice databaza su reparirane</strong><br />» %s',
));
