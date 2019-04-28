<?php
/**
*
* Database Optimize & Repair Tool [French]
*
* @copyright (c) 2013 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
* French translation by Galixte (http://www.galixte.com)
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimiser &amp; réparer',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Ici vous pouvez optimiser ou réparer les tables de la base de données de votre forum phpBB. Pour les bases de données importantes plusieurs minutes seront nécessaires. La fonction <strong>OPTIMISER</strong> va défragmenter votre base de données et vous offrir de meilleures performances. La fonction <strong>REPARER</strong> doit être utilisée lorsque vous avez des raisons de croire que votre base de données a rencontré une erreur ou contient des tables corrompues. Note : les tables <strong>InnoDB</strong> ne supportent pas la fonction REPARER.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Options de la base de données',
	'DISABLE_BOARD'					=> 'Désactiver le forum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Vous pouvez désactiver le forum durant la procédure. Le forum sera activé à la fin de la procédure.',
	'OPTIMIZE'			=> 'Optimiser',
	'OPTIMIZE_SUCCESS'	=> 'L’optimisation est terminée.',
	'REPAIR'			=> 'Réparer',
	'REPAIR_SUCCESS'	=> 'La réparation est terminée.',
	'CHECK'				=> 'Examen',
	'CHECK_SUCCESS'		=> 'L’examen est terminé.<br />Si vous n’obtenez pas comme retour : « OK » ou « Table(s) déjà à jour », vous devez exécuter une réparation.',
	'WARNING'			=> 'Avertissement',
	'WARNING_EXPLAIN'	=> 'Cet outil ne garantit pas son bon fonctionnement. Tout utilisateur de cet outil se doit de réaliser une sauvegarde de sa base de données au préalable de toute utilisation.<br /><br />Avant de poursuivre, assurez-vous d’avoir réalisé une sauvegarde de votre base de données !',
	'WARNING_MYSQL'		=> 'Cet fonctionnalité supporte uniquement les bases de données MySQL.',
	'MARK_OVERHEAD'		=> 'Marquer les tables ayant de la perte',
	'PROCESSING'		=> 'Traitement de votre demande ... Veuillez patienter ...',
	'TH_NAME'			=> 'Nom de la table',
	'TH_TYPE'			=> 'Type',
	'TH_SIZE'			=> 'Taille',
	'TH_TOTAL'			=> 'Totaux',
	'TH_OVERHEAD'		=> 'Perte',
	'TABLE_ERROR'		=> 'Vous devez sélectionner au moins une table.',
	'TABLE_EMPTY'		=> 'Le système de stockage de la table n’est pas supporté.',
	'CLI_DBTOOL_EXPLAIN'	=> 'Check, optimise and repair database tables.',
	'CLI_DBTOOL_ARG_TABLE'	=> '[Optional] You can specify a single table by name to perform the operation on.',
	'CLI_DBTOOL_CONTINUE'	=> 'Do you wish to continue?',
	'CLI_DBTOOL_OPERATION'	=> 'Choose an operation to perform',
	'CLI_DBTOOL_RESULTS'	=> '%s Results',
	'CLI_DBTOOL_LOCK_ERROR'	=> 'The operation could not be performed, a database operation is already in progress by another process. Try again in an hour.',
));
