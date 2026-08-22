<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
?>
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="mb-3">
<div class="mb-3">
<?php
if(!empty($_POST['update'])){
$BannerQ = "SELECT * FROM theme_default_gallery WHERE theme_defgallery_id='".$_POST['update']."'";
$BannerQ_data = $data->con->query($BannerQ);
foreach($BannerQ_data as $bannRow){
?>
<div class="mb-3">
<input type="hidden" id="bannerid" value="<?php echo $bannRow['theme_defgallery_id']; ?>" />
<select class="menusearch form-control" name="themepositionType" id="themepositionType">
<?php
if(!empty($_POST['query'])){
$menuQ = "SELECT * FROM  theme_main_menu  WHERE thememenu_status='active' and thememenu_id='".$_POST['query']."'";
}else{
$menuQ = "SELECT * FROM  theme_main_menu  WHERE thememenu_status='active'";
}
$menuQ_data = $data->con->query($menuQ);
if ($menuQ_data->num_rows > 0) {
foreach($menuQ_data as $upRow)
{
?>
<option value="<?php echo $upRow['thememenu_id']; ?>"><?php echo $upRow['thememenu_name']; ?></option>
<?php } } ?>
<option value="">None</option>
</select>
</div>
<div class="mb-3 submenu">
<select class="form-control" name="themepositionType" id="themepositionType">
<?php
if(!empty($_POST['query'])){
$menuQ = "SELECT * FROM  theme_sub_menu  WHERE themesub_status='active' and thememenu_id='".$_POST['query']."'";
$menuQ_data = $data->con->query($menuQ);
if ($menuQ_data->num_rows > 0) {
foreach($menuQ_data as $upRow)
{
?>
<option value="<?php echo $upRow['themesub_id']; ?>"><?php echo $upRow['themesub_name']; ?></option>
<?php } } else { ?>
<option value="">None</option>
<?php } } else{ ?>
<option value="">None</option>
<?php } ?>
</select>
</div>
<div class="mb-3">
<ul class="list-unstyled mb-0" id="dropzone-preview">
<?php
$BannerQ = "SELECT * FROM  theme_default_gallery";
$BannerQ_data = $data->con->query($BannerQ);
foreach($BannerQ_data as $bannRow)
{
?>
<li class="mt-2" >
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="rounded-3 bg-light" style="width:150px;">
<img data-dz-thumbnail class="lazy img-fluid rounded d-block"  src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/content/<?php echo $bannRow['theme_defgallery_image']; ?>" />
</div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<h5 class="fs-14 mb-1" data-dz-name></h5>
<p class="fs-13 text-muted mb-0" data-dz-size></p>
<div>
<div class="form-check form-radio-warning mb-3">
<input class="form-check-input" type="radio" name="formradiocolor<?php echo $bannRow['theme_defgallery_id']; ?>" value="Left" id="Left<?php echo $bannRow['theme_defgallery_id']; ?>">
<label class="form-check-label" for="Left<?php echo $bannRow['theme_defgallery_id']; ?>">
Left
</label>
</div>
<div class="form-check form-radio-danger mb-3">
<input class="form-check-input" type="radio" name="formradiocolor<?php echo $bannRow['theme_defgallery_id']; ?>" value="Right" id="Right<?php echo $bannRow['theme_defgallery_id']; ?>">
<label class="form-check-label" for="Right<?php echo $bannRow['theme_defgallery_id']; ?>">
Right
</label>
</div>
<div class="form-check form-radio-info mb-3">
<input class="form-check-input" type="radio" name="formradiocolor<?php echo $bannRow['theme_defgallery_id']; ?>" value="Center" id="Center<?php echo $bannRow['theme_defgallery_id']; ?>">
<label class="form-check-label" for="Center<?php echo $bannRow['theme_defgallery_id']; ?>">
Center
</label>
</div>
<div class="form-check form-radio-dark mb-3">
<input class="form-check-input" type="radio" name="formradiocolor<?php echo $bannRow['theme_defgallery_id']; ?>" value="Bottom" id="Bottom<?php echo $bannRow['theme_defgallery_id']; ?>">
<label class="form-check-label" for="Bottom<?php echo $bannRow['theme_defgallery_id']; ?>">
Bottom
</label>
</div>
<div class="form-check form-radio-danger mb-3">
<input class="form-check-input" type="radio" name="formradiocolor<?php echo $bannRow['theme_defgallery_id']; ?>" value="" id="None<?php echo $bannRow['theme_defgallery_id']; ?>">
<label class="form-check-label" for="None<?php echo $bannRow['theme_defgallery_id']; ?>">
None
</label>
</div>
</div>
</div>
</div>
<div class="flex-grow-1">
<input type="text" name="thememenuIcon" class="form-control" id="thememenuIcon" placeholder="Heading Content" required>
<label class="form-check-label" for="customSwitchsizesm"></label>
<textarea class="form-control textarea" id="VertimeassageInput" rows="3" placeholder="Content Description"></textarea>
</div>
<div class="flex-shrink-0 ms-3">
<div class="form-check form-switch form-switch-lg" dir="ltr">
<input type="checkbox" class="form-check-input" id="customSwitchsizelg">
</div>
</div>
</div>
</div>
</li>
<?php  } ?>
</ul>
</div>
<div class="mb-3">
<div class="text-end">
<button type="button" class="btn btn-info btn-46 submit">Save Now</button>
</div>
</div>
<script>
var urlupdate = '/template/function/update';
$('.submit').click( function() {
var bannerid       = $('#bannerid').val();
var bannerContent  = CKEDITOR.instances['bannerContent'].getData();
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{bannerid:bannerid,bannerContent:bannerContent},
dataType:"text",
success:function(data){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
</script>
<?php } } else { ?>
<ul class="list-unstyled">
<li><i class="bi bi-check2"></i> Please select any one logo ignore other it</li>
<li><i class="bi bi-check2"></i> Please change the maximum image size 1200x848 PX</li>
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
<button type="button" class="btn btn-info btn-46" id="submit-dropzone">Upload Now</button>
</div>
</div>
<ul class="list-unstyled mb-0" id="dropzone-preview">
<?php
$BannerQ = "SELECT * FROM  theme_default_gallery";
$BannerQ_data = $data->con->query($BannerQ);
foreach($BannerQ_data as $bannRow)
{
?>
<li class="mt-2" >
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="rounded-3 bg-light" style="width: 150px;">
<img data-dz-thumbnail class="img-fluid rounded d-block"  src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/content/<?php echo $bannRow['theme_defgallery_image']; ?>" />
</div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<h5 class="fs-14 mb-1" data-dz-name></h5>
<p class="fs-13 text-muted mb-0" data-dz-size></p>
<p></p>
</div>
</div>
<div class="flex-shrink-0 ms-3">
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>theme/default/gallery/<?php echo $bannRow['theme_defgallery_id']; ?>"><button type="button" class="btn btn-sm btn-success">Content</button></a>
<button type="button" data-dz-remove id="<?php echo $bannRow['theme_defgallery_id']; ?>" class="btn btn-sm btn-danger ImageDel">Delete</button>
</div>
</div>
</div>
</li>
<?php  } ?>
</ul>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
var urldelect = '/template/function/delete';
$('.ImageDel').click( function(){
var defaultbannerdelID  = $(this).attr("id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{defaultbannerdelID:defaultbannerdelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#dropzone", {
url: "../../template/function/upload/default.gallery.php",
method: "POST",
paramName: "file",
autoProcessQueue : false,
acceptedFiles: "image/*",
maxFiles: 5,
maxFilesize: 0.5, // MB
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
