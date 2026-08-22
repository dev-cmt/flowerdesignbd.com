<?php
session_start();
$data = new Databases;
if($_COOKIE["PHPSESSID"] !== '0'){
if(isset($_SERVER['HTTP_COOKIE'])){
$update = array(
'admin_log_session'   => mysqli_real_escape_string($data->con, 'off')
);
$whereAdmin = array(
'sha1(admin_log_email)' => mysqli_real_escape_string($data->con, $_COOKIE["PHPSESSID"])
);
if($data->update('admin_login_support', $update , $whereAdmin))
{
$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
foreach($cookies as $cookie) {
$parts = explode('=', $cookie);
$name = trim($parts[0]);
setcookie($name, '', time()-1000);
setcookie($name, '', time()-1000, '/');
header("location:pathUrl__DIR__ . /../");
session_destroy();   
session_unset();
}
}
$data->con->close();
exit();
}
}else {
$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
foreach($cookies as $cookie) {
$parts = explode('=', $cookie);
$name = trim($parts[0]);
setcookie($name, '', time()-1000);
setcookie($name, '', time()-1000, '/');
header("location:pathUrl__DIR__ . /../");
session_destroy();   
session_unset();
}
}
?>
