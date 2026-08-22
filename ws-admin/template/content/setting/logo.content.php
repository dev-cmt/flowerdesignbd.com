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
<div class="row">
<div class="col-lg-12">
<div class="mb-3">
<ul class="list-unstyled">
<li><i class="bi bi-check2"></i> Please select any one logo ignore other it</li>
<li><i class="bi bi-check2"></i> Please change the maximum image size 425x210 PX</li>
<li><i class="bi bi-check2"></i> If the file is not empty</li>
<li><i class="bi bi-check2"></i> If the file extension is jpg , jpeg is one of png</li>
<li><i class="bi bi-check2"></i> If the file size is less than 1MB</li>
<li><i class="bi bi-check2"></i> Please don't forget to follow the topics</li>
</ul>
</div>
<div class="mb-3">
<select class="form-control" name="logoPosition" id="logoPosition">
<option value="Header">Header</option>
<option value="Footer">Footer</option>
</select>
</div>
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
<button type="submit" class="btn btn-primary btn-46" id="submit-dropzone">Upload Now</button>
</div>
</div>
<div class="mb-3">
<ul class="list-unstyled mb-0" id="dropzone-preview">
<?php
$clientQ = "SELECT * FROM  logo_upload";
$clientQ_data = $data->con->query($clientQ);
foreach($clientQ_data as $clientRow)
{
if($clientRow['logo_status'] == 'active'){
$statusSwitch = 'checked';
$dissabled    = 'disabled';
}else{
$statusSwitch = '';
$dissabled    = 'none';
}
?>
<li class="mt-2" >
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="rounded-3 bg-black" style="width:300px;">
<img data-dz-thumbnail class="img-fluid rounded d-block"  src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/logo/<?php echo $clientRow['logo_image']; ?>" />
</div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<h5 class="fs-14 mb-1" data-dz-name><input type="hidden" id="logoPositionName" value="<?php echo $clientRow['logo_position']; ?>" /></h5>
<p><strong><?php echo $clientRow['logo_position']; ?></strong></p>
<p class="fs-13 text-muted mb-0" data-dz-size>
<div class="form-check form-switch form-switch-sm" dir="ltr">
<input type="checkbox" class="form-check-input mychoice" id="<?php echo $clientRow['logo_id']; ?>" value="<?php echo $clientRow['logo_id']; ?>" <?php echo $statusSwitch; ?>>
</div>
</p>
</div>
</div>
<div class="flex-shrink-0 ms-3">
<button type="button" data-dz-remove id="<?php echo $clientRow['logo_id']; ?>" class="btn btn-sm btn-danger mychoiceDel id120" <?php echo $dissabled; ?>>Delete</button>
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
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
var urlupdate = '/template/function/update';
var urldelect = '/template/function/delete';
// status update
$('.mychoice').click( function() {
var logostatusID     = $(this).attr("id");
var logoPositionName = $('#logoPositionName').val();
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{logostatusID:logostatusID,logoPositionName:logoPositionName},
dataType:"text",
success:function(data){
if(data !== 'active'){
toastr.error(data);
}else{
toastr.success(data);
}
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
// content delect
$('.mychoiceDel').click( function(){
var logodelID   = $(this).attr("data-id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{logodelID:logodelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
Dropzone.autoDiscover = false;
var logoPosition = $('#logoPosition').val();
var myDropzone = new Dropzone("#dropzone", {
url: "../../template/function/upload/logo.upload.php?name="+logoPosition,
method: "POST",
paramName: "file",
autoProcessQueue : false,
acceptedFiles: "image/*",
maxFiles: 1,
maxFilesize: 0.2, // MB
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
});
</script>
