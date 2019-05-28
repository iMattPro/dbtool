<?php
/**
*
* Database Optimize & Repair Tool [English]
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
	'ACP_OPTIMIZE_REPAIR'			=> 'Otimizar &amp; Reparar',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'Aqui você pode otimizar ou reparar suas tabelas relacionadas ao phpBB. Para bancos de dados grandes, isso pode levar vários minutos para ser concluído. <Strong>OTIMIZAR</strong> irá desfragmentar o banco de dados e oferecer melhor desempenho do banco de dados. <Strong>REPARAR</strong> só deve ser usado se você tiver motivos para acreditar que seu banco de dados está travado ou com tabelas corrompidas. Nota: Tabelas <strong>InnoDB</strong> não suportam a opção Reparar.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Opções de Base de Dados',
	'DISABLE_BOARD'					=> 'Desabilitar Fórum',
	'DISABLE_BOARD_EXPLAIN'			=> 'Você pode desabilitar o fórum durante o processo. O fórum será ativado no final do processo.',
	'OPTIMIZE'			=> 'Otimizar',
	'OPTIMIZE_SUCCESS'	=> 'A otimização das tabelas selecionadas está completa.',
	'REPAIR'			=> 'Reparar',
	'REPAIR_SUCCESS'	=> 'O reparo das tabelas selecionadas está completa.',
	'CHECK'				=> 'Checar',
	'CHECK_SUCCESS'		=> 'Checagem completa.<br />Se você não conseguir um "OK", ou um "Tabela já está atualizada" você deve executar um reparo da tabela.',
	'WARNING'			=> 'Alerta',
	'WARNING_EXPLAIN'	=> 'Esta ferramenta não tem GARANTIA e os usuários da mesma devem fazer o backup de todo o banco de dados em caso de falha.<br /><br />Antes de continuar, verifique se você tem um backup do banco de dados!',
	'WARNING_MYSQL'		=> 'Esse recurso só funciona com banco de dados MySQL.',
	'MARK_OVERHEAD'		=> 'Marcar tabelas com sobrecarga',
	'PROCESSING'		=> 'Processando sua requisição... Por favor aguarde...',
	'TH_NAME'			=> 'Nome da tabela',
	'TH_TYPE'			=> 'Tipo',
	'TH_SIZE'			=> 'Tamanho',
	'TH_TOTAL'			=> 'Totais',
	'TH_OVERHEAD'		=> 'Sobrecarga',
	'TABLE_ERROR'		=> 'Você deve selecionar ao menos uma tabela.',
	'TABLE_EMPTY'		=> 'Mecanismo de armazenamento da tabela não suportado.',
	'CLI_DBTOOL_EXPLAIN'	=> 'Check, optimise and repair database tables.',
	'CLI_DBTOOL_ARG_TABLE'	=> '[Optional] You can specify a single table by name to perform the operation on.',
	'CLI_DBTOOL_CONTINUE'	=> 'Do you wish to continue?',
	'CLI_DBTOOL_OPERATION'	=> 'Choose an operation to perform',
	'CLI_DBTOOL_RESULTS'	=> '%s Results',
	'CLI_DBTOOL_LOCK_ERROR'	=> 'The operation could not be performed, a database operation is already in progress by another process. Try again in an hour.',
));
