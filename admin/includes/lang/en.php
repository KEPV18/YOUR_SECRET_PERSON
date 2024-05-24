<?php
function lang($phrase) {
    static $lang = array(
        // dashboard phrases
        "categories" => "Categories",
        "home" => "Home",
        "link" => "Link",
        "dropdown" => "Dropdown",
        "edit_profile" => "Edit your Profile",
        "settings" => "Settings",
        "logout" => "Logout"
    );

    return isset($lang[$phrase]) ? $lang[$phrase] : $phrase;
}
?>
