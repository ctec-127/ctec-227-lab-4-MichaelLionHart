<?php
require_once 'inc/functions.inc.php';
$pageTitle = 'Login';
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
// start session
session_start();
// login.php

require_once 'inc/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $db->real_escape_string($_POST['username']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    //  echo $sql;
  	
    $result = $db->query($sql);
    if ($result->num_rows == 1) {

        $_SESSION['loggedin'] = 1;
        
        $row = $result->fetch_assoc();
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['username'] = $row['username'];

        header('location: image-gallery.php');
    } else {
        echo '<p>Please try again</p>';
    }
}

?>

<!-- example - if user logged in, show image upload form -->
<?php
    // if(isset($_SESSION['username'])) {
    //     include 'upload_form.php';
    // }
?>
<h1>Login</h1>
<form class="col-lg-3 mx-auto login" action="login.php" method="POST">
    <br>
    <label for="username">Username</label>
    <br>
    <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
    <br>
    <label for="password">Password&nbsp;&nbsp;</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <br>
    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
    <br>
    <input class="btn btn-primary" type="submit" value="Login">
</form>

<script src="js/script.js"></script>

<?php require 'inc/footer.inc.php'; ?>