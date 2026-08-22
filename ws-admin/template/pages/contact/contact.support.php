<?php $data = new Databases; ?>
<div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<?php
if(!empty($contactID)){
$contactQ = "SELECT * FROM contact_us  WHERE contactus_id='$contactID' ORDER BY contactus_id LIMIT 1";
$contactQ_data = $data->con->query($contactQ);
if ($contactQ_data->num_rows > 0) {
foreach($contactQ_data as $contactRow)
{
?>
<div class="mb-3">
<div class="table-responsive">
<table class="table table-condensed">
<tbody>
<tr>
<td><b>Contact ID</b></td>
<td><?php echo $contactRow['contact_replayid']; ?></td>
</tr>
<tr>
<td><b>Full Name</b></td>
<td><?php echo $contactRow['contactus_fullname']; ?></td>
</tr>
<tr>
<td><b>Email</b></td>
<td><?php echo $contactRow['contactus_email']; ?></td>
</tr>
<tr>
<td><b>Phone Number</b></td>
<td><?php echo $contactRow['contactus_phone']; ?></td>
</tr>
<tr>
<td><b>IP Address</b></td>
<td><?php echo $contactRow['contactus_ipaddress']; ?></td>
</tr>
<tr>
<td><b>Contact Date</b></td>
<td><?php echo $contactRow['contactus_date']; ?></td>
</tr>
</tbody>
</table>
<div class="mb-3">
<p><?php echo $contactRow['contactus_content']; ?></p>
</div>
</div>
</div>
<div class="mb-3">
<input type="hidden" id="contactrep_ID" value="<?php echo $contactRow['contactus_id']; ?>" />
</div>
<div class="mb-3">
<textarea id="contactrep_content" class="textarea-height form-control" rows="6" placeholder="Make replay comments"><?php echo $contactRow['contactus_replay']; ?></textarea>
</div>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 submit">Send Now</button>
</div>
</div>
<?php } } } ?>
<div class="border-bottom-dashed border-bottom margin-bottom-10">
<div class="row g-3">
<div class="col-xl-12">
<div class="search-box">
<input type="text" class="search form-control" placeholder="Search ...">
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
var urlupdate = '/template/function/update';
$('.submit').click( function() {
var contactrep_ID      = $('#contactrep_ID').val();
var contactrep_content = $('#contactrep_content').val();
var require            = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{contactrep_ID:contactrep_ID,contactrep_content:contactrep_content},
dataType:"text",
success:function(data){
var check = ['This value is required'];
if(check.includes(data)){
$("#contactrep_content").css("border-color","#FF5733");
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
<script>
$(document).ready(function(){
let loadUrl       = '/template/content/contact/contact.content';
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
$(document).on('click', '.page-link', function(){
$('.table').css('opacity','0.1');
var page = $(this).data('page_number');
load_data(page);
});
$('.search').keyup(function(){
$('.table').css('opacity','0.1');
var query = $('.search').val();
load_data(1, query);
});
}
});
</script>
