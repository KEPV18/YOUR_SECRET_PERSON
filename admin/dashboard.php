<?php
session_start();
if (isset($_SESSION["USERNAME"])) {
    include "init.php";
    echo "Welcome " . $_SESSION["USERNAME"];

    include $tpl . "footer.php";
    
    header("refresh:3;url=dashboard.php"); // Redirect after 3 seconds
    exit();
} else {
    echo "You are not authorized to view this page.";
    header("refresh:3;url=index.php"); // Redirect after 3 seconds
    exit();
}


?>



