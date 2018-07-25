<?php
/**
*
* Database Optimize & Repair Tool [Romanian]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimizare &amp; Reparare',
	'OPTIMIZE_LOG'			=> '<strong>Tabelele bazei de date au fost optimizate</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Tabelele bazei de date au fost reparate</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Tabelele bazei de date au fost verificate</strong><br />» %s',
));
