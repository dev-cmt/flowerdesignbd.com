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
$orderprocQ = "SELECT * FROM order_proccess  ORDER BY orderproccess_id LIMIT 1";
$orderprocQ_data = $data->con->query($orderprocQ);
if ($orderprocQ_data->num_rows > 0) {
foreach($orderprocQ_data as $orderpRow)
{
?>
<div class="mb-3">
<input type="hidden" id="orderprocID" value="<?php echo $orderpRow['orderproccess_id']; ?>" />
</div>
<div class="mb-3">
<div id="orderprocContent"><?php echo $orderpRow['orderproccess_content']; ?></div>
</div>
<?php } } else { header("location:pathUrl__DIR__ . /../order/progress"); } ?>
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
var orderprocID      = $('#orderprocID').val();
var orderprocContent = CKEDITOR.instances['orderprocContent'].getData();
var require         = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{orderprocID:orderprocID,orderprocContent:orderprocContent},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#orderprocContent").css("border-color","#FF5733");
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
CKEDITOR.replace('orderprocContent',{
height:300
});
</script>
