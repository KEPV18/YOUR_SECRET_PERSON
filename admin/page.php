<?php 

/*
categories =>  {manage edit update add insert delete stats}
*/

// استخدم التخصيص الثلاثي لتعيين قيمة $do
$do = isset($_GET['do']) ? $_GET['do'] : "manage";

// عرض الصفحة بناءً على قيمة $do
switch ($do) {
    case "manage":
        echo "Welcome, you are in the manage category page.";
        echo '<a href="?do=add">add new category +</a>';
        break;
    case "add":
        echo "You are in the add category page.";
        break;
    case "edit":
        echo "You are in the edit category page.";
        break;
    case "update":
        echo "You are in the update category page.";
        break;
    case "insert":
        echo "You are in the insert category page.";
        break;
    case "delete":
        echo "You are in the delete category page.";
        break;
    case "stats":
        echo "You are in the stats category page.";
        break;
    default:
        echo "Invalid category.";
        break;
}

?>
