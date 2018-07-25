<?php
/**
*
* Database Optimize & Repair Tool [Polish]
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optymalizacja &amp; Naprawa',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Tutaj możesz optymalizować i naprawiać powiązane tabele phpBB. W przypadku dużych baz danych, może to potrwać kilka minut. <strong>OPTYMALIZACJA</strong> będzie defragmentować Twoją bazę danych i może zaoferować jej wyższą wydajność. <strong>NAPRAWA</strong> powinna być stosowana tylko gdy masz powody sądzić, że baza danych uległa awarii lub ma uszkodzone tabele. Uwaga: tabele <strong> InnoDB </strong> nie obsługują napraw.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Opcje dostępu do bazy',
	'DISABLE_BOARD'					=> 'Wyłącz forum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Powinieneś wyłączyć forum w trakcie tego procesu. Forum będzie dostępne pod koniec procesu.',
	'OPTIMIZE'			=> 'Optymalizacja',
	'OPTIMIZE_SUCCESS'	=> 'Optymalizacja wybranej (ych) tabeli jest zakończona.',
	'REPAIR'			=> 'Naprawa',
	'REPAIR_SUCCESS'	=> 'Naprawa wybranej (ych) tabeli jest zakończona.',
	'CHECK'				=> 'Sprawdź',
	'CHECK_SUCCESS'		=> 'Sprawdzanie zakończone.<br />Jeśli nie masz statusu "OK ", lub "Tabela jest już aktualna" zazwyczaj należy przeprowadzić naprawę tabeli.',
	'WARNING'			=> 'Ostrzeżenie',
	'WARNING_EXPLAIN'	=> 'Narzędzie to jest BEZ GWARANCJI i użytkownicy tego narzędzia, w przypadku awarii, powinni wykonać kopię zapasową całej bazy danych.<br /><br />Before continuing, make sure you have a database backup!',
	'WARNING_MYSQL'		=> 'Ta funkcja działa tylko z bazami danych MySQL.',
	'MARK_OVERHEAD'		=> 'Zaznacz tabelę uwzględniając przeciążenie',
	'PROCESSING'		=> 'Przetwarzania żądania ... Proszę czekać ...',
	'TH_NAME'			=> 'Nazwa tabeli',
	'TH_TYPE'			=> 'Rodzaj',
	'TH_SIZE'			=> 'Rozmiar',
	'TH_TOTAL'			=> 'Podsumowania',
	'TH_OVERHEAD'		=> 'Przeciążenie',
	'TABLE_ERROR'		=> 'Musisz wybrać co najmniej jedną tabelę.',
	'TABLE_EMPTY'		=> 'Silnik przechowywania tabeli nie jest obsługiwany.',
));
