<?php
session_start();

// إذا كان المستخدم مسجل الدخول بالفعل، انتقل إلى الصفحة الرئيسية
if (isset($_SESSION["USERNAME"])) {
    header("Location: dashboard.php");
    exit();
}

$noNavbar = "";  // التصحيح هنا بتغيير المتغير إلى camelCase
$pageTitle = "Login";

// تضمين ملفات التهيئة
include "init.php";

// التحقق مما إذا كان الطلب قادمًا عبر POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["pass"];
    $hashedPass = sha1($password);

    // التحقق من وجود المستخدم في قاعدة البيانات
    $stmt = $con->prepare("SELECT userid, username, password FROM users WHERE username = ? AND password = ? AND groupid = 1 LIMIT 1");
    $stmt->execute([$username, $hashedPass]);

    // جلب النتيجة
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    // إذا كانت النتيجة تحتوي على سجل واحد على الأقل، سجل الدخول
    if ($count > 0) {
        $_SESSION["USERNAME"] = $username;  // تسجيل اسم المستخدم في الجلسة
        $_SESSION["ID"] = $row["userid"];  // تسجيل معرف المستخدم في الجلسة
        echo "Welcome " . $username;

        header("refresh:3;url=dashboard.php");
        exit();
    } else {
        echo "Invalid Username or Password";
    }
}
?>

<form class="login" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <h4>Admin Login</h4>
    <input class="form-control form-control-lg" type="text" name="user" placeholder="Username" autocomplete="off" required />
    <input class="form-control form-control-lg" type="password" name="pass" placeholder="Password" autocomplete="new-password" required />
    <input class="btn btn-primary btn-block" type="submit" value="Login" />
</form>

<?php
// تضمين تذييل الصفحة
include $tpl . "footer.php";
?>
