<?php
session_start();
if (isset($_SESSION["USERNAME"])) {
    include "init.php";
    echo "Welcome " . $_SESSION["USERNAME"];
    
    // محتوى لوحة التحكم هنا

    include $tpl . "footer.php";
} else {
    echo "You are not authorized to view this page.";
    header("refresh:3;url=index.php"); // إعادة التوجيه بعد 3 ثوان
    exit();
}
?>
