<?php session_start();
$_SESSION["loggedin"] or die("error: you aren't authorized!\n"); ?>
<!doctype html>
<title>upload</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="upload" value="Upload!">
</form>

<?php

print_r($_FILES);
print("<br>\n");

$temp = $_FILES["file"]["tmp_name"];
$name = $_FILES["file"]["name"];
move_uploaded_file($temp, $name) or print("move_uploaded_file() error<br>\n");
?>
<img src="<?= $name ?>">