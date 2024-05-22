<?php
function lang($phrase) {
    static $lang = array(
        // dashboard phrases
        "categories" => "sections",
        // يمكن إضافة المزيد من العبارات هنا
    );

    return isset($lang[$phrase]) ? $lang[$phrase] : $phrase;
}
?>
