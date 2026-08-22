<?php $data = new Databases; ?>
<script src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>public/assets/ckeditor/ckeditor.js"></script>
<div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<?php
if(!empty($update)){
$eventid = $update;
}else{
$eventid = '';
}
if(!empty($update)){
$eventPakageQ = "SELECT * FROM event_pakage  WHERE event_pakage_id='$update' ORDER BY event_pakage_id LIMIT 1";
$eventPakageQ_data = $data->con->query($eventPakageQ);
if ($eventPakageQ_data->num_rows > 0) {
foreach($eventPakageQ_data as $eventRow)
{
?>
<form id="uploadForm" method="post" enctype="multipart/form-data">
<div class="mb-3">
<?php if(!empty($uploadID)){?>
<ul class="list-unstyled">
<li><i class="bi bi-check2"></i> Please select any one logo ignore other it</li>
<li><i class="bi bi-check2"></i> Please change the maximum image size 1500x1250 PX</li>
<li><i class="bi bi-check2"></i> If the file is not empty</li>
<li><i class="bi bi-check2"></i> If the file extension is jpg , jpeg is one of png</li>
<li><i class="bi bi-check2"></i> If the file size is less than 1MB</li>
<li><i class="bi bi-check2"></i> Please don't forget to follow the topics</li>
</ul>
<div class="mb-3">
<div id="dropzone" class="dropzone">
<div class="fallback"></div>
<div class="dz-message needsclick">
<div class="mb-3">
<i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
</div>
<p class="Dropfiles">Drop files here or click to upload.</p>
</div>
</div>
</div>
<div class="mb-3">
<div class="text-end">
<button type="button" class="btn btn-info btn-46" id="submit-dropzone">Album Upload</button>
</div>
</div>
<ul class="list-unstyled mb-0 row_positionalbum" id="dropzone-preview">
<?php
$albummageQ = "SELECT * FROM album_images  WHERE packages_category_id='$uploadID' ORDER BY album_images_possition ASC";
$albummageQ_data = $data->con->query($albummageQ);
foreach($albummageQ_data as $albumimgRow)
{
?>
<li class="mt-2" id="<?php echo $albumimgRow['album_images_id']; ?>">
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="avatar-sm bg-light rounded">
<img data-dz-thumbnail class="img-fluid rounded d-block" src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/album/<?php echo $albumimgRow['album_images_name']; ?>" />
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
<button type="button" data-dz-remove id="<?php echo $albumimgRow['album_images_id']; ?>" class="btn btn-sm btn-danger albumDelnow">Delete</button>
</div>
</div>
</div>
</li>
<?php  } ?>
</ul>
<script type="text/javascript">
var urlupdate = '/template/function/update';
$(".row_positionalbum").sortable({
delay: 150,
stop: function() {
var selectedDataalbum = new Array();
$('.row_positionalbum>li').each(function() {
selectedDataalbum.push($(this).attr("id"));
});
updateOrderalbum(selectedDataalbum);
}
});
function updateOrderalbum(data){
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
type:'post',
data:{positionalbum:data},
success:function(data){
toastr.success(data);
}
})
}
</script>
<script>
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#dropzone", {
url: "../../../template/function/upload/event.gallery.php?id=<?php echo $uploadID; ?>",
method: "POST",
paramName:["file"],
autoProcessQueue : false,
acceptedFiles: "image/*",
maxFiles: 5,
maxFilesize: 10, // MB
uploadMultiple: true,
parallelUploads: 100, // use it with uploadMultiple
createImageThumbnails: true,
thumbnailWidth: 120,
thumbnailHeight: 120,
addRemoveLinks: true,
timeout: 180000,
dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
// Language Strings
dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
dictInvalidFileType: "Invalid File Type",
dictCancelUpload: "Cancel",
dictRemoveFile: "Remove",
dictMaxFilesExceeded: "Only {{maxFiles}} files are allowed",
dictDefaultMessage: "Drop files here to upload",
});
myDropzone.on("addedfile", function(file) {
});
myDropzone.on("removedfile", function(file) {
});
myDropzone.on("sending", function(file, xhr, formData) {
formData.append("dropzone", "1"); // $_POST["dropzone"]
});
myDropzone.on("error", function(file, response) {
console.log(response);
});
myDropzone.on("successmultiple", function(file, response) {
console.log(response);
document.getElementById("dropzone-form").submit();
});
var images = []
for(let i = 0; i < images.length; i++) {
let img = images[i];
var mockFile = {name: img.name, size: img.size, url: img.url};
myDropzone.emit("addedfile", mockFile);
myDropzone.emit("thumbnail", mockFile, img.url);
myDropzone.emit("complete", mockFile);
var existingFileCount = 1; // The number of files already uploaded
myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
}
var submitDropzone = document.getElementById("submit-dropzone");
submitDropzone.addEventListener("click", function(e) {
e.preventDefault();
e.stopPropagation();
if (myDropzone.files != "") {
myDropzone.processQueue();
} else {
document.getElementById("dropzone").submit();
}
});
</script>
<?php }else { ?>
<ul class="list-unstyled">
<li><i class="bi bi-check2"></i> Please select any one logo ignore other it</li>
<li><i class="bi bi-check2"></i> Please change the maximum image size 1500x1250 PX</li>
<li><i class="bi bi-check2"></i> If the file is not empty</li>
<li><i class="bi bi-check2"></i> If the file extension is jpg , jpeg is one of png</li>
<li><i class="bi bi-check2"></i> If the file size is less than 1MB</li>
<li><i class="bi bi-check2"></i> Please don't forget to follow the topics</li>
</ul>
<div class="mb-3">
<div id="dropzone" class="dropzone">
<div class="fallback"></div>
<div class="dz-message needsclick">
<div class="mb-3">
<i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
</div>
<p class="Dropfiles">Drop files here or click to upload.</p>
</div>
</div>
<input type="hidden" id="eventimgID" name="eventimgID" value="<?php echo $eventRow['event_pakage_id']; ?>" />
</div>
<div class="mb-3">
<div class="text-end">
<button type="button" class="btn btn-info btn-46" id="submit-dropzone">Upload Now</button>
</div>
</div>
<!--- process -->
<ul class="list-unstyled mb-0" id="dropzone-preview">
<?php
$blogImageQ = "SELECT * FROM eventpakage_images  WHERE event_pakage_id='".$eventRow['event_pakage_id']."'";
$blogImageQ_data = $data->con->query($blogImageQ);
foreach($blogImageQ_data as $blogimgRow)
{
?>
<li class="mt-2">
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="avatar-sm bg-light rounded">
<img data-dz-thumbnail class="img-fluid rounded d-block" src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/event/<?php echo $blogimgRow['eventpakage_images_name']; ?>" />
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
<button type="button" data-dz-remove id="<?php echo $blogimgRow['eventpakage_images_id']; ?>" class="btn btn-sm btn-danger ImageDel">Delete</button>
</div>
</div>
</div>
</li>
<?php  } ?>
</ul>
<?php } ?>
</div>
</form>
<?php if(!empty($editid)){
$albumupQ = "SELECT * FROM packages_category  WHERE packages_category_id='$editid'";
$albumupQ_data = $data->con->query($albumupQ);
foreach($albumupQ_data as $upRow)
{
?>
<div class="mb-3">
<input type="hidden" id="eventalbumID" value="<?php echo $upRow['packages_category_id']; ?>" />
<input type="hidden" id="albumeventID" value="<?php echo $upRow['event_pakage_id']; ?>" />
<input type="text"   id="eventalbumName" value="<?php echo $upRow['packages_album_name']; ?>" class="required form-control" placeholder="Album Name" />
</div>
<?php } } else { ?>
<div class="mb-3">
<input type="hidden" id="albumeventID" value="<?php echo $eventRow['event_pakage_id']; ?>" />
<input type="text" id="eventalbumName" class="required form-control" placeholder="Album Name" />
</div>
<?php } ?>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-success btn-46 albumsubmit">Album Now</button>
</div>
</div>
<ul class="list-unstyled mb-0 row_positionpak" id="dropzone-preview">
<?php
$albumQ = "SELECT * FROM packages_category  WHERE event_pakage_id='".$eventRow['event_pakage_id']."' ORDER BY packages_category_possition ASC";
$albumQ_data = $data->con->query($albumQ);
foreach($albumQ_data as $albumRow)
{
?>
<li class="mt-2" id="<?php echo $albumRow['packages_category_id']; ?>">
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="avatar-sm bg-light rounded">
<img data-dz-thumbnail class="img-fluid img-thumbnail rounded d-block" src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/imagegallery.png" />
</div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<strong class=""><?php echo $albumRow['packages_album_name']; ?></strong>
</div>
</div>
<div class="flex-shrink-0 ms-3">
<button type="button"  data-id="<?php echo $albumRow['packages_category_id']; ?>" class="btn btn-sm btn-danger albumdel">Delete</button>
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>create/pakages/<?php echo $eventRow['event_pakage_id']; ?>/<?php echo $albumRow['packages_category_id']; ?>"><button type="button"  class="btn btn-sm btn-primary">Edit</button></a>
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>create/album/<?php echo $eventRow['event_pakage_id']; ?>/<?php echo $albumRow['packages_category_id']; ?>"><button type="button"  class="btn btn-sm btn-success">Upload</button></a>
</div>
</div>
</div>
</li>
<?php } ?>
</ul>
<script type="text/javascript">
var urlupdate = '/template/function/update';
$(".row_positionpak").sortable({
delay: 150,
stop: function() {
var selectedData = new Array();
$('.row_positionpak>li').each(function() {
selectedData.push($(this).attr("id"));
});
updateOrder(selectedData);
}
});
function updateOrder(data){
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
type:'post',
data:{positionc:data},
success:function(data){
toastr.success(data);
}
})
}
</script>
<hr>
<div class="mb-3">
<input type="hidden" id="eventpakID" value="<?php echo $eventRow['event_pakage_id']; ?>" />
<input type="text" id="eventpakageName" value="<?php echo $eventRow['event_pakage_name']; ?>" class="required form-control" placeholder="Event Pakage Name" />
</div>
<div class="mb-3">
<div id="eventpakageNameContent"><?php echo $eventRow['event_pakage_content']; ?></div>
</div>
<div class="mb-3">
<select class="required form-control" id="eventpakageNameStatus">
<option value="publish">Publish</option>
<option value="unpublish">Unpublish</option>
</select>
</div>
<script>
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#dropzone", {
url: "../../template/function/upload/pakage.gallery.php?id=<?php echo $eventid; ?>",
method: "POST",
paramName:["file"],
autoProcessQueue : false,
acceptedFiles: "image/*",
maxFiles: 5,
maxFilesize: 10, // MB
uploadMultiple: true,
parallelUploads: 100, // use it with uploadMultiple
createImageThumbnails: true,
thumbnailWidth: 120,
thumbnailHeight: 120,
addRemoveLinks: true,
timeout: 180000,
dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
// Language Strings
dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
dictInvalidFileType: "Invalid File Type",
dictCancelUpload: "Cancel",
dictRemoveFile: "Remove",
dictMaxFilesExceeded: "Only {{maxFiles}} files are allowed",
dictDefaultMessage: "Drop files here to upload",
});
myDropzone.on("addedfile", function(file) {
});
myDropzone.on("removedfile", function(file) {
});
myDropzone.on("sending", function(file, xhr, formData) {
formData.append("dropzone", "1"); // $_POST["dropzone"]
});
myDropzone.on("error", function(file, response) {
console.log(response);
});
myDropzone.on("successmultiple", function(file, response) {
console.log(response);
document.getElementById("dropzone-form").submit();
});
var images = []
for(let i = 0; i < images.length; i++) {
let img = images[i];
var mockFile = {name: img.name, size: img.size, url: img.url};
myDropzone.emit("addedfile", mockFile);
myDropzone.emit("thumbnail", mockFile, img.url);
myDropzone.emit("complete", mockFile);
var existingFileCount = 1; // The number of files already uploaded
myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
}
var submitDropzone = document.getElementById("submit-dropzone");
submitDropzone.addEventListener("click", function(e) {
e.preventDefault();
e.stopPropagation();
if (myDropzone.files != "") {
myDropzone.processQueue();
} else {
document.getElementById("dropzone").submit();
}
});
</script>
<?php } } else {
header("location:pathUrl__DIR__ . /../create/pakages");
} } else { ?>
<div class="mb-3">
<input type="text" id="eventpakageName" class="required form-control" placeholder="Event Pakage Name" />
</div>
<div class="mb-3">
<div id="eventpakageNameContent"></div>
</div>
<div class="mb-3">
<select class="required form-control" id="eventpakageNameStatus">
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
var eventpakID              = $('#eventpakID').val();
var eventpakageName         = $('#eventpakageName').val();
var eventpakageNameContent  = CKEDITOR.instances['eventpakageNameContent'].getData();
var eventpakageNameStatus   = $('#eventpakageNameStatus').val();
var require      = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{eventpakID:eventpakID,eventpakageName:eventpakageName,eventpakageNameContent:eventpakageNameContent,eventpakageNameStatus:eventpakageNameStatus},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#eventpakageName").css("border-color","#FF5733");
$("#eventpakageNameContent").css("border-color","#FF5733");
$("#eventpakageNameStatus").css("border-color","#FF5733");
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
$('.albumsubmit').click( function(){
var eventalbumID       = $('#eventalbumID').val();
var albumeventID       = $('#albumeventID').val();
var eventalbumName     = $('#eventalbumName').val();
var require            = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{eventalbumID:eventalbumID,albumeventID:albumeventID,eventalbumName:eventalbumName},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#eventalbumName").css("border-color","#FF5733");
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
// Album Select Now
$('.albumdel').click( function(){
var albumdelID   = $(this).attr("data-id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{albumdelID:albumdelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
// project images
$('.ImageDel').click( function(){
var eventimagedelID   = $(this).attr("id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{eventimagedelID:eventimagedelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
$('.albumDelnow').click( function(){
var albumimgdelID   = $(this).attr("id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{albumimgdelID:albumimgdelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});

});
CKEDITOR.replace('eventpakageNameContent',{
height:300,
});
</script>
<script>
$(document).ready(function(){
let loadUrl = '/template/content/pakages/create.pakage';
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
