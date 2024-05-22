<?php
session_start();

// إذا كان المستخدم مسجل الدخول بالفعل، انتقل إلى الصفحة الرئيسية
if (isset($_SESSION["USERNAME"])) {
    header("Location: dashboard.php");
    exit();
}

$nonavpar = "";

// تضمين ملفات التهيئة
include "init.php";

// التحقق مما إذا كان الطلب قادمًا عبر POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["pass"];
    $hashedpass = sha1($password);

    // التحقق من وجود المستخدم في قاعدة البيانات
    $stmt = $con->prepare("SELECT username, password FROM users WHERE username = ? AND password = ? AND Groupid = 1");
    $stmt->execute([$username, $hashedpass]);

    // جلب النتيجة
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    // إذا كانت النتيجة تحتوي على سجل واحد على الأقل، سجل الدخول
    if ($count > 0) {
        $_SESSION["USERNAME"] = $username;  // تسجيل اسم المستخدم في الجلسة
        echo "Welcome " . $username;
        header("refresh:3;url=dashboard.php");
        exit();
    } else {
        echo "Invalid Username or Password";
    }
}
?>

<form class="login" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <h4>Admin login</h4> 
    <input class="form-control form-control-lg" type="text" name="user" placeholder="username" autocomplete="off"/>
    <input class="form-control form-control-lg" type="password" name="pass" placeholder="password" autocomplete="new-password"/>
    <input class="btn btn-primary btn-block" type="submit" value="login"/>
</form>

<?php
// تضمين تذييل الصفحة
include $tpl . "footer.php";
?>