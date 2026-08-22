<?php
if(!empty($_GET['lock'])){
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
$Logs = "SELECT * FROM admin_login_support  where admin_log_id='".$_GET['lock']."' and admin_log_session='off' ORDER BY admin_log_id LIMIT 1";
$Logs_data = $data->con->query($Logs);
if ($Logs_data->num_rows > 0) {
foreach($Logs_data as $logsRow)
{
?>
<div class="auth-page-wrapper pt-5">
<div class="auth-one-bg-position auth-one-bg" id="auth-particles">
<div class="bg-overlay"></div>
<div class="shape">
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
<path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
</svg>
</div>
</div>
<div class="auth-page-content">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="text-center mt-sm-5 mb-4 text-white-50">
<div>
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>" class="d-inline-block auth-logo"></a>
</div>
<p class="mt-3 fs-15 fw-medium"></p>
</div>
</div>
</div>
<!-- end row -->
<div class="row justify-content-center">
<div class="col-md-8 col-lg-6 col-xl-5">
<div class="card mt-4">
<div class="card-body p-4">
<div class="text-center mt-2">
<h6 class="text-primary">Lock Screen</h6>
</div>
<div class="user-thumb text-center">
<h5 class="font-size-15 mt-3"><?php echo $logsRow['admin_log_name']; ?></h5>
</div>
<div class="p-2 mt-4">
<div  class="mb-3 preload"></div>
<div class="mb-3">
<input type="hidden" name="nameLogs" value="lockscreen" id="nameLogs">
<input type="hidden" name="emailLogs" value="<?php echo $logsRow['admin_log_email']; ?>" id="emailLogs">
<label class="form-label" for="userpassword">Password</label>
<input type="password" name="passwordLogs"  class="form-control" id="passwordLogs" placeholder="Enter password" required>
</div>
<div class="mb-2 mt-4">
<button class="btn btn-success w-100 authbutton submit" type="submit">Unlock</button>
</div>
</div>
</div>
</div>
<div class="mt-4 text-center">
<p class="mb-0">Not you ? return <a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } } } else {
header("location:pathUrl__DIR__ . /../../");
} ?>
