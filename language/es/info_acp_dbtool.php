<?php
/**
*
* Database Optimize & Repair Tool [Spanish]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Optimizar y Reparar',
	'OPTIMIZE_LOG'			=> '<strong>Las tablas de la base de datos han sido optimizadas</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>Las tablas de la base de datos han sido reparadas</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>Las tablas de la base de datos han sido revisados</strong><br />» %s',
));
