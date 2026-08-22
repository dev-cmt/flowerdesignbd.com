<?php $data = new Databases; ?>
<script src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>public/assets/ckeditor/ckeditor.js"></script>
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<?php if(!empty($videoID)){
$videoQ = "SELECT * FROM  video_content WHERE video_content_id='$videoID'";
$videoQ_data = $data->con->query($videoQ);
foreach($videoQ_data as $videoRow)
{
?>
<div class="mb-3">
<input type="hidden" id="videfbupdateID" value="<?php echo $videoRow['video_content_id']; ?>" />
<input type="text" id="titlevideoName" value="<?php echo $videoRow['video_content_title']; ?>" class="required form-control" placeholder="Title Name" />
</div>
<div class="mb-3">
<textarea id="contentvideoDescription" class="form-control" rows="5" placeholder="Description"><?php echo $videoRow['video_content_content']; ?></textarea>
</div>
<div class="mb-3">
<input type="url" id="fbyoutubeUrl" value="<?php echo $videoRow['video_content_url']; ?>" class="required form-control" placeholder="Url Link" />
</div>
<div class="mb-3">
<select class="required form-control" id="videoStatustype">
<option value="<?php echo $videoRow['video_content_type']; ?>"><?php echo $videoRow['video_content_type']; ?></option>
<option value="Facebook">Facebook</option>
<option value="YouTube">YouTube</option>
</select>
</div>
<div class="mb-3">
<select class="required form-control" id="videoStatus">
<option value="publish">Publish</option>
<option value="unpublish">Unpublish</option>
</select>
</div>
<?php } } else { ?>
<div class="mb-3">
<input type="text" id="titlevideoName" class="required form-control" placeholder="Title Name" />
</div>
<div class="mb-3">
<textarea id="contentvideoDescription" class="form-control" rows="5" placeholder="Description">Description</textarea>
</div>
<div class="mb-3">
<input type="url" id="fbyoutubeUrl" class="required form-control" placeholder="Url Link" />
</div>
<div class="mb-3">
<select class="required form-control" id="videoStatustype">
<option value="Facebook">Facebook</option>
<option value="YouTube">YouTube</option>
</select>
</div>
<div class="mb-3">
<select class="required form-control" id="videoStatus">
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
$videodQ = "SELECT * FROM  video_content";
$videodQ_data = $data->con->query($videodQ);
foreach($videodQ_data as $viRow)
{
?>
<li class="mt-2" >
<div class="border rounded">
<div class="d-flex p-6">
<div class="flex-shrink-0 me-6 padding-10-10">
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.11';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-video" data-href="<?php echo $viRow['video_content_url']; ?>" width="250" height="150"  data-show-text="false"></div>
</div>
<div class="flex-grow-1">
<div class="pt-1">
<h5 class="fs-14 mb-1" data-dz-name></h5>
<p class="fs-13 text-muted mb-0" data-dz-size></p>
<p></p>
</div>
</div>
<div class="flex-shrink-0 ms-3 padding-10-10">
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>theme/facebookYouTube/<?php echo $viRow['video_content_id']; ?>"><button type="button" class="btn btn-sm btn-success">Update</button></a>
<button type="button" data-dz-remove id="<?php echo $viRow['video_content_id']; ?>" class="btn btn-sm btn-danger ImageDel">Delete</button>
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
var videfbupdateID          = $('#videfbupdateID').val();
var titlevideoName          = $('#titlevideoName').val();
var contentvideoDescription = $('#contentvideoDescription').val();
var fbyoutubeUrl            = $('#fbyoutubeUrl').val();
var videoStatustype         = $('#videoStatustype').val();
var videoStatus             = $('#videoStatus').val();
var require                 = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{videfbupdateID:videfbupdateID,titlevideoName:titlevideoName,contentvideoDescription:contentvideoDescription,fbyoutubeUrl:fbyoutubeUrl,videoStatustype:videoStatustype,videoStatus:videoStatus},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#titlevideoName").css("border-color","#FF5733");
$("#titlevideoName").css("border-color","#FF5733");
$("#fbyoutubeUrl").css("border-color","#FF5733");
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
