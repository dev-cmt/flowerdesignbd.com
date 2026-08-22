<?php
function pathUrl($dir = __DIR__){
$root = "";
$dir = str_replace('\\', '/', realpath($dir));
$root .= !empty($_SERVER['HTTPS']) ? 'https' : 'http';
$root .= '://' . $_SERVER['HTTP_HOST'];
if(!empty($_SERVER['CONTEXT_PREFIX'])) {
$root .= $_SERVER['CONTEXT_PREFIX'];
$root .= substr($dir, strlen($_SERVER[ 'CONTEXT_DOCUMENT_ROOT' ]));
} else {
$root .= substr($dir, strlen($_SERVER[ 'DOCUMENT_ROOT' ]));
}
$root .= '/';
return $root;
}
function base64_encode_image ($filename=string,$filetype=string) {
if ($filename) {
$imgbinary = fread(fopen($filename, "r"), filesize($filename));
return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
}
}
?>
