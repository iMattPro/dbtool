<?php
/**
*
* Database Optimize & Repair Tool [Persian]
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
	'ACP_OPTIMIZE_REPAIR'			=> 'بهینه سازی و تعمیر',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'در این جا می توانید جداول پایگاه داده را بهینه سازی یا تعمیر کنید. برای پایگاه های داده ی حجیم ممکن است زمان بیشتری طول بکشد. <strong>بهینه سازی</strong> اطلاعات پایگاه داده را یکپارچه می کند و بارگذاری آن را تسهیل می بخشد. <strong>تعمیر</strong> برای مواقعی است که شما احساس می کنید اشکالی در پایگاه داده وجود دارد.. توجه: جداول  <strong>InnoDB</strong> برای تعمیر قابل پشتیبانی نیستند..',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'تنظیمات پایگاه داده',
	'DISABLE_BOARD'					=> 'غیرفعال کردن انجمن',
	'DISABLE_BOARD_EXPLAIN'			=> 'می توانید در طی فرایند بهینه سازی انجمن را غیرفعال کنید. بعد از اتمام عملیات انجمن فعال می شود.',
	'OPTIMIZE'			=> 'بهینه سازی',
	'OPTIMIZE_SUCCESS'	=> 'بهینه سازی جدول های انتخابی انجام شد.',
	'REPAIR'			=> 'تعمیر',
	'REPAIR_SUCCESS'	=> 'تعمیر جدول های انتخابی انجام شد.',
	'CHECK'				=> 'بررسی',
	'CHECK_SUCCESS'		=> 'بررسی کامل شد.<br />اگر "OK" نمایش داده نمی شود، یا  “Table is already up to date” باید عمل "تعمیر" را برای جدول ذکر شده انجام دهید.',
	'WARNING'			=> 'هشدار',
	'WARNING_EXPLAIN'	=> 'عملکرد این ابزار تضمین شده نیست،  و کاربران قبل از استفاده باید بک آپ کاملی از دیتابیس تهیه کنند.<br /><br />قبل از ادامه، مطمئن شوید که از پایگاه داده پشتیبان دارید!',
	'WARNING_MYSQL'		=> 'این خصوصیت فقط با جداول MySQL کار می کند.',
	'MARK_OVERHEAD'		=> 'علامتگذاری جداولی که فضای نامرتب دارند.',
	'PROCESSING'		=> 'در حال انجام... لطفا صبر کنید...',
	'TH_NAME'			=> 'نام جدول',
	'TH_TYPE'			=> 'نوع',
	'TH_SIZE'			=> 'حجم',
	'TH_TOTAL'			=> 'کل',
	'TH_OVERHEAD'		=> 'فضای خالی نامرتب',
	'TABLE_ERROR'		=> 'حداقل باید یک جدول را انتخاب کنید.',
	'TABLE_EMPTY'		=> 'جدول ذخیره سازی پشتیبانی نمی شود.',
));
