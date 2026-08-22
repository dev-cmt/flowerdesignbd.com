<?php
function print_gzipped_page() {
global $HTTP_ACCEPT_ENCODING;
if( headers_sent() ){
$encoding = false;
}elseif( strpos($HTTP_ACCEPT_ENCODING, 'x-gzip') !== false ){
$encoding = 'x-gzip';
}elseif( strpos($HTTP_ACCEPT_ENCODING,'gzip') !== false ){
$encoding = 'gzip';
}else{
$encoding = false;
}
if( $encoding ){
$contents = ob_get_contents();
ob_end_clean();
header('Content-Encoding: '.$encoding);
print("\x1f\x8b\x08\x00\x00\x00\x00\x00");
$size = strlen($contents);
$contents = gzcompress($contents, 9);
$contents = substr($contents, 0, $size);
print($contents);
exit();
}else{
ob_end_flush();
exit();
}
}
// At the beginning of each page call these two functions
ob_start();
ob_implicit_flush(0);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
function cors() {
if (isset($_SERVER['HTTP_ORIGIN'])) {
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}
}
if (array_search(__FILE__, get_included_files()) === 0) {
function sendResponse(){
if(ob_get_contents()){
ob_end_clean();
if(ob_get_contents()){
ob_clean();
}
}
if (ob_get_contents()){
ob_end_flush(); // Flush the outer ob_start()
if(ob_get_contents()){
ob_flush();
}
flush();
}
if (session_id()) session_write_close();
}
if(!empty($_GET['admin-secure'])){
header("location:pathUrl__DIR__ . /../dashboard");
}
include_once dirname(__FILE__) . '/server.php';
}else{
header("location:pathUrl__DIR__ . /../");
}
die();
exit(0);
$data->con->close();
print_gzipped_page();
?>
