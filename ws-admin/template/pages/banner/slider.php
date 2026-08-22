<?php $data = new Databases; ?>
<script src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>public/assets/ckeditor/ckeditor.js"></script>
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="mb-3">
<div class="mb-3">
<?php
if(!empty($bannerID)){
$BannerQ = "SELECT * FROM banner_slider WHERE bannerslider_id='$bannerID'";
$BannerQ_data = $data->con->query($BannerQ);
foreach($BannerQ_data as $bannRow){
?>
<div class="mb-3">
<input type="hidden" id="bannerid" value="<?php echo $bannRow['bannerslider_id']; ?>" />
<textarea name="bannerContent" class="snow-editor-height-200 form-control" id="bannerContent" rows="5" placeholder="Content Descriptions"><?php echo $bannRow['bannerslider_content']; ?></textarea>
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
CKEDITOR.replace('bannerContent',{
height:250,
filebrowserUploadMethod: 'form'
});
</script>
<?php } } else { ?>
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
<button type="button" class="btn btn-info btn-46" id="submit-dropzone">Upload Now</button>
</div>
</div>
<?php } ?>
<ul class="list-unstyled mb-0" id="dropzone-preview">
<?php
$BannerQ = "SELECT * FROM banner_slider";
$BannerQ_data = $data->con->query($BannerQ);
foreach($BannerQ_data as $bannRow)
{
?>
<li class="mt-2" >
<div class="border rounded">
<div class="d-flex p-2">
<div class="flex-shrink-0 me-3">
<div class="rounded-3 bg-light" style="width: 150px;">
<img data-dz-thumbnail class="img-fluid rounded d-block"  src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/banner/<?php echo $bannRow['bannerslider_image']; ?>" />
</div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<h5 class="fs-14 mb-1" data-dz-name></h5>
<p class="fs-13 text-muted mb-0" data-dz-size></p>
<p><?php echo $bannRow['bannerslider_content']; ?></p>
</div>
</div>
<div class="flex-shrink-0 ms-3">
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>theme/banner/slider/<?php echo $bannRow['bannerslider_id']; ?>"><button type="button" class="btn btn-sm btn-success">Content</button></a>
<button type="button" data-dz-remove id="<?php echo $bannRow['bannerslider_id']; ?>" class="btn btn-sm btn-danger ImageDel">Delete</button>
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
</div>
<script>
var urldelect = '/template/function/delete';
$('.ImageDel').click( function(){
var bannerdelID   = $(this).attr("id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{bannerdelID:bannerdelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#dropzone", {
url: "../../template/function/upload/banner.slider.php",
method: "POST",
paramName: "file",
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
