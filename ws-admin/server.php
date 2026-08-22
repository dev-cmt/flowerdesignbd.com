<?php
include_once dirname(__FILE__) . '/../config/url/pathUrl.url.php';
include_once dirname(__FILE__) . '/../config/db.config.php';
$data = new Databases;
ob_start();
/**
* @package        Responsive
* @author         support@gmail.com
* @copyright      2020 - 2021 The waresun Limited
* @license        license.txt
* @version        Release: 1.0
* @filesource     waresun-content/themes/responsive/index.php
* @link           https://waresun.com/
* @since          available since Release 1.0
*/
function ob_end_clean_all() {
$handlers = ob_list_handlers();
while (count($handlers) > 0 && $handlers[count($handlers) - 1] != 'ob_gzhandler' && $handlers[count($handlers) - 1] != 'zlib output compression') {
ob_end_clean();
$handlers = ob_list_handlers();
}
}
if(!isset($_GET['admin-secure'])){
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
}else{
$id = $_GET['admin-secure'];
basename($_SERVER['PHP_SELF']) == basename(__FILE__) && (!ob_get_contents() || ob_clean()) && header("location:pathUrl__DIR__ . /../dashboard") && die;
$a_admin = session_id($id);
if(empty($a_admin)) session_start();
}
if (!isset($_COOKIE["PHPSESSID"])){
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_COOKIE["PHPSESSID"] = '0';
include_once dirname(__FILE__) . '/template/secure/configure.php';
}else{
$adminLogs = "SELECT * FROM admin_login_support  where sha1(admin_log_email)='".$_COOKIE["PHPSESSID"]."' and admin_log_session='on'";
$adminLogs_data = $data->con->query($adminLogs);
if ($adminLogs_data->num_rows > 0) {
foreach($adminLogs_data as $adminRow)
{
include_once dirname(__FILE__) . '/template/template.php';
}
}else{
if(isset($_SERVER['HTTP_COOKIE'])){
$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
foreach($cookies as $cookie) {
$parts = explode('=', $cookie);
$name = trim($parts[0]);
setcookie($name, '', time()-1000);
setcookie($name, '', time()-1000, '/');
header("location:pathUrl__DIR__ . /../");
session_destroy();
}
}
}
}
flush();
session_write_close();
$data->con->close();
?>
