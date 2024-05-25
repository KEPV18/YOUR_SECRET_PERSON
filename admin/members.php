<?php
// Manage members page from here
// You can add, edit, and delete members

session_start();
if (isset($_SESSION["USERNAME"])) {
    include "init.php";

    $do = isset($_GET['do']) ? $_GET['do'] : "manage";

    // Start manage page
    if ($do == "manage") {
        // Manage page
        echo "Welcome to the manage page.";
    } elseif ($do == "edit") {
        // Edit page
        if (isset($_GET["USERID"])) {
            $userid = intval($_GET["USERID"]); // تأكد من تحويل ID إلى عدد صحيح لتجنب الثغرات الأمنية
            echo "Welcome to the edit page. YOUR User ID IS: " . $userid;
        } else {
            echo "No User ID provided.";
        }
    }

    // محتوى لوحة التحكم هنا
    $pageTitle = "Dashboard";
    include $tpl . "footer.php";
} else {
    echo "You are not authorized to view this page.";
    header("refresh:3;url=index.php"); // إعادة التوجيه بعد 3 ثوان
    exit();
}
?>