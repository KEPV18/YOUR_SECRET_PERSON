<?php
function lang($phrase) {
    static $lang = array(
        // dashboard phrases NAV BAR LINKS 
        "home" => "Main",
        "categories" => "Sections",
         "" => "",

        
        "dropdown" => "Options",
        "edit_profile" => "Update Profile",
        "settings" => "Preferences",
        "logout" => "Sign Out",
        "ITEMS" => "Items",
        "MEMBERS" => "Members",
        "STATISTICS" => "Statistics",
        "LOGS" => "Logs",
    );

    return isset($lang[$phrase]) ? $lang[$phrase] : $phrase;
}
?>
