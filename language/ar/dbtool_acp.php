<?php
/**
*
* Database Optimize & Repair Tool [Arabic]
*
* @copyright (c) 2013 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated By : Bassel Taha Alhitary <http://alhitary.net>
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
	'ACP_OPTIMIZE_REPAIR'			=> 'تحسين وإصلاح',
	'ACP_OPTIMIZE_REPAIR_EXPLAIN'	=> 'من هنا تستطيع تحسين أو إصلاح جداول منتداك phpBB. لقواعد البيانات ذات الحجم الكبير, قد تستغرق العملية دقائق عديدة. <strong>تحسين</strong> سوف يلغي تجزئة قاعدة البيانات الخاصة بك ويمكن أن يقدم أداء أفضل لقاعدة البيانات. <strong>إصلاح</strong> تستخدمه فقط إذا لديك سبب أكيد للإعتقاد بأن هناك ضرر في قاعدة بياناتك أو خلل في الجداول. ملاحظة: جداول محرك التخزين <strong>InnoDB</strong> لا تقبل عملية الإصلاح.',
	'OPTIMIZE_REPAIR_OPTIONS'		=> 'خيارات قاعدة البيانات',
	'DISABLE_BOARD'					=> 'تعطيل المنتدى',
	'DISABLE_BOARD_EXPLAIN'			=> 'تستطيع تعطيل المنتدى أثناء هذه العملية. سيتم تفعيل المنتدى بعد الإنتهاء من العملية.',
	'OPTIMIZE'			=> 'تحسين',
	'OPTIMIZE_SUCCESS'	=> 'تم الإنتهاء من تحسين الجداول التي حددتها.',
	'REPAIR'			=> 'إصلاح',
	'REPAIR_SUCCESS'	=> 'تم الإنتهاء من إصلاح الجداول التي حددتها.',
	'CHECK'				=> 'فحص',
	'CHECK_SUCCESS'		=> 'تمت عملية الفحص.<br>يجب عليك إجراء إصلاح للجدول بشكل طبيعي إذا لم تحصل على النتيجة “OK”, أو “تم تحديث الجدول مسبقاً”.',
	'WARNING'			=> 'تحذير',
	'WARNING_EXPLAIN'	=> 'هذه الأداة لا تعطي أي ضمانات ويجب عليك أخذ نسخة احتياطية لكل قاعدة البيانات في حالة فشل العملية.<br><br>قبل أن تبدأ, تأكد من أخذ نسخة احتياطية لقاعدة البيانات !',
	'WARNING_MYSQL'		=> 'هذه الميزة تعمل فقط مع قواعدة البيانات MySQL.',
	'MARK_OVERHEAD'		=> 'تحديد الجداول المتجاوزة',
	'PROCESSING'		=> 'جاري معالجة طلبك... نرجوا الانتظار...',
	'TH_NAME'			=> 'إسم الجدول',
	'TH_TYPE'			=> 'النوع',
	'TH_SIZE'			=> 'الحجم',
	'TH_TOTAL'			=> 'الإجمالي',
	'TH_OVERHEAD'		=> 'متجاوز',
	'TABLE_ERROR'		=> 'يجب عليك تحديد جدول واحد على الأقل.',
	'TABLE_EMPTY'		=> 'محرك تخزين الجدول غير مدعوم.',
	'CLI_DBTOOL_EXPLAIN'	=> 'فحص, تحسين وإصلاح جداول قاعدة البيانات.',
	'CLI_DBTOOL_ARG_TABLE'	=> '[اختياري] تستطيع تحديد جدول واحد بالاسم لتنفيذ العملية عليه.',
	'CLI_DBTOOL_CONTINUE'	=> 'هل تريد الاستمرار؟',
	'CLI_DBTOOL_OPERATION'	=> 'اختار عملية للتنفيذ',
	'CLI_DBTOOL_RESULTS'	=> '%s نتائج',
	'CLI_DBTOOL_LOCK_ERROR'	=> 'لا يمكن إجراء العملية, هناك عملية قيد التنفيذ الآن في قاعدة البيانات بواسطة عملية أخرى. حاول مرة أخرى بعد ساعة.',
));
