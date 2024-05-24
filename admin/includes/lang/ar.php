<?php
function lang($phrase) {
    static $lang = array(
        // dashboard phrases
        "categories" => "الأقسام",
        "home" => "الرئيسية",
        "link" => "رابط",
        "dropdown" => "قائمة منسدلة",
        "edit_profile" => "تعديل الملف الشخصي",
        "settings" => "الإعدادات",
        "logout" => "تسجيل الخروج"
    );

    return isset($lang[$phrase]) ? $lang[$phrase] : $phrase;
}
?>