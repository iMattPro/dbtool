<?php
/**
*
* Database Optimize & Repair Tool [Spanish]
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimizar y Reparar',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Aquí puedes optimizar o reparar tus tablas relacionadas a phpBB. Para bases de datos demasiado grandes, podría tomar mucho tiempo. <strong>OPTIMIZAR</strong> defragmentará tu base de datos y puede ofrecer un mejor rendimiento. <strong>REPARAR</strong> utiliza ésto si tienes una razón para creer que tu base de datose se ha dañado o tiene tablas corruptas. Nota: <strong>InnoDB</strong> y sus tablas no son soportadas para reparación.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Opciones de base de datos',
	'DISABLE_BOARD'					=> 'Deshabilitar foro',
	'DISABLE_BOARD_EXPLAIN'			=> 'Puedes deshabilitar el foro durante este proceso. El foro será habilitado cuando el proceso termine.',
	'OPTIMIZE'			=> 'Optimizar',
	'OPTIMIZE_SUCCESS'	=> 'La optimizacion de la(s) tabla(s) seleccionada(s) esta completa.',
	'REPAIR'			=> 'Reparar',
	'REPAIR_SUCCESS'	=> 'Repación de la(s) tabla(s) seleccionada(s) se ha completado.',
	'CHECK'				=> 'Revisar',
	'CHECK_SUCCESS'		=> 'Revisión completa.<br />Si no consigues el "OK" o "La tabla ya ha sido actualizada" normalmente debes de ejecutar una reparación de la tabla.',
	'WARNING'			=> 'Atención',
	'WARNING_EXPLAIN'	=> 'Esta herramienta no viene con NINGUNA GARANTIA y los usuarios deberán respaldar su base de datos de forma completa en caso de un fallo.<br /><br />¡Antes de continuar, asegúrate de respaldar tu base de datos!',
	'WARNING_MYSQL'		=> 'Esta característica sólo trabaja con tablas de MySQL.',
	'MARK_OVERHEAD'		=> 'Marcar las tablas con sobrecarga',
	'PROCESSING'		=> 'Procesando tu petición... Por favor espera...',
	'TH_NAME'			=> 'Nombre de la tabla',
	'TH_TYPE'			=> 'Tipo',
	'TH_SIZE'			=> 'Tamaño',
	'TH_TOTAL'			=> 'Totales',
	'TH_OVERHEAD'		=> 'Sobrecarga',
	'TABLE_ERROR'		=> 'Debes seleccionar al menos una tabla.',
	'TABLE_EMPTY'		=> 'La estructura de la tabla no es soportada.',
));
