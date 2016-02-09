<?php
/**
*
* Database Optimize & Repair Tool [Slovak]
* Translated by ansysko miskin@miskin.sk
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimalizácia a oprava',
	'OPTIMIZE_LOG'			=> '<strong>Optimalizujem tabuľku databázy</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Opravujem tabuľku</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Kontroloval databázovej tabuľky</strong><br />» %s',
));
