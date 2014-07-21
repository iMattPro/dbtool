<?php
/**
*
* Database Optimize & Repair Tool [Romanian]
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimizare &amp; Reparare',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Aici puteţi optimiza sau repara tabelele phpBB din baza dumneavoastră de date. Pentru baze de date mari, acest utilitar poate dura câteva minute până la finalizare. <strong>OPTIMIZAREA</strong> va defragmenta baza de date şi poate oferi îmbunătăţiri de performanţă a acesteia. <strong>REPARAREA</strong> ar trebui folosită numai dacă aveţi motive să credeţi că baza de date are tabele corupte. Notă: tabelele <strong>InnoDB</strong> nu suportă Repararea.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Opţiuni bază de date',
	'DISABLE_BOARD'					=> 'Dezactivează forum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Trebuie ca forum-ul să fie dezactivat în timpul acestui proces. Forum-ul va fi reactivat la sfârşitul procesului.',
	'OPTIMIZE'			=> 'Optimizare',
	'OPTIMIZE_SUCCESS'	=> 'Optimizarea tabelului(tabelelor) selectat(e) este completă.',
	'REPAIR'			=> 'Reparare',
	'REPAIR_SUCCESS'	=> 'Repararea tabelului(tabelelor) selectat(e) este completă.',
	'CHECK'				=> 'Verifică',
	'CHECK_SUCCESS'		=> 'Verificare completă.<br />Daca nu obţineţi un "OK", sau "Tabelul este deja actualizat" ar trebui să rulaţi o reparare normală a tabelului.',
	'WARNING'			=> 'Avertisment',
	'WARNING_EXPLAIN'	=> 'Acest instrument nu vine cu NICI O GARANŢIE. Utilizatorii acestui instrument ar trebui să salveze întreaga bază de date în caz de eşec.<br /><br />Înainte de a continua, fiţi siguri că aţi efectuat o copie de rezervă (backup) a bazei de date!',
	'WARNING_MYSQL'		=> 'Această facilitate funcţionează numai cu baze de date MySQL.',
	'MARK_OVERHEAD'		=> 'Marcaţi tabelele de deasupra.',
	'PROCESSING'		=> 'Cerere procesată... Vă rugăm aşteptaţi...',
	'TH_NAME'			=> 'Numele tabelului',
	'TH_TYPE'			=> 'Tipul',
	'TH_SIZE'			=> 'Dimensiunea',
	'TH_TOTAL'			=> 'Totaluri',
	'TH_OVERHEAD'		=> 'Deasupra',
	'TABLE_ERROR'		=> 'Trebuie să selectaţi cel puţin un tabel.',
	'TABLE_EMPTY'		=> 'Stocarea tabelelor nu este suportată.',
));
