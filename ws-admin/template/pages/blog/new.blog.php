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
if(!empty($blogID)){
$blogQ = "SELECT * FROM blog_post  WHERE blogpost_id='$blogID' ORDER BY blogpost_id LIMIT 1";
$blogQ_data = $data->con->query($blogQ);
if ($blogQ_data->num_rows > 0) {
foreach($blogQ_data as $blogRow)
{
?>
<form id="uploadForm" method="post" enctype="multipart/form-data">
<div class="mb-3">
<div class="mb-3">
<ul class="list-unstyled">
<li><i class="bi bi-check2"></i> Please select any one logo ignore other it</li>
<li><i class="bi bi-check2"></i> Please change the maximum image size 1500x1250 PX</li>
<li><i class="bi bi-check2"></i> If the file is not empty</li>
<li><i class="bi bi-check2"></i> If the file extension is jpg , jpeg is one of png</li>
<li><i class="bi bi-check2"></i> If the file size is less than 1MB</li>
<li><i class="bi bi-check2"></i> Please don't forget to follow the topics</li>
</ul>
<output id="Filelist"></output>
<div id="uploadStatus"></div>
<div class="fileinput-button">
<div class="form-group">
<div class="file-drop-area" id="file-drop-area">
<span class="file-msg"><center><img src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/10000000019.png" class="img-responsive"/></center></span>
<input type="file" name="file[]" id="files" multiple accept="image/jpeg, image/png, image/gif,">
</div>
</div>
</div>
<input type="hidden" id="blogimgID" name="blogimgID" value="<?php echo $blogRow['blogpost_id']; ?>" />
<!--- process -->
<ul class="list-unstyled mb-0" id="dropzone-preview">
<?php
$blogImageQ = "SELECT * FROM blog_images WHERE blogpost_id='".$blogRow['blogpost_id']."'";
$blogImageQ_data = $data->con->query($blogImageQ);
foreach($blogImageQ_data as $blogimgRow)
{
?>
<li class="mt-2" >
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="avatar-sm bg-light rounded">
<img data-dz-thumbnail class="img-fluid rounded d-block" src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/blog/<?php echo $blogimgRow['blogimages_name']; ?>" />
</div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
<p class="fs-13 text-muted mb-0" data-dz-size></p>
<strong class="error text-danger" data-dz-errormessage></strong>
</div>
</div>
<div class="flex-shrink-0 ms-3">
<button type="button" data-dz-remove id="<?php echo $blogimgRow['blogimages_id']; ?>" class="btn btn-sm btn-danger ImageDel">Delete</button>
</div>
</div>
</div>
</li>
<?php  } ?>
</ul>
<!--- process -->
</div>
</div>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-info btn-46">Save Now</button>
</div>
</div>
</form>
<div class="mb-3">
<input type="hidden" id="blogID" value="<?php echo $blogRow['blogpost_id']; ?>" />
<input type="text" id="blogName" value="<?php echo $blogRow['blogpost_name']; ?>" class="required form-control" placeholder="Blog Name" />
</div>
<div class="mb-3">
<div id="blogContent"><?php echo $blogRow['blogpost_content']; ?></div>
</div>
<div class="mb-3">
<select class="required form-control" id="blogStatus">
<option value="publish">Publish</option>
<option value="unpublish">Unpublish</option>
</select>
</div>
<?php } } else {
header("location:pathUrl__DIR__ . /../blog/new");
} } else { ?>
<div class="mb-3">
<input type="text" id="blogName" class="required form-control" placeholder="Blog name" />
</div>
<div class="mb-3">
<div id="blogContent"></div>
</div>
<div class="mb-3">
<select class="required form-control" id="blogStatus">
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
<div class="border-bottom-dashed border-bottom margin-bottom-10">
<div class="row g-3">
<div class="col-xl-12">
<div class="search-box">
<input type="text" class="form-control search" placeholder="Search ...">
<i class="ri-search-line search-icon"></i>
</div>
</div>
</div>
</div>
<div class="table-responsive">
<div id="root"></div>
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
var urldelect = '/template/function/delete';
$('.submit').click( function() {
var blogID       = $('#blogID').val();
var blogName     = $('#blogName').val();
var blogContent  = CKEDITOR.instances['blogContent'].getData();
var blogStatus   = $('#blogStatus').val();
var require      = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{blogID:blogID,blogName:blogName,blogCategory:blogCategory,blogContent:blogContent,blogStatus:blogStatus},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#blogName").css("border-color","#FF5733");
$("#blogContent").css("border-color","#FF5733");
$("#blogStatus").css("border-color","#FF5733");
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
// project images
$('.ImageDel').click( function(){
var blogimagedelID   = $(this).attr("id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{blogimagedelID:blogimagedelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
});
urlupload = "/template/function/upload/blog.gallery";
CKEDITOR.replace('blogContent',{
height:300,
filebrowserUploadUrl: baseUrl + urlupload + baseUrlformat
});
</script>
<script>
$(document).ready(function(){
let loadUrl = '/template/content/blog/blog.content';
$('#root').html(make_skeleton());
setTimeout(function(){
load_content(1);
},1000);
function make_skeleton()
{
var output = '';
for(var count = 0; count < 1; count++)
{
output += '<div class="card-body d-flex-padding">';
output += '<div class="d-flex align-items-center">';
output += '<strong>Loading...</strong>';
output += '<div class="spinner-border spinner-border-sm ms-auto" role="status" aria-hidden="true">';
output += '</div>';
output += '</div>';
output += '</div>';
}
return output;
}
function load_content(limit)
{
load_data(1);
function load_data(page, query = '')
{
$.ajax({
url: baseUrl + loadUrl + baseUrlformat,
method:"POST",
data:{page:page, query:query},
success:function(data)
{
setTimeout(function(){
$('.table').css('opacity','10');
$('#root').html(data);
}, 1000);
}
});
}
$('.search').keyup(function(){
$('.table').css('opacity','0.1');
var query = $('.search').val();
load_data(1, query);
});
$(document).on('click', '.page-link', function(){
$('.table').css('opacity','0.1');
var page = $(this).data('page_number');
load_data(page);
});
}
});
</script>
<script>
$(".progress").hide();
$('#files').change(function(){
if($('#files').val()==''){
$('.submit').attr('disabled',true)
}
else{
$('.submit').attr('disabled',false);
}
})
$(document).ready(function(){
var uploadUrl     = '/template/function/upload/blog.image';
$("#uploadForm").on('submit', function(e){
e.preventDefault();
$.ajax({
xhr: function() {
var xhr = new window.XMLHttpRequest();
xhr.upload.addEventListener("progress", function(evt) {
if (evt.lengthComputable) {
var percentComplete = ((evt.loaded / evt.total) * 100);
$(".progress-bar").width(percentComplete + '%');
$(".progress-bar").html(percentComplete+'%');
}
}, false);
return xhr;
},
type: 'POST',
url: baseUrl + uploadUrl + baseUrlformat,
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend: function(){
$(".progress").show();
$(".progress-bar").width('0%');
$('#uploadStatus').html('
<div class="card-body d-flex-padding">
<div class="d-flex align-items-center">
<strong>Loading...</strong>
<div class="spinner-border spinner-border-sm ms-auto" role="status" aria-hidden="true">
</div>
</div>
</div>
');
},
error:function(){
$('#uploadStatus').html('<p style="color:#EA4335;">File upload failed</p>');
},
success: function(resp){
if(resp == 'ok'){
$('#uploadForm')[0].reset();
$('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully</p>');
window.location.reload();
}else if(resp == 'err'){
$('#uploadStatus').html('<p style="color:#EA4335;">Please select a valid file</p>');
}
}
});
});
// File type validation
$("#files").change(function(){
var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
var file = this.files[0];
var fileType = file.type;
if(!allowedTypes.includes(fileType)){
alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
$("#files").val('');
return false;
}
});
});
</script>

