<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
?>
<script src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>"></script>
<div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<!-- start page title -->
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<?php if(!empty($_POST['update'])){
$menuQ = "SELECT * FROM  theme_main_menu  WHERE thememenu_id='".$_POST['update']."'";
$menuQ_data = $data->con->query($menuQ);
if ($menuQ_data->num_rows > 0) {
foreach($menuQ_data as $upRow)
{
?>
<div class="mb-3">
<input type="hidden" name="thememenu_idUP" id="thememenu_idUP" value="<?php echo $upRow['thememenu_id']; ?>" />
<input type="text" name="thememenuName" value="<?php echo $upRow['thememenu_name']; ?>" class="form-control" id="thememenuName" placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text" name="thememenuIcon" value="<?php echo $upRow['thememenu_icon']; ?>" class="form-control" id="thememenuIcon" placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" name="thememenuPermalink" value="<?php echo $upRow['thememenu_parmalink']; ?>" class="form-control" id="thememenuPermalink" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea name="thememenuContent" class="snow-editor-height-200 form-control" id="thememenuContent" rows="5" placeholder="Menu Content" required><?php echo $upRow['thememenu_content']; ?></textarea>
</div>
<div class="mb-3">
<select class="form-control" name="themepositionType" id="themepositionType">
<option value="<?php echo $upRow['thememenu_type']; ?>"><?php echo $upRow['thememenu_type']; ?></option>
<option value="Header">Header</option>
<option value="Footer">Footer</option>
<option value="Sidebar">Sidebar</option>
<option value="Pages">Pages</option>
</select>
</div>
<div class="mb-3">
<select class="required form-control" id="themecontentType">
<option value="default">Default</option>
<option value="dynamic">Dynamic</option>
</select>
</div>
<div class="mb-3">
<select class="form-control" id="thememenuroles">
<option value="sub">Dropdown menu</option>
<option value="none">Dropdown none</option>
</select>
</div>
<?php } } else {
header("location:pathUrl__DIR__ . /../menu/new/pages");
} } else { ?>
<div class="mb-3">
<input type="text" name="thememenuName" class="form-control" id="thememenuName" placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text" name="thememenuIcon" class="form-control" id="thememenuIcon" placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" name="thememenuPermalink" class="form-control" id="thememenuPermalink" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea name="thememenuContent" class="snow-editor-height-200 form-control" id="thememenuContent" rows="5" placeholder="Menu Content">Menu Content</textarea>
</div>
<div class="mb-3">
<select class="form-control" name="themepositionType" id="themepositionType">
<option value="Header">Header</option>
<option value="Footer">Footer</option>
<option value="Sidebar">Sidebar</option>
<option value="Pages">Pages</option>
</select>
</div>
<div class="mb-3">
<select class="form-control" id="themecontentType">
<option value="default">Default</option>
<option value="dynamic">Dynamic</option>
</select>
</div>
<div class="mb-3">
<select class="form-control" name="thememenuroles" id="thememenuroles">
<option value="sub">Dropdown menu</option>
<option value="none">Dropdown none</option>
</select>
</div>
<?php } ?>
<div class="mb-3">
<div class="text-end">
<button type="submit" class="btn btn-primary btn-46 submit">Save Now</button>
</div>
</div>
<script>
var urlupload = "/template/function/upload/content.gallery";
CKEDITOR.replace('thememenuContent',{
height:300,
filebrowserUploadMethod: 'form',
filebrowserUploadUrl: baseUrl + urlupload + baseUrlformat
});
</script>
<div class="table-responsive">
<?php
$limit = '20';
$page = 1;
if(!empty($_POST['page'])){
if($_POST['page'] > 1)
{
$start = (($_POST['page'] - 1) * $limit);
$page = $_POST['page'];
}
else
{
$start = 0;
}
}else{
$start = 0;
}
$query = "
SELECT * FROM  theme_main_menu
";
if($_POST['query'] != '')
{
$query .= '
WHERE	thememenu_name LIKE "%'.($_POST['query']).'%"
';
}
$query .= 'ORDER BY theme_position_order ASC ';
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';
$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();
$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();
if($total_data == '0'){
$output = '';
}else{
$output = '
<table class="table table-hover table-striped table-bordered">
<thead>
<tr>
<th>SL Number</th>
<th>Menu Descriptions</th>
<th>Status</th>
<th>Position</th>
<th>Update Date</th>
<th>Default / Dynamic</th>
<th class="text-right">Update Tool Now</th>
</tr>
</thead>
<tbody class="row_position">
';
}
$serial = '';
if($total_data > 0)
{
foreach($result as $row)
{
if($row['thememenu_status'] == 'active'){
$statusSwitch = 'checked';
$dissabled    = 'disabled';
}else{
$statusSwitch = '';
$dissabled    = 'none';
}
if($row['thememenu_content_type'] == 'dynamic'){
$contentSwitch = 'checked';
$dynamiclink   = '<a class="decoration-none" href="#"><button type="button" class="btn btn-success table-btn-runded btn-sm" disabled><i class="bi bi-grid-fill"></i></button></a>';
}else{
$contentSwitch = '';
$dynamiclink   = '<a class="decoration-none" href="'.pathUrl(__DIR__ . '/../../../').'theme/page/editor/'.$row['thememenu_id'].'"><button type="button" class="btn btn-success table-btn-runded btn-sm"><i class="bi bi-grid-fill"></i></button></a>';
}
if($row['thememenu_roles'] == 'sub'){
$submenulink = '<a class="decoration-none" href="'.pathUrl(__DIR__ . '/../../../').'theme/submenu/'.$row['thememenu_id'].'">'.$row['thememenu_name'].'</a>';
}else {
$submenulink = $row['thememenu_name'];
}
$output .= '
<tr id="'.$row['thememenu_id'].'">
<td>'.++$serial.'</td>
<td>'.$submenulink.'</td>
<td>
<div class="form-check form-switch">
<input class="form-check-input mychoice" type="checkbox" role="switch" value="'.$row['thememenu_id'].'" id="'.$row['thememenu_id'].'" '.$statusSwitch.' />
</div>
</td>
<td>'.$row['thememenu_type'].'</td>
<td>'.$row['thememenu_date'].'</td>
<td>
<div class="form-check form-switch">
<input class="form-check-input contentchoice" type="checkbox" role="switch" value="'.$row['thememenu_id'].'" id="'.$row['thememenu_id'].'" '.$contentSwitch.' />
</div>
</td>
<td class="text-right">
'.$dynamiclink.'
<a href="'.pathUrl(__DIR__ . '/../../../').'theme/update/pages/'.$row['thememenu_id'].'"><button type="button" class="btn btn-primary table-btn-runded btn-sm"><i class="bi bi-pencil"></i></button></a>
<button type="button" class="btn btn-danger table-btn-runded btn-sm mychoiceDel" data-id="'.$row['thememenu_id'].'" '.$dissabled.'><i class="bi bi-x-lg"></i></button>
</td>
</tr>
';
}
}
else
{
$output .= '
<tr>
<td colspan="7" class="text-center table-td-height"><center><img class="img-responsive img-not-found" src="'.pathUrl(__DIR__ . '/../../../').'uploads/10000000014.png" /></center></td>
</tr>
';
}
$output .= '
</tbody>
</table>
<div class="align-items-center mt-4 pt-2 justify-content-between d-flex">
<div class="flex-shrink-0">
<div class="text-muted">
Showing <span class="fw-semibold">'.$page.'</span> of <span class="fw-semibold">'.$total_data.'</span> Results
</div>
</div>
<ul class="pagination pagination-separated pagination-sm mb-0">
';
if($total_data == '0'){
}else{
$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';
if($total_data == '0'){
$page_array[] = '';
}else{
}
if($total_links > 5)
{
if($page < 6)
{
for($count = 1; $count <= 5; $count++)
{
$page_array[] = $count;
}
$page_array[] = '...';
$page_array[] = $total_links;
}
else
{
$end_limit = $total_links - 5;
if($page > $end_limit)
{
$page_array[] = 1;
$page_array[] = '...';
for($count = $end_limit; $count <= $total_links; $count++)
{
$page_array[] = $count;
}
}
else
{
$page_array[] = 1;
$page_array[] = '...';
for($count = $page - 1; $count <= $page + 1; $count++)
{
$page_array[] = $count;
}
$page_array[] = '...';
$page_array[] = $total_links;
}
}
}
else
{
for($count = 1; $count <= $total_links; $count++)
{
$page_array[] = $count;
}
}
for($count = 0; $count < count($page_array); $count++)
{
if($page == $page_array[$count])
{
$page_link .= '
<li class="page-item active">
<a class="page-link" href="javascript: void(0);">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
</li>
';
$previous_id = $page_array[$count] - 1;
if($previous_id > 0)
{
$previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
}
else
{
$previous_link = '
<li class="page-item disabled">
<a class="page-link" href="javascript: void(0);">Previous</a>
</li>
';
}
$next_id = $page_array[$count] + 1;
if($next_id >= $total_links)
{
$next_link = '
<li class="page-item disabled">
<a class="page-link" href="javascript:void(0);">Next</a>
</li>
';
}
else
{
$next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
}
}
else
{
if($page_array[$count] == '...')
{
$page_link .= '
<li class="page-item disabled">
<a class="page-link" href="javascript: void(0);">...</a>
</li>
';
}
else
{
$page_link .= '
<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
';
}
}
}
$output .= $previous_link . $page_link . $next_link;
$output .= '
</ul>
</div>
';
}
echo $output;
?>
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
var urldelect = '/template/function/delete';
$('.submit').click( function() {
var thememenu_idUP       = $('#thememenu_idUP').val();
var thememenuName        = $('#thememenuName').val();
var thememenuIcon        = $('#thememenuIcon').val();
var thememenuPermalink   = $('#thememenuPermalink').val();
var thememenuContent     = CKEDITOR.instances['thememenuContent'].getData();
var themecontentType     = $('#themecontentType').val();
var themepositionType    = $('#themepositionType').val();
var thememenuroles       = $('#thememenuroles').val();
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{thememenuName:thememenuName,thememenuIcon:thememenuIcon,thememenuPermalink:thememenuPermalink,
thememenuContent:thememenuContent,themecontentType:themecontentType,themepositionType:themepositionType,thememenuroles:thememenuroles,
thememenu_idUP:thememenu_idUP},
dataType:"text",
success:function(data){
if(data !== 'Success'){
$("#thememenuName").css("border-color","#FF5733");
$("#thememenuIcon").css("border-color","#FF5733");
$("#menuPermalink").css("border-color","#FF5733");
$("#thememenuContent").css("border-color","#FF5733");
$("#themepositionType").css("border-color","#FF5733");
$("#thememenuroles").css("border-color","#FF5733");
toastr.error(data);
}else{
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
}
});
});
// status update
$('.mychoice').click( function() {
var themenustatusID   = $(this).attr("id");
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{themenustatusID:themenustatusID},
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
// content status update
$('.contentchoice').click( function() {
var themcontentstatusID   = $(this).attr("id");
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{themcontentstatusID:themcontentstatusID},
dataType:"text",
success:function(data){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
// content delect
$('.mychoiceDel').click( function(){
var themenudelID   = $(this).attr("data-id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{themenudelID:themenudelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
// row sortable function
$(".row_position").sortable({
delay: 150,
stop: function() {
var selectedData = new Array();
$('.row_position>tr').each(function() {
selectedData.push($(this).attr("id"));
});
updateOrder(selectedData);
}
});
function updateOrder(orderID) {
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
type:'post',
data:{positionthmenu:orderID},
success:function(data){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
})
}
});
</script>

