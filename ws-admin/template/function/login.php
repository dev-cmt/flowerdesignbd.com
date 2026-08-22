<?php
require_once __DIR__ . '/../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../config/db.config.php';
$data = new Databases;
$loadHe  = '';
if(isset($_POST['emailLogs'])){
if(!empty($_POST['passwordLogs'])){
$logsQ = "SELECT * FROM  admin_login_support  WHERE admin_log_email='".$_POST['emailLogs']."' or admin_userlog_id='".$_POST['emailLogs']."'";
$logsRes = $data->con->query($logsQ);
if($logsRes->num_rows > 0){
$_SESSION['emailLogs']=$_POST['emailLogs'];
if(($_SESSION['emailLogs']=$_POST['emailLogs'])){
$userCheck = "SELECT * FROM admin_login_support where admin_log_email='".$_SESSION['emailLogs']."' or admin_userlog_id='".$_SESSION['emailLogs']."'";
$resultCheck = $data->con->query($userCheck);
if ($resultCheck->num_rows > 0) {
while($rowLogs = $resultCheck->fetch_assoc()){
if (password_verify($_POST['passwordLogs'], $rowLogs['admin_log_password'])){
if($rowLogs['admin_log_active'] == 'active'){
$sqlUpdate = "UPDATE admin_login_support SET admin_log_session='on',admin_login_date='".date('Y/m/d h:i:sa')."' WHERE admin_log_id='".$rowLogs['admin_log_id']."'";
if ($data->con->query($sqlUpdate) === TRUE) {
$secureLogs = sha1($_SESSION['emailLogs']);
if(!empty($_POST['nameLogs'])){
$loadHe   = "<script>window.open('pathUrl__DIR__ . /../../../?admin-secure=$secureLogs','_self')</script>";
}else{
$loadHe   = "<script>window.open('pathUrl__DIR__ . /../?admin-secure=$secureLogs','_self')</script>";
}
$message  = 'Login success';
}else{
$message = 'Your account is closed';
}
}else{
$message = 'Your account is closed';
}
}else{
$message = 'Sorry is not valid password';
}
}
}
}
}else{
$message = 'Sorry not valid account';
}
}else{
$message = 'Value is required';
}
echo $message;
echo $loadHe;
$data->con->close();
exit();
}
?>
