<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
?>
<div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<!-- start page title -->
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<?php if(!empty($_POST['update'])){
$menuQ = "SELECT * FROM  main_menu  WHERE menu_id='".$_POST['update']."'";
$menuQ_data = $data->con->query($menuQ);
if ($menuQ_data->num_rows > 0) {
foreach($menuQ_data as $upRow)
{
?>
<div class="mb-3">
<input type="hidden" name="menu_idUP" id="menu_idUP" value="<?php echo $upRow['menu_id']; ?>" />
<input type="text" name="menuName" value="<?php echo $upRow['menu_name']; ?>" class="form-control" id="menuName" placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text" name="menuIcon" value="<?php echo $upRow['menu_icon']; ?>" class="form-control" id="menuIcon" placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" name="menuPermalink" value="<?php echo $upRow['menu_permalink']; ?>" class="form-control" id="menuPermalink" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea name="menuContent" class="snow-editor-height-200 form-control" id="menuContent" rows="5" placeholder="Menu Content" required><?php echo $upRow['menu_content']; ?></textarea>
</div>
<div class="mb-3">
<select class="required form-control" name="menuroles" id="contentType">
<option value="default">Default content</option>
<option value="dynamic">Dynamic content</option>
</select>
</div>
<div class="mb-3">
<select class="form-control" name="menuroles" id="menuroles">
<option value="sub">Dropdown menu</option>
<option value="none">Dropdown none</option>
</select>
</div>
<?php } } else {
header("location:pathUrl__DIR__ . /../menu/new/pages");
} } else { ?>
<div class="mb-3">
<input type="text" name="menuName" class="required form-control" id="menuName" placeholder="Menu Name" />
</div>
<div class="mb-3">
<input type="text" name="menuIcon" class="required form-control" id="menuIcon" placeholder="Menu Icon" />
</div>
<div class="mb-3">
<input type="text" name="menuPermalink" class="required form-control" id="menuPermalink" placeholder="Permalink Name" />
</div>
<div class="mb-3">
<textarea name="menuContent" class="snow-editor-height-200 form-control" id="menuContent" rows="5" placeholder="Menu Content">Menu Content</textarea>
</div>
<div class="mb-3">
<select class="required form-control" name="menuroles" id="contentType">
<option value="default">Default content</option>
<option value="dynamic">Dynamic content</option>
</select>
</div>
<div class="mb-3">
<select class="required form-control" name="menuroles" id="menuroles">
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
<div class="table-responsive">
<?php
$limit = '10';
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
SELECT * FROM  main_menu
";
if($_POST['query'] != '')
{
$query .= '
WHERE	menu_name LIKE "%'.($_POST['query']).'%"
';
}
$query .= 'ORDER BY position_order ASC ';
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
<th>Serial No</th>
<th>Icons</th>
<th>Menu Descriptions</th>
<th>Status</th>
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
if($row['menu_status'] == 'active'){
$statusSwitch = 'checked';
$dissabled    = 'disabled';
}else{
$statusSwitch = '';
$dissabled    = 'none';
}
if($row['menu_content_type'] == 'dynamic'){
$contentSwitch = 'checked';
$dynamiclink   = '<a class="decoration-none" href="#"><button type="button" class="btn btn-success table-btn-runded btn-sm" disabled><i class="bi bi-grid-fill"></i></button></a>';
}else{
$contentSwitch = '';
$dynamiclink   = '<a class="decoration-none" href="#'.pathUrl(__DIR__ . '/../../../').'menu/page/editor/'.$row['menu_id'].'"><button type="button" class="btn btn-success table-btn-runded btn-sm"><i class="bi bi-grid-fill"></i></button></a>';
}
if($row['menu_roles'] == 'sub'){
$submenulink = '<a class="decoration-none" href="'.pathUrl(__DIR__ . '/../../../').'menu/submenu/'.$row['menu_id'].'">'.$row['menu_name'].'</a>';
}else {
$submenulink = $row['menu_name'];
}
$output .= '
<tr id="remove'.$row['menu_id'].'">
<td>'.++$serial.'</td>
<td><i class="'.$row['menu_icon'].'"></i></td>
<td>'.$submenulink.'</td>
<td>
<div class="form-check form-switch">
<input class="form-check-input mychoice" type="checkbox" role="switch" value="'.$row['menu_id'].'" id="'.$row['menu_id'].'" '.$statusSwitch.' />
</div>
</td>
<td>'.$row['menu_createdb'].'</td>
<td>
<div class="form-check form-switch">
<input class="form-check-input contentchosen" type="checkbox" role="switch" value="'.$row['menu_id'].'" id="'.$row['menu_id'].'" '.$contentSwitch.' />
</div>
</td>
<td class="text-right">
'.$dynamiclink.'
<a href="'.pathUrl(__DIR__ . '/../../../').'menu/update/pages/'.$row['menu_id'].'"><button type="button" class="btn btn-primary table-btn-runded btn-sm"><i class="bi bi-pencil"></i></button></a>
<button type="button" class="btn btn-danger table-btn-runded btn-sm mychoiceDel" data-id="'.$row['menu_id'].'" '.$dissabled.'><i class="bi bi-x-lg"></i></button>
</td>
</tr>
';
}
}
else
{
$output .= '
<tr>
<td colspan="7" class="text-center table-td-height"><center><img class="img-responsive img-not-found" src="'.pathUrl(__DIR__ . '/../../../../').'uploads/10000000014.png" /></center></td>
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
var menu_idUP      = $('#menu_idUP').val();
var menuName       = $('#menuName').val();
var menuIcon       = $('#menuIcon').val();
var menuPermalink  = $('#menuPermalink').val();
var menuContent    = $('#menuContent').val();
var contentType    = $('#contentType').val();
var menuroles      = $('#menuroles').val();
var require        = ['Value is required', 'Name Duplicate'];
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{menuName:menuName,menuIcon:menuIcon,menuPermalink:menuPermalink,menuContent:menuContent,contentType:contentType,menuroles:menuroles,menu_idUP:menu_idUP},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#menuName").css("border-color","#FF5733");
$("#menuIcon").css("border-color","#FF5733");
$("#menuPermalink").css("border-color","#FF5733");
$("#menuContent").css("border-color","#FF5733");
$("#menuroles").css("border-color","#FF5733");
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
// status update
$('.mychoice').click( function() {
var menustatusID   = $(this).attr("id");
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{menustatusID:menustatusID},
dataType:"text",
success:function(data){
if(data !== 'active'){
toastr.error(data);
}else{
toastr.success(data);
}
setTimeout(function() {
$("#remove").load("#remove");
}, 3000);
}
});
});
// content status update
$('.contentchosen').click( function() {
var contentstatusID   = $(this).attr("id");
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{contentstatusID:contentstatusID},
dataType:"text",
success:function(data){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
// content delect
$('.mychoiceDel').click( function(){
var menudelID   = $(this).attr("data-id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{menudelID:menudelID},
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
data:{position:orderID},
success:function(data){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
})
}
});
</script>
