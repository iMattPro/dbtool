<?php
/**
*
* Database Optimize & Repair Tool [Deutsch]
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimieren &amp; Reparieren',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Hier kannst du deine phpBB bezogenen Tabellen optimieren oder reparieren. Für grosse Datenbanken kann die Kompletierung mehrere Minuten in Anspruch nehmen. <strong>OPTIMIEREN</strong> defragmentiert deine Datenbank und kann zu einer Leistungssteigerung der Datenbank führen. <strong>REPARIEREN</strong> sollte nur verwendet werden, wenn du Grund zur Annahme hast, dass deine Datenbank abgestürzt ist oder kaputte Tabellen beinhaltet. Notiere: <strong>InnoDB</strong> Tabellen unterstützen keine Reparatur.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Datenbank Optionen',
	'DISABLE_BOARD'					=> 'Forum deaktivieren',
	'DISABLE_BOARD_EXPLAIN'			=> 'Du kannst das Forum während dieses Prozesses deaktivieren. Das Forum wird nach Beendigung des Prozesses automatisch wieder aktiviert.',
	'OPTIMIZE'			=> 'Optimieren',
	'OPTIMIZE_SUCCESS'	=> 'Optimierung der gewählten Tabellen ist abgeschlossen.',
	'REPAIR'			=> 'Reparieren',
	'REPAIR_SUCCESS'	=> 'Das Reparieren der gewählten Tabellen ist abgeschlossen.',
	'CHECK'				=> 'Überprüfung',
	'CHECK_SUCCESS'		=> 'Überprüfung abgeschlossen.<br />Wenn du kein “OK” bekommst oder “Tabelle ist bereits auf dem neuesten Stand” solltest du in der Regel ein Reparatur der Tabelle laufen lassen.',
	'WARNING'			=> 'Warnung',
	'WARNING_EXPLAIN'	=> 'Dieses Werkzeug kommt OHNE GARANTIE auf etwaige Fehler und Benutzer dieses Werkzeugs sollten ihre komplette Datenbank sichern.<br /><br />Bevor du fortfährst vergewissere Dich, dass du ein Datenbank-Backup gemacht hast!',
	'WARNING_MYSQL'		=> 'Dieses Funktion arbeitet nur mit MySQL Datenbanken.',
	'MARK_OVERHEAD'		=> 'Markiere Tabellen mit Überlappung',
	'PROCESSING'		=> 'Deine Anfrage wird bearbeitet... Bitte warten...',
	'TH_NAME'			=> 'Tabellenname',
	'TH_TYPE'			=> 'Type',
	'TH_SIZE'			=> 'Grösse',
	'TH_TOTAL'			=> 'Totals',
	'TH_OVERHEAD'		=> 'Überlappung',
	'TABLE_ERROR'		=> 'Du musst zumindest eine Tabelle wählen.',
	'TABLE_EMPTY'		=> 'Tabellen Speicher-Engine nicht unterstützt.',
));
