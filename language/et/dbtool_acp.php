<?php
/**
*
* Database Optimize & Repair Tool [English]
* Estonian translation by phpBBestonia.eu <https://www.phpbbestonia.eu>
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimeeri &amp; Paranda',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Siin saate optimeerida või parandada oma phpBB-ga seotud tabeleid. Suurte andmebaaside puhul võib see aega võtta mitu minutit. <strong>OPTIMEERIMINE</strong> defragmenteerib teie andmebaasi ja pakub paremat andmebaasi jõudlust. <strong>PARANDUST</strong> tohib kasutada ainult siis, kui teil on põhjust uskuda, et teie andmebaasis on tabelid kokku kukkunud või rikutud. Märkus: <strong>InnoDB</strong> tabelid ei toeta parandust.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Database options',
	'DISABLE_BOARD'					=> 'Keela foorum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Selle protsessi ajal võite foorumi keelata. Juhtpaneel on protsessi lõpus lubatud.',
	'OPTIMIZE'			=> 'Optimeeri',
	'OPTIMIZE_SUCCESS'	=> 'Valitud tabeli(te) optimeerimine on lõppenud.',
	'REPAIR'			=> 'Paranda',
	'REPAIR_SUCCESS'	=> 'Valitud tabeli(te) parandamine on lõppenud.',
	'CHECK'				=> 'Kontrolli',
	'CHECK_SUCCESS'		=> 'Kontrollimine lõppenud.<br>Kui te ei saa “OK”, või “Tabel on juba ajakohane”, peaksite tavaliselt tabeli parandama.',
	'WARNING'			=> 'Hoiatus',
	'WARNING_EXPLAIN'	=> 'Selle tööriista kasutamisega EI OLE GARANTIID ja selle tööriista kasutajad peaksid oma andmebaasi eelnevalt varundama, juhul kui peaks midagi ebaõnnestuma.<br><br>Enne jätkamist veenduge, et teil on andmebaasist varukoopia!',
	'WARNING_MYSQL'		=> 'See funktsioon töötab ainult MySQL-i andmebaasidega.',
	'MARK_OVERHEAD'		=> 'Märkige tabelid, mis on risustunud',
	'PROCESSING'		=> 'Teie taotluse töötlemine... Palun oodake...',
	'TH_NAME'			=> 'Tabeli nimetus',
	'TH_TYPE'			=> 'Tüüp',
	'TH_SIZE'			=> 'Suurus',
	'TH_TOTAL'			=> 'Kokku',
	'TH_OVERHEAD'		=> 'Risu',
	'TABLE_ERROR'		=> 'Peate valima vähemalt ühe tabeli.',
	'TABLE_EMPTY'		=> 'Tabeli salvestusmootorit ei toetata.',
	'CLI_DBTOOL_EXPLAIN'	=> 'Kontrollige, optimeerige ja parandage andmebaasi tabeleid.',
	'CLI_DBTOOL_ARG_TABLE'	=> '[Valikuline] Toimingu käivitamiseks saate määrata ühe tabeli nime järgi.',
	'CLI_DBTOOL_CONTINUE'	=> 'Kas soovite jätkata?',
	'CLI_DBTOOL_OPERATION'	=> 'Valige teostatav toiming',
	'CLI_DBTOOL_RESULTS'	=> '%s Tulemused',
	'CLI_DBTOOL_LOCK_ERROR'	=> 'Toimingut ei õnnestunud teostada, andmebaasi operatsioon on juba käimas teise protsessi abil. Proovige mõne tunni pärast uuesti.',
));
