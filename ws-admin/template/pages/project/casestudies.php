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
$casestudiesQ = "SELECT * FROM  projects_casestudies ORDER BY projcasestudies_id LIMIT 1";
$casestudiesQ_data = $data->con->query($casestudiesQ);
if ($casestudiesQ_data->num_rows > 0) {
foreach($casestudiesQ_data as $casepRow)
{
?>
<div class="mb-3">
<input type="hidden" id="projectcaseID" value="<?php echo $casepRow['projcasestudies_id']; ?>" />
</div>
<div class="mb-3">
<div id="projectcaseContent"><?php echo $casepRow['projcasestudies_content']; ?></div>
</div>
<?php } } ?>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 submit">Save Now</button>
</div>
</div>
<?php
if(!empty($casestudiesID)){
$caseblogQ = "SELECT * FROM  casestudies_blog  WHERE casestu_blog_id='$casestudiesID' ORDER BY casestu_blog_id LIMIT 1";
$caseblogQ_data = $data->con->query($caseblogQ);
if ($caseblogQ_data->num_rows > 0) {
foreach($caseblogQ_data as $caseblogpRow)
{
?>
<div class="mb-3">
<input type="hidden" id="procaseup_id" value="<?php echo $caseblogpRow['casestu_blog_id']; ?>" />
<input type="text" id="procaseName" value="<?php echo $caseblogpRow['casestu_blog_name']; ?>" class="required form-control" placeholder="Case studies Name" />
</div>
<div class="mb-3">
<div id="procaseContent"><?php echo $caseblogpRow['casestu_blog_content']; ?></div>
</div>
<div class="mb-3">
<select class="required form-control" id="procaseStatus">
<option value="publish">Publish</option>
<option value="unpublish">Unpublish</option>
</select>
</div>
<?php } } } else { ?>
<div class="mb-3">
<input type="text" id="procaseName" class="required form-control" placeholder="Case studies Name" />
</div>
<div class="mb-3">
<div id="procaseContent"></div>
</div>
<div class="mb-3">
<select class="required form-control" id="procaseStatus">
<option value="publish">Publish</option>
<option value="unpublish">Unpublish</option>
</select>
</div>
<?php } ?>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 casestudies">Save Now</button>
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
var urlinsert = '/template/function/insert';
var urlupdate = '/template/function/update';
$('.submit').click( function() {
var projectcaseID      = $('#projectcaseID').val();
var projectcaseContent = CKEDITOR.instances['projectcaseContent'].getData();
var require            = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{projectcaseID:projectcaseID,projectcaseContent:projectcaseContent},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#projectcaseContent").css("border-color","#FF5733");
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
$('.casestudies').click( function() {
var procaseup_id       = $('#procaseup_id').val();
var procaseName        = $('#procaseName').val();
var procaseContent     = CKEDITOR.instances['procaseContent'].getData();
var procaseStatus      = $('#procaseStatus').val();
var require            = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{procaseup_id:procaseup_id,procaseName:procaseName,procaseContent:procaseContent,procaseStatus:procaseStatus},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#procaseName").css("border-color","#FF5733");
$("#procaseContent").css("border-color","#FF5733");
$("#procaseStatus").css("border-color","#FF5733");
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
CKEDITOR.replace('procaseContent',{
height:300
});
CKEDITOR.replace('projectcaseContent',{
height:300
});
</script>
<script>
$(document).ready(function(){
let loadUrl       = '/template/content/project/casestudies.content';
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
}
});
</script>
