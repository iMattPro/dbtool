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
	'ACP_OPTIMIZE_REPAIR'			=> 'Optimize et &amp; Onar',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'phpBB ilişkili tablolarınızı buradan optimize edebilir ya da onarabilirsiniz. Geniş veritabanları için bunun tamamlanması birkaç dakika sürebilir. <strong>OPTIMIZE ET</strong> seçeneği veritabanınızın parçalanmış kısımlarını birleştirir ve veritabanı performansını arttırır. <strong>ONAR</strong> seçeneği sadece veritabanı tablolarınızın çöktüğü veya zarar gördüğünü düşündüğünüz durumlarda çalıştırın. Not: <strong>InnoDB</strong> tabloları Onarılma seçeneğini desteklemiyor.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'Veritabanı seçenekleri',
	'DISABLE_BOARD'					=> 'Siteyi kapat',
	'DISABLE_BOARD_EXPLAIN'			=> 'Bu işlem süresince siteyi kapatabilirsiniz. İşlem bitiminde site aktif duruma gelecek.',
	'OPTIMIZE'			=> 'Optimize et',
	'OPTIMIZE_SUCCESS'	=> 'Seçili tablonun(ların) optimizasyonu tamamlandı.',
	'REPAIR'			=> 'Onar',
	'REPAIR_SUCCESS'	=> 'Seçili tablonun(ların) onarımı tamamlandı.',
	'CHECK'				=> 'Denetle',
	'CHECK_SUCCESS'		=> 'Denetleme tamamlandı.<br />“TAMAM” veya “Tablo zaten güncel” mesajı almadıysanız tablo onar seçeneğini çalıştırın.',
	'WARNING'			=> 'Uyarı',
	'WARNING_EXPLAIN'	=> 'Bu özelliğin HİÇ BİR GARANTİSİ YOKTUR ve bir hata durumuna karşı veritabanı yedeğinizi almalısınız.<br /><br />Devam etmeden önce veritabanı yedeğinizi aldığınıza emin olun!',
	'WARNING_MYSQL'		=> 'Bu özellik sadece MySQL veritabanı ile çalışır.',
	'MARK_OVERHEAD'		=> 'Havai sahip tabloları işaretle',
	'PROCESSING'		=> 'İsteğiniz yürütülüyor... Lütfen bekleyin...',
	'TH_NAME'			=> 'Tablo ismi',
	'TH_TYPE'			=> 'Tür',
	'TH_SIZE'			=> 'Boyut',
	'TH_TOTAL'			=> 'Toplam',
	'TH_OVERHEAD'		=> 'Overhead',
	'TABLE_ERROR'		=> 'En az bir tablo seçmelisiniz.',
	'TABLE_EMPTY'		=> 'Tablo depolama motoru desteklenmiyor.',
));
