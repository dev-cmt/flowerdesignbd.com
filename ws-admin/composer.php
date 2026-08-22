<?php
$basedir = realpath( dirname($_SERVER['SCRIPT_FILENAME']) );
$file = realpath( $basedir . $_SERVER["REQUEST_URI"] );
if( !file_exists($file) && strpos($file, $basedir) === 0 ) {
header("HTTP/1.0 404 Not Found");
print "File does not exist.";
exit();
}
$components = split('\.', basename($file));
$extension = strtolower( array_pop($components) );
switch($extension)
{
case 'css':
$mime = "text/css";
break;
default:
$mime = "text/plain";
}
header("Content-Encoding: gzip");
header( "Content-Type: " . $mime );
readfile($file);
?>
