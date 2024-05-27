<?php
// Manage members page from here
// You can add, edit, and delete members

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
        if (isset($_GET["USERID"])&&($_GET["USERID"])) {
            $userid = $_SESSION["ID"]; // Use the session value instead of $_GET["userid"]
            ?>
            <h1 class="text-center">Edit Member</h1>
            <div class="container">
                <form action="update.php" method="POST" class="row g-3">
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
                    <!-- start username field -->
                    <div class="col-md-12">
                        <label for="username" class="form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" id="username" autocomplete="off" />
                        </div>
                    </div>
                    <!-- end username field -->

                    <!-- start password field -->
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" autocomplete="new-password" class="form-control" id="password" placeholder="Leave blank if you don't want to change" />
                        </div>
                    </div>
                    <!-- end password field -->

                    <!-- start email field -->
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" />
                        </div>
                    </div>
                    <!-- end email field -->

                    <!-- start full name field -->
                    <div class="col-md-12">
                        <label for="fullname" class="form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" class="form-control" id="fullname" />
                        </div>
                    </div>
                    <!-- end full name field -->

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>
                </form>
            </div>
            <?php
        }
    }

    // محتوى لوحة التحكم هنا
    include $tpl . "footer.php";
} else {
    echo "You are not authorized to view this page.";
    header("refresh:3;url=index.php"); // إعادة التوجيه بعد 3 ثوان
    exit();
}
?>
