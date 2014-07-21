<?php
/**
*
* Database Optimize & Repair Tool [Russian]
* Translated by vovanchig@gmail.com
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Оптимизировать и починить',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Здесь вы можете провести обслуживание своих таблиц в бд <strong>OPTIMIZE</strong> дефрагментирует базу и возможно улучшит производительность. <strong>REPAIR</strong> должно использоваться только при битых таблицах. Заметка: <strong>InnoDB</strong> не поддерживают Repair.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Опции БД',
	'DISABLE_BOARD'					=> 'Выключить форум',
	'DISABLE_BOARD_EXPLAIN'			=> 'Вы можете отключить форум пока идет работа',
	'OPTIMIZE'			=> 'Оптимизировать',
	'OPTIMIZE_SUCCESS'	=> 'Оптимизация выбранных таблиц завершена',
	'REPAIR'			=> 'Исправить',
	'REPAIR_SUCCESS'	=> 'Исправление выполнено',
	'CHECK'				=> 'Проверить',
	'CHECK_SUCCESS'		=> 'Проверка закончена.<br />Если вы не увидели “OK”, или “Table is already up to date” вы можете запустить исправление.',
	'WARNING'			=> 'Внимание',
	'WARNING_EXPLAIN'	=> 'Никаких гарантий работы автор не дает, все делаете на свой страх и риск!.<br /><br />Убедитесь что сделали бэкап!',
	'WARNING_MYSQL'		=> 'Плагин работает только с MySql',
	'MARK_OVERHEAD'		=> 'Отметьте таблицы с оверхедом',
	'PROCESSING'		=> 'Обработка запроса...Подождите...',
	'TH_NAME'			=> 'Имя таблицы',
	'TH_TYPE'			=> 'Тип',
	'TH_SIZE'			=> 'Размер',
	'TH_TOTAL'			=> 'Всего',
	'TH_OVERHEAD'		=> 'Оверхед',
	'TABLE_ERROR'		=> 'Вы должны выбрать хотябы одну таблицу',
	'TABLE_EMPTY'		=> 'Драйвер таблицы не поддерживается',
));
