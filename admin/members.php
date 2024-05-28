<?php
session_start();
$pageTitle = "MEMBERS";

if (isset($_SESSION["USERNAME"])) {
    include "init.php";

    $do = isset($_GET['do']) ? $_GET['do'] : "manage";

    // Start manage page
    if ($do == "manage") {
        // Manage page
        echo "Welcome to the manage page.";
    } elseif ($do == "edit") { // Edit page

        // التحقق من وجود معرف المستخدم في الرابط وتحويله إلى رقم صحيح
        $userid = (isset($_GET["userid"]) && is_numeric($_GET["userid"])) ? intval($_GET["userid"]) : 0;

        // استخدام قيمة الجلسة إذا كانت متاحة وإلا قيمة افتراضية
        $session_userid = $_SESSION["ID"] ?? null;

        // التحقق من أن المستخدم لديه الصلاحية لتعديل هذا المستخدم
        if ($userid == $session_userid) {
            // استعلام SQL لاسترداد معلومات المستخدم
            $stmt = $con->prepare("SELECT * FROM users WHERE userid = ? LIMIT 1");
            $stmt->execute([$userid]);
            $row = $stmt->fetch();
            $count = $stmt->rowCount();

            if ($count > 0) {
?>
                <!-- نموذج تحرير المستخدم -->
                <h1 class="text-center">Edit Member</h1>
                <div class="container">
                    <form action="update.php" method="POST" class="row g-3">
                        <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
                        <!-- حقل اسم المستخدم -->
                        <div class="col-md-12">
                            <label for="username" class="form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="username" value="<?php echo $row["username"] ?>"    autocomplete="off" />
                            </div>
                        </div>
                        <!-- حقل كلمة المرور -->
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" autocomplete="new-password" class="form-control" id="password" placeholder="Leave blank if you don't want to change" />
                            </div>
                        </div>
                        <!-- حقل البريد الإلكتروني -->
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="<?php echo $row["email"] ?>" id="email" />
                            </div>
                        </div>
                        <!-- حقل الاسم الكامل -->
                        <div class="col-md-12">
                            <label for="fullname" class="form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="fullname" class="form-control"value="<?php echo $row["fullname"] ?>" id="fullname" />
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>
                </div>
<?php
            } else {
                echo "There is no such id.";
            }
        } else {
            echo "You are not authorized to edit this user.";
        }
    }

    // Content of the control panel here
    include $tpl . "footer.php";
} else {
    echo "You are not authorized to view this page.";
    header("refresh:3;url=index.php"); // Redirect after 3 seconds
    exit();
}
?>
