<?php
/**
*
* Database Optimize & Repair Tool [Croatian]
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimizacija &amp; Reparacija',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Obvdje možete optimizirati ili reparirati svoje phpBB tablice. Kod velikih baza to može potrajati nekoliko trenutaka. <strong>OPTIMIZACIJA</strong> će defragmentirati bazu podataka i može ponuditi bolje performanse baze podataka. <strong>REPARACIJU</strong> streba koristiti samo ukoliko vjerujete da se vaša baza podataka srušila ili je oštećena. Napomena: <strong>InnoDB</strong> tablice nisu podržane za repariranje.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Opcije databaze',
	'DISABLE_BOARD'					=> 'Onemogući forum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Možete isključiti forum tijekom ovog procesa, forum će biti ponovno omogućen na kraju samog procesa.',
	'OPTIMIZE'			=> 'Optimiziraj',
	'OPTIMIZE_SUCCESS'	=> 'Optimizacija odabranih tablica je završena.',
	'REPAIR'			=> 'Repariraj',
	'REPAIR_SUCCESS'	=> 'Reparacija odabranih tablica je završena.',
	'CHECK'				=> 'Provjera',
	'CHECK_SUCCESS'		=> 'Provjera je završena.<br />Ukoliko ne dobijete “OK”, ili “Tablica je već ažurirana” trebate pokrenuti repariranje.',
	'WARNING'			=> 'Upozorenje',
	'WARNING_EXPLAIN'	=> 'Ovaj alat radi BEZ JAMSTVA i svi korisnici bi trebali imati kopije baze podataka.<br /><br />Prije nego što nastavite provjerite da li imate kopiju baze, a ako nemate tada napravite kopiju baze podataka!',
	'WARNING_MYSQL'		=> 'Ova opcija radi samo sa MySQL bazama.',
	'MARK_OVERHEAD'		=> 'Označite tablice za preklapanje',
	'PROCESSING'		=> 'Obrada u tijeku... Molimo pričekajte...',
	'TH_NAME'			=> 'Ime tablice',
	'TH_TYPE'			=> 'Tip',
	'TH_SIZE'			=> 'Veličina',
	'TH_TOTAL'			=> 'Ukupno',
	'TH_OVERHEAD'		=> 'Preklapanja',
	'TABLE_ERROR'		=> 'Morate odabrati barem jednu tablicu.',
	'TABLE_EMPTY'		=> 'Odabrana tablica nije podržana.',
));
