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
$productaboutQ = "SELECT * FROM productrange_about  ORDER BY product_range_id LIMIT 1";
$productaboutQ_data = $data->con->query($productaboutQ);
if ($productaboutQ_data->num_rows > 0) {
foreach($productaboutQ_data as $proabRow)
{
?>
<div class="mb-3">
<input type="hidden" id="proaboutID" value="<?php echo $proabRow['product_range_id']; ?>" />
</div>
<div class="mb-3">
<div id="proaboutContent"><?php echo $proabRow['product_range_content']; ?></div>
</div>
<?php } } else { header("location:pathUrl__DIR__ . /../products/range/about"); } ?>
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
var proaboutID      = $('#proaboutID').val();
var proaboutContent = CKEDITOR.instances['proaboutContent'].getData();
var require         = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{proaboutID:proaboutID,proaboutContent:proaboutContent},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#proaboutContent").css("border-color","#FF5733");
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
CKEDITOR.replace('proaboutContent',{
height:300
});
</script>

