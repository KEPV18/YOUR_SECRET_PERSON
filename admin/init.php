<?php
// تضمين ملف الاتصال بقاعدة البيانات
include "connect.php";

// تعيين المسارات
$tpl = "includes/template/";    // مجلد القوالب
$css = "layout/css/";           // مجلد الـ CSS
$js = "layout/js/";             // مجلد الـ JS
$lang = "includes/lang/";       // مجلد اللغات
$func = "includes/functions/";  // مجلد الوظائف

// تضمين الملفات الهامة
include $func . "functions.php"; // ملف الوظائف
include $lang . "en.php";        // ملف اللغة الإنجليزية
include $tpl . "header.php";     // هيدر الصفحة

// تضمين نافبار في جميع الصفحات ما عدا الصفحات التي تحتوي على متغير $noNavbar
if (!isset($noNavbar)) {
    include $tpl . "navbar.php"; // نافبار
}
?>
