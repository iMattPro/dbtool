<?php
/**
*
* Database Optimize & Repair Tool [Italian]
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Ottimizza & ripara',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Qui è possibile ottimizzare o riparare le tabelle relative a phpBB. Per grandi database, questo potrebbe richiedere alcuni minuti. <strong> OTTIMIZZA: </strong> deframmenterà il tuo database e può offrire migliori prestazioni del database. <strong> RIPARA: </strong> dovrebbe essere usato solo se si ha motivo di ritenere che il database è andato in crash o tabelle corrotte. Nota: le tabelle <strong>InnoDB</strong> non supportano la riparazione.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Opzioni del database',
	'DISABLE_BOARD'					=> 'Disablita il board',
	'DISABLE_BOARD_EXPLAIN'			=> 'Tu puoi disabilitare il board durante il processo. Il board sarà abilitato alla fine del processo.',
	'OPTIMIZE'			=> 'Ottimizza',
	'OPTIMIZE_SUCCESS'	=> 'L’ottimizazione delle tabelle selezionate è completatato.',
	'REPAIR'			=> 'Ripara',
	'REPAIR_SUCCESS'	=> 'La riparazione delle tabelle selezionate è completato.',
	'CHECK'				=> 'Verifica',
	'CHECK_SUCCESS'		=> 'Verifica completata.<br>Se non ottieni “OK” o “Tabella già aggiornata” dovresti eseguire normalmente una riparazione della tabella.',
	'WARNING'			=> 'Attenzione',
	'WARNING_EXPLAIN'	=> 'Questo strumento viene fornito con NESSUNA GARANZIA e gli utenti dovrebbero eseguire il backup di tutto il database in caso di guasto. <br> <br> Prima di continuare, assicuratevi di avere fatto un backup del database',
	'WARNING_MYSQL'		=> 'Questa caratteristica funziona solo con database MySQL.',
	'MARK_OVERHEAD'		=> 'Segna le tabelle sovraccariche',
	'PROCESSING'		=> 'Elaborazione della richiesta in corso ... attendere ...',
	'TH_NAME'			=> 'Nome della tabella',
	'TH_TYPE'			=> 'Tipo',
	'TH_SIZE'			=> 'Dimensione',
	'TH_TOTAL'			=> 'Totali',
	'TH_OVERHEAD'		=> 'Sovraccarico',
	'TABLE_ERROR'		=> 'È necessario selezionare almeno una tabella.',
	'TABLE_EMPTY'		=> 'Motore di memorizzazione tabella non supportato.',
));
