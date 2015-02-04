<?php
/**
*
* Database Optimize & Repair Tool [Croatian]
* Croatian translation by Ančica Sečan (http://ancica.sunceko.net)
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimiziraj &amp; Popravi',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Ovdje možeš optimizirati odnosno popravljati phpBB tablice.<br />U slučaju većih baza podataka, proces može potrajati nekoliko [pa i više] minuta.<br /><strong>Optimiziranje</strong> će defragmentirati bazu podataka uz mogućnost nuđenja poboljšanja performansi baze podataka.<br /><strong>Popravljanje</strong> bi trebalo biti korišteno samo u slučaju ako je baza podataka skršena odnosno [ukoliko] su tablice oštećene.<br />Napomena: <strong>InnoDB</strong> tablice ne podržavaju popravljanje.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Opcije baze podataka',
	'DISABLE_BOARD'					=> 'Onemogući forum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Forum možeš onemogućiti tijekom izvođenja procesa po svršetku kojeg će isti biti [ponovo] omogućen.',
	'OPTIMIZE'			=> 'Optimiziraj',
	'OPTIMIZE_SUCCESS'	=> 'Optimiziranje odabrane/izabranih tablica/e je gotovo.',
	'REPAIR'			=> 'Popravi',
	'REPAIR_SUCCESS'	=> 'Popravljanje odabrane/izabranih tablica/e je gotovo.',
	'CHECK'				=> 'Provjeri',
	'CHECK_SUCCESS'		=> 'Provjera je završena.<br />Ukoliko rezultat nije “OK” odnosno “Tablica je [već] ažurirana”, trebao/la bi pokrenuti postupak popravljanja tablice/a.',
	'WARNING'			=> 'Upozorenje',
	'WARNING_EXPLAIN'	=> '“Optimiziraj &amp; Popravi” <em>dolazi</em> <strong>bez ikakve garancije</strong> što će reći da bi trebao/la napraviti zaštitnu kopiju kompletne baze podataka za slučaj da nešto pođe po zlu.<br /><br />Prije nastavka, molim(o), provjeri jesi li pohranio/la zaštitnu kopiju baze podataka?!',
	'WARNING_MYSQL'		=> 'Ova značajka radi samo s MySQL bazama podataka.',
	'MARK_OVERHEAD'		=> 'Označi tablice s premašenjem',
	'PROCESSING'		=> 'Procesuiranje zahtjeva... Molim(o), pričekaj...',
	'TH_NAME'			=> 'Ime tablice',
	'TH_TYPE'			=> 'Tip',
	'TH_SIZE'			=> 'Veličina',
	'TH_TOTAL'			=> 'Ukupno',
	'TH_OVERHEAD'		=> 'Premašenje',
	'TABLE_ERROR'		=> 'Moraš izabrati [barem jednu] tablicu.',
	'TABLE_EMPTY'		=> 'Sustav pohranjivanja tablica nije podržan.',
));
