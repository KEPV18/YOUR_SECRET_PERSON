<?php
include "init.php";
include $lang . "en.php";
include $tpl . "header.php";

// Check if user is coming from HTTP POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["pass"];
    $hashedpass = sha1($password);

    // Check if the user exists in the database
    $stmt = $con->prepare("SELECT username, password FROM users WHERE username = ? AND password = ? AND Groupid = 1");
    $stmt->execute([$username, $hashedpass]);

    // Fetch the result
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    // If count > 0, this means the database contains a record about this username
    if ($count > 0) {
        echo "Welcome " . $username;
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
include $tpl . "footer.php";
?>
