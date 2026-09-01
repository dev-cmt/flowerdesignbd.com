<?php $data = new Databases; ?>
<script src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>"></script>
<div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<?php
if(!empty($companyID)){
$companyQ = "SELECT * FROM  company_profile  WHERE company_profile_id='$companyID' ORDER BY company_profile_id LIMIT 1";
$companyQ_data = $data->con->query($companyQ);
if ($companyQ_data->num_rows > 0) {
foreach($companyQ_data as $companyRow)
{
?>
<div class="mb-3">
<input type="hidden" id="companypro_id" value="<?php echo $companyRow['company_profile_id']; ?>" />
<select class="required form-control" name="companyproTag" id="companyproTag">
<option value="<?php echo $companyRow['company_profile_tag']; ?>"><?php echo $companyRow['company_profile_tag']; ?></option>
<option value="Mission">Mission</option>
<option value="Vission">Vission</option>
<option value="Our Goal">Our Goal</option>
</select>
</div>
<div class="mb-3">
<textarea name="companyproContent" class="snow-editor-height-200 form-control" id="companyproContent" rows="5" placeholder="Content Descriptions"><?php echo $companyRow['company_profile_content']; ?></textarea>
</div>
<?php } } } else { ?>
<div class="mb-3">
<select class="required form-control" name="companyproTag" id="companyproTag">
<option value="Mission">Mission</option>
<option value="Vission">Vission</option>
<option value="Our Goal">Our Goal</option>
</select>
</div>
<div class="mb-3">
<textarea name="companyproContent" class="snow-editor-height-200 form-control" id="companyproContent" rows="5" placeholder="Content Descriptions"></textarea>
</div>
<?php } ?>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 submit">Save Now</button>
</div>
</div>
<div class="table-responsive">
<ul class="list-unstyled mb-0" id="dropzone-preview">
<?php
$companyQ = "SELECT * FROM company_profile ORDER BY company_profile_id DESC";
$companyQ_data = $data->con->query($companyQ);
foreach($companyQ_data as $companyRow)
{
?>
<li class="mt-2" >
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="avatar-sm bg-light rounded">
<img class="lazy img-fluid auto_size" width="50" data-srcset="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/about/<?php echo $companyRow['company_profile_image']; ?>" />
</div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<h5 class="fs-14 mb-1"><strong><?php echo $companyRow['company_profile_tag']; ?></strong></h5>
<p class="fs-13 text-muted mb-0" data-dz-size><?php echo $companyRow['company_profile_content']; ?></p>
</div>
</div>
<div class="flex-shrink-0 ms-3">
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>company/profile/<?php echo $companyRow['company_profile_id']; ?>"><button type="button" class="btn btn-sm btn-success">Content</button></a>
<button type="button" data-dz-remove id="<?php echo $companyRow['company_profile_id']; ?>" class="btn btn-sm btn-danger ImageDel">Delete</button>
</div>
</div>
</div>
</li>
<?php  } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
var urlinsert = '/template/function/insert';
var urlupdate = '/template/function/update';
$('.submit').click( function() {
var companypro_id      = $('#companypro_id').val();
var companyproTag      = $('#companyproTag').val();
var companyproContent  = CKEDITOR.instances['companyproContent'].getData();
var require            = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{companypro_id:companypro_id,companyproTag:companyproTag,companyproContent:companyproContent},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#companyproContent").css("border-color","#FF5733");
toastr.error(data);
}else if(data == 'Update'){
toastr.info(data);
setTimeout(function(){ location.reload(); }, 3000);
}else {
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
}
});
});
});
</script>
<script>
var urlupload = "/template/function/upload/content.gallery";
CKEDITOR.replace('companyproContent',{
height:300,
filebrowserUploadMethod: 'form',
filebrowserUploadUrl: baseUrl + urlupload + baseUrlformat
});
</script>

