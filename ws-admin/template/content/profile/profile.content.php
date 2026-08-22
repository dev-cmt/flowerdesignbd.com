<?php
if(isset($_COOKIE["PHPSESSID"]) !== '0'){
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
$Logs = "SELECT * FROM admin_login_support  where sha1(admin_log_email)='".$_COOKIE["PHPSESSID"]."' and admin_log_session='on' ORDER BY admin_log_id LIMIT 1";
$Logs_data = $data->con->query($Logs);
if ($Logs_data->num_rows > 0) {
foreach($Logs_data as $logsRow)
{
?>
<div class="page-content">
<div class="container-fluid">
<div class="profile-foreground position-relative mx-n4 mt-n4">
<div class="profile-wid-bg">
<img src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>public/assets/images/profile-bg.jpg" alt="" class="lazy profile-wid-img" />
</div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
<div class="row g-4">
<div class="col-auto">
<div class="avatar-lg">
<img src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/user/219983.png" alt="user-img" class="lazy img-thumbnail rounded-circle" />
</div>
</div>
<!--end col-->
<div class="col">
<div class="p-2">
<h3 class="text-white mb-1"><?php echo $logsRow['admin_log_name']; ?></h3>
<p class="text-white-75">
<?php
if($logsRow['admin_log_category'] == 'admin_power'){
echo 'Admin supper';
}else {
echo 'Admin user';
}
?>
</p>
<div class="hstack text-white-50 gap-1">
<div class="me-2"></div>
<div></div>
</div>
</div>
</div>
<!--end col-->
<div class="col-12 col-lg-auto order-last order-lg-0">
<div class="row text text-white-50 text-center">
<div class="col-lg-6 col-4">
<div class="p-2">
<h4 class="text-white mb-1">0.00K</h4>
<p class="fs-14 mb-0">Followers</p>
</div>
</div>
<div class="col-lg-6 col-4">
<div class="p-2">
<h4 class="text-white mb-1">0.00K</h4>
<p class="fs-14 mb-0">Following</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div>
<div class="tab-content pt-4 text-muted">
<div class="tab-pane active" id="overview-tab" role="tabpanel">
<div class="row">
<!--end col-->
<div class="col-xxl-12">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header align-items-center d-flex">
<h6 class=" mb-0  me-2">Profile</h6>
<div class="flex-shrink-0 ms-auto">
<ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-bs-toggle="tab" href="#Profile" role="tab">
Profile
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="tab" href="#Update" role="tab">
Update
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="tab" href="#PasswordChange" role="tab">
Password update
</a>
</li>
</ul>
</div>
</div>
<div class="card-body">
<div class="tab-content text-muted">
<div class="tab-pane active" id="Profile" role="tabpanel">
<div class="profile-timeline">
<div class="accordion accordion-flush" id="todayExample">
<div class="table-responsive">
<table class="table table-condensed">
<tbody>
<tr>
<td><b>Admin ID</b></td>
<td><?php echo $logsRow['admin_userlog_id']; ?></td>
</tr>
<tr>
<td><b>Name</b></td>
<td><?php echo $logsRow['admin_log_name']; ?></td>
</tr>
<tr>
<td><b>Phone</b></td>
<td><?php echo $logsRow['admin_log_phone']; ?></td>
</tr>
<tr>
<td><b>Email</b></td>
<td><?php echo $logsRow['admin_log_email']; ?></td>
</tr>
<tr>
<td><b>Recovery Email</b></td>
<td><?php echo $logsRow['admin_recoery_email']; ?></td>
</tr>
<tr>
<td><b>PIN</b></td>
<td>12******</td>
</tr>
<tr>
<td><b>Ssession</b></td>
<td><password><?php echo $logsRow['admin_log_session']; ?></password></td>
</tr>
<tr>
<td><b>Date</b></td>
<td><?php echo $logsRow['admin_login_date']; ?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="Update" role="tabpanel">
<div class="profile-timeline">
<div class="accordion accordion-flush" id="weeklyExample">
<div class="mb-3">
<input type="hidden" id="adminup_ID" placeholder="Admin ID" value="<?php echo $logsRow['admin_log_id']; ?>"/>
<input type="text" value="<?php echo $logsRow['admin_userlog_id']; ?>" class="required form-control" id="adminID" placeholder="Admin ID" />
</div>
<div class="mb-3">
<input type="text" value="<?php echo $logsRow['admin_log_name']; ?>" class="required form-control" id="adminFullName" placeholder="Full Name" />
</div>
<div class="mb-3">
<input type="text" value="<?php echo $logsRow['admin_log_phone']; ?>" class="required form-control" id="adminPhoneNumber" placeholder="Phone Number" />
</div>
<div class="mb-3">
<input type="email" value="<?php echo $logsRow['admin_log_email']; ?>" class="required form-control" id="adminEmail" placeholder="Email" />
</div>
<div class="mb-3">
<input type="email" value="<?php echo $logsRow['admin_recoery_email']; ?>" class="required form-control" id="adminreEmail" placeholder="Recovery Email" />
</div>
<div class="mb-3">
<input type="password" value="<?php echo $logsRow['admin_log_pin']; ?>" class="required form-control" id="adminPin" placeholder="PIN Number" />
</div>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 update">Save Now</button>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="PasswordChange" role="tabpanel">
<div class="profile-timeline">
<div class="accordion accordion-flush" id="monthlyExample">
<div class="mb-3">
<input type="hidden" id="adminpass_ID" placeholder="Admin ID" value="<?php echo $logsRow['admin_log_id']; ?>"/>
<input type="password" class="required form-control" id="adminOldpassword" placeholder="Old password" />
</div>
<div class="mb-3">
<input type="password" class="required form-control" id="adminNewpassword" placeholder="New password" />
</div>
<div class="mb-3">
<input type="password" class="required form-control" id="adminConfipassword" placeholder="Confirm password" />
</div>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 password">Save Now</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
var urlupdate = '/template/function/update';
$('.update').click( function() {
var adminup_ID       = $('#adminup_ID').val();
var adminID          = $('#adminID').val();
var adminFullName    = $('#adminFullName').val();
var adminPhoneNumber = $('#adminPhoneNumber').val();
var adminEmail       = $('#adminEmail').val();
var adminreEmail     = $('#adminreEmail').val();
var adminPin         = $('#adminPin').val();
var require          = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{adminup_ID:adminup_ID,adminID:adminID,adminFullName:adminFullName,adminPhoneNumber:adminPhoneNumber,adminEmail:adminEmail,adminreEmail:adminreEmail,adminPin:adminPin},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#adminID").css("border-color","#FF5733");
$("#adminFullName").css("border-color","#FF5733");
$("#adminPhoneNumber").css("border-color","#FF5733");
$("#adminEmail").css("border-color","#FF5733");
$("#adminreEmail").css("border-color","#FF5733");
$("#adminPin").css("border-color","#FF5733");
toastr.error(data);
}else{
toastr.info(data);
setTimeout(function(){ location.reload(); }, 3000);
}
}
});
});
$('.password').click( function() {
var adminpass_ID       = $('#adminpass_ID').val();
var adminOldpassword   = $('#adminOldpassword').val();
var adminNewpassword   = $('#adminNewpassword').val();
var adminConfipassword = $('#adminConfipassword').val();
var require            = ['Value is required', 'Minlength 6', 'Password not confirm', 'Old password not match'];
if(adminNewpassword == adminConfipassword){
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{adminpass_ID:adminpass_ID,adminOldpassword:adminOldpassword,adminNewpassword:adminNewpassword,adminConfipassword:adminConfipassword},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#adminOldpassword").css("border-color","#FF5733");
$("#adminNewpassword").css("border-color","#FF5733");
$("#adminConfipassword").css("border-color","#FF5733");
toastr.error(data);
}else{
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
}
});
}else {
toastr.error('Confirm password not Match');
};
});
});
</script>
<?php } } } ?>
