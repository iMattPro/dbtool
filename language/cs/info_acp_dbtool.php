<?php
/**
*
* Database Optimize & Repair Tool [Czech]
* Translated by R3gi (regiprogi[a]gmail•com)
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimalizace a oprava',
	'OPTIMIZE_LOG'			=> '<strong>Optimalizace databázových tabulek</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Oprava databázových tabulek</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Kontrola databázových tabulek</strong><br />» %s',
));
