<?php

// file for passwords
include "/var/www/secrets/secrets--tools-app.php";
if (!isset($secret_password)) die("error: missing a secrets.php file!");

// session variable for login/logout from login/logout form
session_start();
if ($_REQUEST["submit"] == "login" && $_REQUEST["passwd"] == $secret_password) {
    $_SESSION["loggedin"] = true;
}
if ($_REQUEST["submit"] == "logout") {
    $_SESSION["loggedin"] = false;
}

?>
<!doctype html>
<title>login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<!-- login/logout form -->
Status: <?= $_SESSION["loggedin"] ? "logged in" : "logged out" ?>
<form action="" method="post">
    <input type="text" name="tools_app_user_name">
    <input type="password" name="passwd" size="7"> <br>
    <input type="submit" value="login" name="submit">
    <input type="submit" value="logout" name="submit">
</form>