<?php
function expose($filename){
echo "// <a href=\"?filename=$filename\">$filename</a>\n";
echo htmlspecialchars(file_get_contents($filename));
echo "// end of : $filename\n\n\n";
}

$valid_filenames=["login.php","protected.php","shell.php","upload.php","text-edit.php","code.php"];

if(in_array($_REQUEST["filename"],$valid_filenames)){
header("Content-Type: text/plain");
die(file_get_contents($_REQUEST["filename"]));}
echo "<pre>";
foreach($valid_filenames as $filename)
expose($filename);
echo "</pre>";
