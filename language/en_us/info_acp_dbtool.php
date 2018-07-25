<?php
/**
*
* Database Optimize & Repair Tool [English]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimize &amp; Repair',
	'OPTIMIZE_LOG'			=> '<strong>Database tables optimized</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Database tables repaired</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Database tables checked</strong><br />» %s',
));
