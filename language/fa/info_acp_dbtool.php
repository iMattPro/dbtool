<?php
/**
*
* Database Optimize & Repair Tool [Persian]
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
	'ACP_OPTIMIZE_REPAIR'	=> 'بهینه سازی و تعمیر',
	'OPTIMIZE_LOG'			=> '<strong>جداول پایگاه داده بهینه سازی شد.</strong><br />» %s',
	'REPAIR_LOG'			=> '<strong>جداول پایگاه داده تعمیر شد.</strong><br />» %s',
	'CHECK_LOG'				=> '<strong>جداول پایگاه داده بررسی می شود.</strong><br />» %s',
));
