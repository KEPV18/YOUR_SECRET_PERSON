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

        // Check if user id is present in the URL and convert it to an integer
        $userid = (isset($_GET["USERID"]) && is_numeric($_GET["USERID"])) ? intval($_GET["USERID"]) : 0;

        // Use session value if available, otherwise default value
        $session_userid = $_SESSION["ID"] ?? null;

        // Check if the user has permission to edit this user
        if ($userid == $session_userid) {
            // SQL query to retrieve user information
            $stmt = $con->prepare("SELECT * FROM users WHERE userid = ? LIMIT 1");
            $stmt->execute([$userid]);
            $row = $stmt->fetch();
            $count = $stmt->rowCount();

            if ($count > 0) {
                ?>
                <!-- Edit user form -->
                <h1 class="text-center">Edit Member</h1>
                <div class="container">
                    <form action="?do=update" method="POST" class="row g-3">
                        <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
                        <!-- Full name field -->
                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Full Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="fullname" class="form-control" value="<?php echo $row["FULLNAME"]; ?>" id="fullname" />
                            </div>
                        </div>
                        <!-- Username field -->
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" name="username" class="form-control" id="username"  value="<?php echo $row["username"]; ?>" autocomplete="off" />
                            </div>
                        </div>
                        <!-- Email field -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>" id="email" />
                            </div>
                        </div>
                        <!-- Password field -->
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="oldpassword" value="<?php echo $row["password"]; ?>"/>
                                <input type="password" name="newpassword" class="form-control" id="password" autocomplete="new-password" />
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-15">
                          <button type="submit" class="btn btn-outline-success btn-lg">Save</button>
                        </div>
                    </form>
                </div>
                <?php
            } else {
                echo "There is no such id.";
            }
        } else {
            echo "You are not authorized to edit this user.";
            print_r($_SESSION);
        }
    } elseif ($do == "update") { // Update page
        echo "<h1 class='text-center'>Update Member</h1>";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get variables from the form
            $id     = $_POST['userid'];
            $user   = $_POST['username'];
            $email  = $_POST['email'];
            $name   = $_POST['fullname'];

            // Password handling
            $pass = empty($_POST["newpassword"]) ? $_POST["oldpassword"] : sha1($_POST["newpassword"]);

            // validate the form
                $formerrors = array();

                if (empty($user)) {
                    $formerrors[] = "Username can not be empty";
                } elseif (strlen($user) <= 3) {
                    $formerrors[] = "Username must be more than 4 characters";
                }

                if (empty($name)) {
                    $formerrors[] = "Full name can not be empty";
                } elseif (strlen($name) <= 1) {
                    $formerrors[] = "Full name must consist of at least two words";
                }

                if (empty($email)) {
                    $formerrors[] = "Email can not be empty";
                }

                foreach ($formerrors as $error) {
                    echo $error . '<br/>';
                }


            
            // Update the database with this info
            $stmt = $con->prepare("UPDATE users SET username=?, email=?, fullname=?, password=? WHERE userid=?");
            $stmt->execute([$user, $email, $name, $pass, $id]);
        
            // Echo success message
            echo $stmt->rowCount() . ' record updated';
        }
    } else {
        echo "You cannot browse this page directly.";
    }

    // Content of the control panel here
    include $tpl . "footer.php";
} else {
    echo "You are not authorized to view this page.";
    header("refresh:3;url=index.php"); // Redirect after 3 seconds
    exit();
}
?>
