<?php $data = new Databases; ?>
<script src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>"></script>
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<?php if(!empty($socialID)){
$socialQ = "SELECT * FROM  social_media WHERE social_media_id='$socialID'";
$socialQ_data = $data->con->query($socialQ);
foreach($socialQ_data as $socialRow)
{
?>
<div class="mb-3">
<input type="hidden" id="socialupID" value="<?php echo $socialRow['social_media_id']; ?>" />
<input type="text" id="socialName" value="<?php echo $socialRow['social_media_name']; ?>" class="required form-control" placeholder="Social Name" />
</div>
<div class="mb-3">
<input type="text" id="sociaIcon" value="<?php echo $socialRow['social_media_icon']; ?>"  class="required form-control" placeholder="Icon" />
</div>
<div class="mb-3">
<input type="url" id="socialUrl" value="<?php echo $socialRow['social_media_link']; ?>" class="required form-control" placeholder="Url Link" />
</div>
<div class="mb-3">
<select class="required form-control" id="socialStatus">
<option value="publish">Publish</option>
<option value="unpublish">Unpublish</option>
</select>
</div>
<?php } } else { ?>
<div class="mb-3">
<input type="text" id="socialName" class="required form-control" placeholder="Social Name" />
</div>
<div class="mb-3">
<input type="text" id="sociaIcon" class="required form-control" placeholder="Icon" />
</div>
<div class="mb-3">
<input type="url" id="socialUrl" class="required form-control" placeholder="Url Link" />
</div>
<div class="mb-3">
<select class="required form-control" id="socialStatus">
<option value="publish">Publish</option>
<option value="unpublish">Unpublish</option>
</select>
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
$socialQ = "SELECT * FROM  social_media";
$socialQ_data = $data->con->query($socialQ);
foreach($socialQ_data as $socialRow)
{
?>
<li class="mt-2" >
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="avatar-sm bg-light rounded">
<i class="icon-custome <?php echo $socialRow['social_media_icon']; ?>"></i>
</div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<h5 class="fs-14 mb-1" data-dz-name><?php echo $socialRow['social_media_name']; ?></h5>
<p class="fs-13 text-muted mb-0" data-dz-size><?php echo $socialRow['social_media_link']; ?></p>
<p><?php echo $socialRow['social_media_status']; ?></p>
</div>
</div>
<div class="flex-shrink-0 ms-3">
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>theme/social/pages/<?php echo $socialRow['social_media_id']; ?>"><button type="button" class="btn btn-sm btn-success">Content</button></a>
<button type="button" data-dz-remove id="<?php echo $socialRow['social_media_id']; ?>" class="btn btn-sm btn-danger ImageDel">Delete</button>
</div>
</div>
</div>
</li>
<?php } ?>
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
$('.submit').click( function() {
var socialupID   = $('#socialupID').val();
var socialName   = $('#socialName').val();
var sociaIcon    = $('#sociaIcon').val();
var socialUrl    = $('#socialUrl').val();
var socialStatus = $('#socialStatus').val();
var require      = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{socialupID:socialupID,socialName:socialName,sociaIcon:sociaIcon,socialUrl:socialUrl,socialStatus:socialStatus},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#socialName").css("border-color","#FF5733");
$("#socialUrl").css("border-color","#FF5733");
$("#sociaIcon").css("border-color","#FF5733");
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

