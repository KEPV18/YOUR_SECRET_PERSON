<?php
session_start();
if (isset($_SESSION["USERNAME"])) {
    include "init.php";
    echo "Welcome " . $_SESSION["USERNAME"];
    
    include $tpl . "footer.php";

    // تأجيل إعادة التوجيه لضمان عرض الرسالة أولاً
    header("refresh:3;url=dashboard.php"); // إعادة التوجيه بعد 3 ثوان
    exit();
} else {
    echo "You are not authorized to view this page.";
    header("refresh:3;url=index.php"); // إعادة التوجيه بعد 3 ثوان
    exit();
}
?>
