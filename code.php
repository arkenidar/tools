<?php

// validity for safety (well chosen)
$valid_filenames = ["login.php", "protected.php", "shell.php",
    "upload.php", "text-edit.php", "code.php"];

$filename = $_REQUEST["filename"]; // from expose() <a> link tag
if( in_array($filename, $valid_filenames) ) {

    // $filename is code-injection safe (being in validity array)

    // as plain text
    header("Content-Type: text/plain");
    echo file_get_contents( $filename );

}else{

    // as HTML text
    function expose($filename){ // $filename is code-injection safe (being used only from safe foreach)
        echo "// <a href='?filename=$filename' >$filename</a>\n";
        echo htmlspecialchars( file_get_contents( $filename ) );
        echo "// end of : $filename\n\n\n";
    }

    echo "<pre>";
    foreach($valid_filenames as $filename){
        // $filename is code-injection safe (being taken from $valid_filenames)
        expose($filename);
    }
    echo "</pre>";
}
