<?php
/**
*
* Database Optimize & Repair Tool [English]
* Nederlandse vertaling @ Solidjeuh <https://www.muziekpromo.net>
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimaliseren &amp; repareren',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Hier kunt u uw phpBB gerelateerde tabellen optimaliseren of repareren. Voor grote databases kan dit enkele minuten duren. <strong>OPTIMALISEREN</strong> zal uw database defragmenteren en kan verbeterde database prestaties bieden. <strong>REPAREREN</strong> mag alleen worden gebruikt als u reden hebt om aan te nemen dat uw database is gecrasht of corrupte tabellen bevat. Notitie: <strong>InnoDB</strong> tabellen ondersteunen geen reparatie.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Database opties',
	'DISABLE_BOARD'					=> 'Forum uitschakelen',
	'DISABLE_BOARD_EXPLAIN'			=> 'U kunt het forum tijdens dit proces uitschakelen. Het forum wordt aan het einde van het proces ingeschakeld.',
	'OPTIMIZE'			=> 'Optimaliseer',
	'OPTIMIZE_SUCCESS'	=> 'Optimalisatie van de geselecteerde tabel(len) is voltooid.',
	'REPAIR'			=> 'Herstel',
	'REPAIR_SUCCESS'	=> 'Reparatie van de geselecteerde tabel(len) is voltooid.',
	'CHECK'				=> 'Controleer',
	'CHECK_SUCCESS'		=> 'Controle voltooid.<br />Als u niet “OK” krijgt, of “Tabel is al up-to-date”, moet u normaal een reparatie van de tabel uitvoeren.',
	'WARNING'			=> 'Waarschuwing',
	'WARNING_EXPLAIN'	=> 'Deze tool wordt geleverd ZONDER GARANTIE, en gebruikers van deze tool moeten hun volledige database back-uppen in geval van een storing.<br /><br />Controleer voordat u doorgaat of u een database back-up hebt!',
	'WARNING_MYSQL'		=> 'Deze functie werkt alleen met MySQL databases.',
	'MARK_OVERHEAD'		=> 'Markeer tabellen met overhead',
	'PROCESSING'		=> 'Uw aanvraag is aan het verwerken... Even geduld...',
	'TH_NAME'			=> 'Tabel naam',
	'TH_TYPE'			=> 'Type',
	'TH_SIZE'			=> 'Grootte',
	'TH_TOTAL'			=> 'Totalen',
	'TH_OVERHEAD'		=> 'Overhead',
	'TABLE_ERROR'		=> 'U moet ten minste één tabel selecteren.',
	'TABLE_EMPTY'		=> 'Tabel opslag engine niet ondersteund.',
	'CLI_DBTOOL_EXPLAIN'	=> 'Check, optimise and repair database tables.',
	'CLI_DBTOOL_ARG_TABLE'	=> '[Optional] You can specify a single table by name to perform the operation on.',
	'CLI_DBTOOL_CONTINUE'	=> 'Do you wish to continue?',
	'CLI_DBTOOL_OPERATION'	=> 'Choose an operation to perform',
	'CLI_DBTOOL_RESULTS'	=> '%s Results',
	'CLI_DBTOOL_LOCK_ERROR'	=> 'The operation could not be performed, a database operation is already in progress by another process. Try again in an hour.',
));
