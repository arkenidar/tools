
<title>directory contents listing</title>
<meta name="viewport" content="width=device-width">

<?php

foreach ( scandir('.') as $entry ){
    if($entry[0]==".") continue;
    print("<a href='$entry'>$entry</a><br>");
}