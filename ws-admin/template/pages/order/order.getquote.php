<?php $data = new Databases; ?>
<div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<?php
if(!empty($getquoteID)){
$getquoteQ = "SELECT * FROM  customer_quote  WHERE cust_quote_id='$getquoteID' ORDER BY cust_quote_id LIMIT 1";
$getquoteQ_data = $data->con->query($getquoteQ);
if ($getquoteQ_data->num_rows > 0) {
foreach($getquoteQ_data as $getqtRow)
{
?>
<div class="mb-3">
<div class="table-responsive">
<table class="table table-condensed">
<tbody>
<tr>
<td><b>Get quote ID</b></td>
<td><?php echo $getqtRow['cust_quote_number']; ?></td>
</tr>
<tr>
<td><b>Full Name</b></td>
<td><?php echo $getqtRow['cust_quote_fname']; ?></td>
</tr>
<tr>
<td><b>Email</b></td>
<td><?php echo $getqtRow['cust_quote_email']; ?></td>
</tr>
<tr>
<td><b>Phone Number</b></td>
<td><?php echo $getqtRow['cust_quote_phone']; ?></td>
</tr>
<tr>
<td><b>Shipping Destination</b></td>
<td><?php echo $getqtRow['cust_quote_shippingdetination']; ?></td>
</tr>
<tr>
<td><b>Are you selling this product already ?</b></td>
<td><?php echo $getqtRow['cust_quote_selling']; ?></td>
</tr>
<tr>
<td><b>Type or product</b></td>
<td><?php echo $getqtRow['cust_quote_prpoxy']; ?></td>
</tr>
<tr>
<td><b>Approx product qty</b></td>
<td><?php echo $getqtRow['cust_quote_proqty']; ?></td>
</tr>
<tr>
<td><b>Image of product</b></td>
<td><?php echo $getqtRow['cust_quote_image']; ?></td>
</tr>
<tr>
<td><b>Other Notes</b></td>
<td><?php echo $getqtRow['cust_quote_othernote']; ?></td>
</tr>
<tr>
<td><b>How did you hear about us ?</b></td>
<td><?php echo $getqtRow['cust_quote_abouthare']; ?></td>
</tr>
<tr>
<td><b>Get quote Date</b></td>
<td><?php echo $getqtRow['cust_quote_date']; ?></td>
</tr>
</tbody>
</table>
</div>
</div>
<?php } } else { header("location:pathUrl__DIR__ . /../order/getquote"); } } else { ?>
<div class="mb-3">
<center><img class="img-responsive img-not-found" src="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>uploads/10000000014.png" /></center>
</div>
<?php } ?>
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
<script>
$(document).ready(function(){
let loadUrl       = '/template/content/order/order.getquote';
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
