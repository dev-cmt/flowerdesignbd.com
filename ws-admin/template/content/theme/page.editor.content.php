<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
if(!empty($_POST['update'])){
$themenuQ = "SELECT * FROM  theme_main_menu WHERE thememenu_id='".$_POST['update']."'";
$themenuQ_data = $data->con->query($themenuQ);
if ($themenuQ_data->num_rows > 0) {
foreach($themenuQ_data as $menuRow)
{
?>
<script src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>public/assets/ckeditor/ckeditor.js"></script>
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<p><i class="bi bi-chevron-right"></i> <?php echo $menuRow['thememenu_name']; ?></p>
<?php
$contentQ = "SELECT * FROM  theme_main_menu INNER JOIN  page_content ON theme_main_menu.thememenu_id=page_content.thememenu_id  WHERE page_content.thememenu_id='".$_POST['update']."'";
$contentQ_data = $data->con->query($contentQ);
if ($contentQ_data->num_rows > 0) {
foreach($contentQ_data as $contentRow)
{
?>
<div class="mb-3">
<input type="hidden" name="pageContentUP" id="pageContentUP" value="<?php echo $contentRow['page_content_id']; ?>" />
<input type="hidden" name="pageContentID" id="pageContentID" value="<?php echo $_POST['update']; ?>" />
<input type="text" name="pagecontentTitle" class="form-control" id="pagecontentTitle" value="<?php echo $contentRow['page_content_title']; ?>" placeholder="The page Title" required>
</div>
<div class="mb-3">
<textarea name="pageContent" class="snow-editor-height-200 form-control" id="pageContent" rows="5" placeholder="Content Descriptions"><?php echo $contentRow['page_content_description']; ?></textarea>
</div>
<?php } } else { ?>
<div class="mb-3">
<input type="hidden" name="pageContentID" id="pageContentID" value="<?php echo $_POST['update']; ?>" />
<input type="text" name="pagecontentTitle" class="form-control" id="pagecontentTitle" placeholder="The page Title" required>
</div>
<div class="mb-3">
<textarea name="pageContent" class="snow-editor-height-200 form-control" id="pageContent" rows="5" placeholder="Content Descriptions"><?php echo $menuRow['thememenu_content']; ?></textarea>
</div>
<?php } ?>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 submit">Save Now</button>
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
$('.submit').click( function() {
var pageContentUP     = $('#pageContentUP').val();
var pageContentID     = $('#pageContentID').val();
var pagecontentTitle  = $('#pagecontentTitle').val();
var pageContent       = CKEDITOR.instances['pageContent'].getData();
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{pageContentUP:pageContentUP,pageContentID:pageContentID,pagecontentTitle:pagecontentTitle,pageContent:pageContent},
dataType:"text",
success:function(data){
var check = ['This value is required'];
if(check.includes(data)){
$("#pagecontentTitle").css("border-color","#FF5733");
$("#pageContent").css("border-color","#FF5733");
toastr.error(data);
}else if(data == 'Success'){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}else {
toastr.info(data);
setTimeout(function(){ location.reload(); }, 3000);
}
}
});
});
});
</script>
<script>
var urlupload = "/template/function/upload/content.gallery";
CKEDITOR.replace('pageContent',{
height:300,
filebrowserUploadMethod: 'form',
filebrowserUploadUrl: baseUrl + urlupload + baseUrlformat
});
</script>
<?php } } } ?>
