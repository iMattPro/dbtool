<?php
/**
*
* Database Optimize & Repair Tool [French]
*
* @copyright (c) 2013 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
* French translation by Galixte (http://www.galixte.com)
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimiser &amp; réparer',
	'OPTIMIZE_LOG'			=> '<strong>Les tables de la base de données ont été optimisées</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Les tables de la base de données ont été réparées</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Les tables de la base de données ont été examinées</strong><br />» %s',
));
