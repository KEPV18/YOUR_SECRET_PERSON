<?php

// Function that echoes the page title in case the page has the variable $pageTitle, and echoes a default for other pages
function getTitle() {
    global $pageTitle; // Make $pageTitle accessible within the function
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo 'Default Title'; // Default title
    }
}

?>
