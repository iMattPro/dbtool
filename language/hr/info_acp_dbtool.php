<?php
/**
*
* Database Optimize & Repair Tool [Croatian]
* Croatian translation by Ančica Sečan (http://ancica.sunceko.net)
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimiziraj &amp; Popravi',
	'OPTIMIZE_LOG'			=> '<strong>Optimizirane tablice baze podataka</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Popravljene tablice baze podataka</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Provjereno tablice baze podataka</strong><br />» %s',
));
