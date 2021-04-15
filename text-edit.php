<?php session_start(); $_SESSION["loggedin"] or die("error: you aren't authorized!\n"); ?>
<!doctype html>
<title>editor</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<?php
$filename=$_REQUEST['filename'];
if(isset($_REQUEST['file_content']))
file_put_contents($filename,$_REQUEST['file_content']);
?>

<form method="post" onsubmit="sync_to_send()">
<input type="submit" value="save"> <input value="<?=htmlentities($filename)?>" id="filename">
<button onclick="setTimeout(()=>location='?filename='+filename.value)">open</button> <br>

<div contenteditable id="file_content" style="white-space: pre; overflow: scroll; border: 1px solid black; min-height: 100px;"><?=htmlentities(file_get_contents($filename))?></div>
<textarea hidden name="file_content" id="textarea_to_send"></textarea>
<script>function sync_to_send(){
textarea_to_send.innerText=file_content.innerText
}</script>

</form>
