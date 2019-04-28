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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimalizace a oprava',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Zde můžete optimalizovat nebo opravit databázové tabulky související se systémem phpBB. U velkých databází může dokončení trvat několik minut. <strong>OPTIMALIZACE</strong> defragmentuje databázi a poskytne zlepšený výkon databáze. <strong>OPRAVA</strong> by měla být použita pouze v případech, kdy máte podezření na poškození databáze nebo některých databázových tabulek. Poznámka: <strong>InnoDB</strong> tabulky nepodporují opravování.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Možnosti databáze',
	'DISABLE_BOARD'					=> 'Vypnout fórum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Fórum můžete během tohoto procesu vypnout. Po dokončení procesu bude opět zapnuto.',
	'OPTIMIZE'			=> 'Optimalizace',
	'OPTIMIZE_SUCCESS'	=> 'Optimalizace vybraných tabulek byla dokončena.',
	'REPAIR'			=> 'Oprava',
	'REPAIR_SUCCESS'	=> 'Oprava vybraných tabulek byla dokončena.',
	'CHECK'				=> 'Kontrola',
	'CHECK_SUCCESS'		=> 'Kontrola dokončena.<br />Pokud není výsledek „OK“ nebo „Table is already up to date“, měla by být provedena oprava dané tabulky.',
	'WARNING'			=> 'UPOZORNĚNÍ',
	'WARNING_EXPLAIN'	=> 'Tento nástroj je poskytován zcela BEZ ZÁRUKY a uživatelé tohoto nástroje by měli VŽDY nejprve provést úplnou zálohu celé databáze pro případ poruchy.<br /><br />Před pokračování se ujistěte, že máte úspěšně vytvořenou zálohu databáze!',
	'WARNING_MYSQL'		=> 'Tato funkce funguje pouze s MySQL databázemi.',
	'MARK_OVERHEAD'		=> 'Označit tabulky s režií',
	'PROCESSING'		=> 'Zpracovávání požadavku. Prosím čekejte…',
	'TH_NAME'			=> 'Název tabulky',
	'TH_TYPE'			=> 'Typ',
	'TH_SIZE'			=> 'Velikost',
	'TH_TOTAL'			=> 'Celkem',
	'TH_OVERHEAD'		=> 'Režie',
	'TABLE_ERROR'		=> 'Musíte vybrat alespoň jednu tabulku.',
	'TABLE_EMPTY'		=> 'Úložiště tabulky není podporováno.',
	'CLI_DBTOOL_EXPLAIN'	=> 'Check, optimise and repair database tables.',
	'CLI_DBTOOL_ARG_TABLE'	=> '[Optional] You can specify a single table by name to perform the operation on.',
	'CLI_DBTOOL_CONTINUE'	=> 'Do you wish to continue?',
	'CLI_DBTOOL_OPERATION'	=> 'Choose an operation to perform',
	'CLI_DBTOOL_RESULTS'	=> '%s Results',
	'CLI_DBTOOL_LOCK_ERROR'	=> 'The operation could not be performed, a database operation is already in progress by another process. Try again in an hour.',
));
