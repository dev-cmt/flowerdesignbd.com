<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
if(!empty($_POST['query'])){
$menuQ = "SELECT * FROM  main_menu  WHERE menu_id='".$_POST['query']."'";
$menuQ_data = $data->con->query($menuQ);
if ($menuQ_data->num_rows > 0) {
foreach($menuQ_data as $upRow)
{
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
$submenuQ = "SELECT * FROM  sub_menu  WHERE submenu_id='".$_POST['update']."'";
$submenuQ_data = $data->con->query($submenuQ);
if ($submenuQ_data->num_rows > 0) {
foreach($submenuQ_data as $subupRow)
{
?>
<div class="mb-3">
<input type="hidden" name="menusub_update" id="menusub_update" value="<?php echo $subupRow['submenu_id']; ?>" />
<input type="hidden" name="menusubID" id="menusubID" value="<?php echo $upRow['menu_id']; ?>" />
<input type="text" name="submenuName" value="<?php echo $subupRow['submenu_name']; ?>" class="form-control" id="submenuName" placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text" name="submenuIcon" value="<?php echo $subupRow['submenu_icon']; ?>" class="form-control" id="submenuIcon" placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" name="submenuPermalink" value="<?php echo $subupRow['submenu_parmalink']; ?>" class="form-control" id="submenuPermalink" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea name="submenuContent" class="snow-editor-height-200 form-control" id="submenuContent" rows="5" placeholder="Menu Content"><?php echo $subupRow['submenu_content']; ?></textarea>
</div>
<?php } } else {
header("location:pathUrl__DIR__ . /../menu/submenu/");
} } else { ?>
<div class="mb-3">
<input type="hidden" name="menusubID" id="menusubID" value="<?php echo $upRow['menu_id']; ?>" />
<input type="text" name="submenuName" class="form-control" id="submenuName" placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text" name="submenuIcon" class="form-control" id="submenuIcon" placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" name="submenuPermalink" class="form-control" id="submenuPermalink" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea name="submenuContent" class="snow-editor-height-200 form-control" id="submenuContent" rows="5" placeholder="Menu Content">Menu Content</textarea>
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
SELECT * FROM  sub_menu INNER JOIN main_menu ON sub_menu.menu_id=main_menu.menu_id
";
if($_POST['query'] != '')
{
$query .= '
WHERE	main_menu.menu_id="'.($_POST['query']).'"
';
}
$query .= 'ORDER BY	sub_menu.menu_position_order ASC ';
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
<th>Menu</th>
<th>Sub Menu Descriptions</th>
<th>Status</th>
<th>Update Date</th>
<th class="text-right">Update Tool</th>
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
if($row['submenu_status'] == 'active'){
$statusSwitch = 'checked';
$dissabled    = 'disabled';
}else{
$statusSwitch = '';
$dissabled    = 'none';
}
$output .= '
<tr id="'.$row['submenu_id'].'">
<td>'.++$serial.'</td>
<td>'.$row['menu_name'].'</td>
<td>'.$row['submenu_name'].'</td>
<td>
<div class="form-check form-switch">
<input class="form-check-input mychoice" type="checkbox" role="switch" value="'.$row['submenu_id'].'" id="'.$row['submenu_id'].'" '.$statusSwitch.' />
</div>
</td>
<td>'.$row['submenu_createdb'].'</td>
<td class="text-right">
<a href="'.pathUrl(__DIR__ . '/../../../').'menu/submenu/update/'.$upRow['menu_id'].'/'.$row['submenu_id'].'"><button type="button" class="btn btn-primary table-btn-runded btn-sm"><i class="bi bi-pencil"></i></button></a>
<button type="button" class="btn btn-danger table-btn-runded btn-sm mychoiceDel" data-id="'.$row['submenu_id'].'" '.$dissabled.'><i class="bi bi-x-lg"></i></button>
</td>
</tr>
';
}
}
else
{
$output .= '
<tr>
<td colspan="6" class="text-center table-td-height"><center><img class="img-responsive img-not-found" src="'.pathUrl(__DIR__ . '/../../../../').'uploads/10000000014.png" /></center></td>
</tr>
';
}
$output .= '
</tbody>
</table>
';
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
var menusub_update    = $('#menusub_update').val();
var menusubID         = $('#menusubID').val();
var submenuName       = $('#submenuName').val();
var submenuIcon       = $('#submenuIcon').val();
var submenuPermalink  = $('#submenuPermalink').val();
var submenuContent    = $('#submenuContent').val();
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{menusubID:menusubID,submenuName:submenuName,submenuIcon:submenuIcon,submenuPermalink:submenuPermalink,submenuContent:submenuContent,menusub_update:menusub_update},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#submenuName").css("border-color","#FF5733");
$("#submenuIcon").css("border-color","#FF5733");
$("#submenuPermalink").css("border-color","#FF5733");
$("#submenuContent").css("border-color","#FF5733");
toastr.error(data);
}else if(data == 'Update'){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}else{
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
}
});
});
// status update
$('.mychoice').click( function() {
var submenustatusID   = $(this).attr("id");
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{submenustatusID:submenustatusID},
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
// content delect
$('.mychoiceDel').click( function(){
var submenudelID   = $(this).attr("data-id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{submenudelID:submenudelID},
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
function updateOrder(orderID){
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
type:'post',
data:{positionsub:orderID},
success:function(data){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
})
}
});
</script>
<?php } } } ?>
