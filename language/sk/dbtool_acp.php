<?php
/**
*
* Database Optimize & Repair Tool [Slovak]
* Translated by ansysko miskin@miskin.sk
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimalizácia a oprava',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Tu môžete optimalizovať alebo opraviť phpBB tabuľky. U veľkých databáz, to môže trvať niekoľko minút. <strong>OPTIMALIZÁCIA</strong> defragmentuje databázu a poskytne lepší výkon. <strong>OPRAVA</strong> mala by byť použitá len v prípade, keď databáza zlyhala alebo je poškodená. Poznámka: <strong>InnoDB</strong> tabulky nepodporujú opravu.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Nastavenie',
	'DISABLE_BOARD'					=> 'Vypnúť fórum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Môžete dočasne vypnúť fórum, po oprave sa fórum spustí.',
	'OPTIMIZE'			=> 'Optimalizácia',
	'OPTIMIZE_SUCCESS'	=> 'Optimalizácia vybraných tabuliek bola ukončená.',
	'REPAIR'			=> 'Oprava',
	'REPAIR_SUCCESS'	=> 'Oprava vybratých tabuliek bola ukončená.',
	'CHECK'				=> 'Kontrola',
	'CHECK_SUCCESS'		=> 'Kontrola ukončená.<br />Ak sa nezobrazí “OK”, alebo “Table is already up to date” mali byste spustiť opravu.',
	'WARNING'			=> 'Pozor',
	'WARNING_EXPLAIN'	=> 'Tento nástroj je BEZ ZÁRUKY a užívatelia tohto nástroja by mali zálohovať celú svoju ​​databázu v prípade poruchy.<br /><br />Pred pokračovaním spustíte zálohu!',
	'WARNING_MYSQL'		=> 'Pracuje len s mysql databázou.',
	'MARK_OVERHEAD'		=> 'Označiť neoptimálne tabuľky',
	'PROCESSING'		=> 'Proces pokračuje... Čakajte...',
	'TH_NAME'			=> 'Názov tabuľky',
	'TH_TYPE'			=> 'Typ',
	'TH_SIZE'			=> 'Veľkosť',
	'TH_TOTAL'			=> 'Celkom',
	'TH_OVERHEAD'		=> 'Neoptimálne',
	'TABLE_ERROR'		=> 'Musíte vybrať aspoň jednu tabuľku.',
	'TABLE_EMPTY'		=> 'Tento typ databázy nieje podporovaný.',
));
