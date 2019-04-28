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
	'ACP_OPTIMIZE_REPAIR'			=> 'Оптимизировать и починить',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Здесь вы можете провести обслуживание своих таблиц в БД. Для больших баз это может занять несколько минут. Действие <strong>Оптимизировать</strong> дефрагментирует базу и может улучшить производительность. <strong>Исправить</strong> должно использоваться только если у вас есть причина полагать, что в вашей базе есть испорченные или битые таблицы. Примечание: <strong>InnoDB</strong> таблицы не поддерживают исправления.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Опции БД',
	'DISABLE_BOARD'					=> 'Выключить форум',
	'DISABLE_BOARD_EXPLAIN'			=> 'Вы можете отключить конференцию на время обслуживания. Конференция будет включена по окончанию процесса.',
	'OPTIMIZE'			=> 'Оптимизировать',
	'OPTIMIZE_SUCCESS'	=> 'Оптимизация выбранных таблиц завершена.',
	'REPAIR'			=> 'Исправить',
	'REPAIR_SUCCESS'	=> 'Исправление выполнено.',
	'CHECK'				=> 'Проверить',
	'CHECK_SUCCESS'		=> 'Проверка завершена.<br />Если вы не увидели “OK” или “Table is already up to date”, вы можете запустить исправление таблицы.',
	'WARNING'			=> 'Внимание',
	'WARNING_EXPLAIN'	=> 'Эта утилита поставляется БЕЗ ГАРАНТИИ и пользователи должны создать резервную копию всей своей базы данных на случай сбоя. Перед продолжением убедитесь, что у вас есть резервная копия базы данных!',
	'WARNING_MYSQL'		=> 'Эта функция работает только с базами данных MySQL.',
	'MARK_OVERHEAD'		=> 'Отметить таблицы с оверхедом',
	'PROCESSING'		=> 'Обработка запроса... Подождите...',
	'TH_NAME'			=> 'Имя таблицы',
	'TH_TYPE'			=> 'Тип',
	'TH_SIZE'			=> 'Размер',
	'TH_TOTAL'			=> 'Всего',
	'TH_OVERHEAD'		=> 'Оверхед',
	'TABLE_ERROR'		=> 'Вы должны выбрать хотя бы одну таблицу.',
	'TABLE_EMPTY'		=> 'Этот механизм хранения таблиц не поддерживается.',
	'CLI_DBTOOL_EXPLAIN'	=> 'Check, optimise and repair database tables.',
	'CLI_DBTOOL_ARG_TABLE'	=> '[Optional] You can specify a single table by name to perform the operation on.',
	'CLI_DBTOOL_CONTINUE'	=> 'Do you wish to continue?',
	'CLI_DBTOOL_OPERATION'	=> 'Choose an operation to perform',
	'CLI_DBTOOL_RESULTS'	=> '%s Results',
	'CLI_DBTOOL_LOCK_ERROR'	=> 'The operation could not be performed, a database operation is already in progress by another process. Try again in an hour.',
));
