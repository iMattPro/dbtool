<?php
/**
*
* Database Optimize & Repair Tool [Russian]
* Translated by vovanchig@gmail.com, reviewed by Kot Matroskin (https://mindreader.hacktest.net/en/)
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
	'ACP_OPTIMIZE_REPAIR'	=> 'Оптимизировать и починить',
	'OPTIMIZE_LOG'			=> '<strong>Таблицы оптимизированны</strong><br>» %s',
	'REPAIR_LOG'			=> '<strong>Таблицы исправлены</strong><br>» %s',
	'CHECK_LOG'				=> '<strong>Таблицы проверены</strong><br>» %s',
));
