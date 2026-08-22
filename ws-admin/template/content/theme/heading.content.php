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
<?php
$headingQ = "SELECT * FROM  theme_heading ORDER BY theme_heading_id LIMIT 1";
$headingQ_data = $data->con->query($headingQ);
if($headingQ_data->num_rows > 0) {
foreach($headingQ_data as $heRow)
{
?>
<div class="mb-3">
<input type="hidden" name="headingID" id="headingID" value="<?php echo $heRow['theme_heading_id']; ?>" />
<textarea name="headingContent" class="snow-editor-height-500 form-control" id="headingContent" rows="8" placeholder="Menu Content"><?php echo $heRow['theme_heading_content']; ?></textarea>
</div>
<?php } } ?>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 submit">Save Now</button>
</div>
</div>
<?php
$footerQ = "SELECT * FROM   theme_footer ORDER BY theme_footer_id LIMIT 1";
$footerQ_data = $data->con->query($footerQ);
if($footerQ_data->num_rows > 0) {
foreach($footerQ_data as $fetRow)
{
?>
<div class="mb-3">
<input type="hidden" name="footerID" id="footerID" value="<?php echo $fetRow['theme_footer_id']; ?>" />
<textarea name="footerContent" class="snow-editor-height-500 form-control" id="footerContent" rows="8" placeholder="Heading Content"><?php echo $fetRow['theme_footer_content']; ?></textarea>
</div>
<?php } } ?>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-success btn-46 submitfooter">Save Now</button>
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
var headingID       = $('#headingID').val();
var headingContent  = $('#headingContent').val();
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{headingID:headingID,headingContent:headingContent},
dataType:"text",
success:function(data){
if(data !== 'Update'){
$("#headingContent").css("border-color","#FF5733");
toastr.error(data);
}else{
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
}
});
});
$('.submitfooter').click( function() {
var footerID       = $('#footerID').val();
var footerContent  = $('#footerContent').val();
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{footerID:footerID,footerContent:footerContent},
dataType:"text",
success:function(data){
if(data !== 'Update'){
$("#footerContent").css("border-color","#FF5733");
toastr.error(data);
}else{
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
}
});
});
});
</script>
