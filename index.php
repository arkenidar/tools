<?php
$dir = explode('?', $_SERVER['REQUEST_URI'])[0];
?><title><?= $dir ?> directory contents listing</title>
<meta name="viewport" content="width=device-width">

<?php

print("<ul>\n");
foreach ( scandir('.') as $entry ){
    if($entry[0]==".") continue;
    if($entry=="index.php") continue;

    print("<li><a href='$entry' target='_blank' >$entry</a></li>\n");
}
print("</ul>\n");
