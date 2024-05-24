<?php
function lang($phrase) {
    static $lang = array(
        // dashboard phrases
        "categories" => "Sections",
        "home" => "Main",
        "link" => "URL",
        "dropdown" => "Options",
        "edit_profile" => "Update Profile",
        "settings" => "Preferences",
        "logout" => "Sign Out"
    );

    return isset($lang[$phrase]) ? $lang[$phrase] : $phrase;
}
?>
