<?php
/**
*
* @package Database Optimize & Repair Tool
* @copyright (c) 2013 Matt Friedman
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace vse\dbtool\acp;

/**
* @package module_install
*/
class dbtool_info
{
	function module()
	{
		return array(
			'filename'	=> '\vse\dbtool\acp\dbtool_module',
			'title'		=> 'ACP_OPTIMIZE_REPAIR',
			'modes'		=> array(
				'view'	=> array('title' => 'ACP_OPTIMIZE_REPAIR', 'auth' => 'ext_vse/dbtool && acl_a_backup', 'cat' => array('ACP_CAT_DATABASE')),
			),
		);
	}
}
