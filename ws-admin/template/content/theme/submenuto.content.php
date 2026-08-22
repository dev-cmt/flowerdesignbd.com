<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
if(!empty($_POST['query'])){
$menuQ = "SELECT * FROM   theme_sub_menu WHERE themesub_id='".$_POST['query']."'";
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
$submenuQ = "SELECT * FROM  theme_submenuto  WHERE themesubmenu_id='".$_POST['update']."'";
$submenuQ_data = $data->con->query($submenuQ);
if ($submenuQ_data->num_rows > 0) {
foreach($submenuQ_data as $subupRow)
{
?>
<div class="mb-3">
<input type="hidden" id="thesubto_update" value="<?php echo $subupRow['themesubmenu_id']; ?>" />
<input type="hidden" id="thesubtoID" value="<?php echo $upRow['themesub_id']; ?>" />
<input type="hidden" id="thesubtotype" value="<?php echo $upRow['themesub_type']; ?>" />
<input type="text"   id="thesubtoName" value="<?php echo $subupRow['themesubmenu_name']; ?>" class="form-control" placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text"  id="thesubtoIcon" value="<?php echo $subupRow['themesubmenu_icon']; ?>" class="form-control" placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" id="thesubtoPermalink" value="<?php echo $subupRow['themesubmenu_parmalink']; ?>" class="form-control" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea id="thesubtoContent" class="snow-editor-height-200 form-control"  rows="5" placeholder="Menu Content"><?php echo $subupRow['themesubmenu_content']; ?></textarea>
</div>
<div class="mb-3">
<select class="form-control" id="thesubtoroles">
<option value="sub">Dropdown menu</option>
<option value="none">Dropdown none</option>
</select>
</div>
<?php } } else {
header("location:pathUrl__DIR__ . /../theme/submenu/submenuto/".$_POST['query']);
} } else { ?>
<div class="mb-3">
<input type="hidden" id="thesubtoID" value="<?php echo $upRow['themesub_id']; ?>" />
<input type="hidden" id="thesubtotype" value="<?php echo $upRow['themesub_type']; ?>" />
<input type="text"   id="thesubtoName" class="form-control"  placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text" id="thesubtoIcon" class="form-control"  placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" id="thesubtoPermalink" class="form-control" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea id="thesubtoContent" class="snow-editor-height-200 form-control" rows="5" placeholder="Menu Content">Menu Content</textarea>
</div>
<div class="mb-3">
<select class="form-control" id="thesubtoroles">
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
SELECT * FROM  theme_submenuto INNER JOIN theme_sub_menu ON theme_submenuto.themesub_id=theme_sub_menu.themesub_id INNER JOIN  theme_main_menu ON theme_sub_menu.thememenu_id=theme_main_menu.thememenu_id
";
if($_POST['query'] != '')
{
$query .= '
WHERE	theme_sub_menu.themesub_id="'.($_POST['query']).'"
';
}
$query .= 'ORDER BY	theme_submenuto.themesubmenu_orderposition ASC ';
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
<th>Sub Menu</th>
<th>Sub Menu to Descriptions</th>
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
if($row['themesubmenu_status'] == 'active'){
$statusSwitch = 'checked';
$dissabled    = 'disabled';
}else{
$statusSwitch = '';
$dissabled    = 'none';
}
if($row['themesubmenu_roles'] == 'sub'){
$submenulink = '<a class="decoration-none" href="'.pathUrl(__DIR__ . '/../../../').'theme/submenu/submenuto/'.$row['themesubmenu_id'].'">'.$row['themesubmenu_name'].'</a>';
}else{
$submenulink = $row['themesubmenu_name'];
}
$output .= '
<tr id="'.$row['themesubmenu_id'].'">
<td>'.++$serial.'</td>
<td>'.$row['thememenu_name'].'</td>
<td>'.$row['themesub_name'].'</td>
<td>'.$submenulink.'</td>
<td>
<div class="form-check form-switch">
<input class="form-check-input mychoice" type="checkbox" role="switch" value="'.$row['themesubmenu_id'].'" id="'.$row['themesubmenu_id'].'" '.$statusSwitch.' />
</div>
</td>
<td>'.$row['themesub_date'].'</td>
<td class="text-right">
<a href="'.pathUrl(__DIR__ . '/../../../').'theme/submenuto/update/'.$upRow['themesub_id'].'/'.$row['themesubmenu_id'].'"><button type="button" class="btn btn-primary table-btn-runded btn-sm"><i class="bi bi-pencil"></i></button></a>
<button type="button" class="btn btn-danger table-btn-runded btn-sm mychoiceDel" data-id="'.$row['themesubmenu_id'].'" '.$dissabled.'><i class="bi bi-x-lg"></i></button>
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
var thesubto_update   = $('#thesubto_update').val();
var thesubtoID        = $('#thesubtoID').val();
var thesubtotype      = $('#thesubtotype').val();
var thesubtoName      = $('#thesubtoName').val();
var thesubtoIcon      = $('#thesubtoIcon').val();
var thesubtoPermalink = $('#thesubtoPermalink').val();
var thesubtoContent   = $('#thesubtoContent').val();
var thesubtoroles     = $('#thesubtoroles').val();
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{thesubto_update:thesubto_update,thesubtoID:thesubtoID,thesubtotype:thesubtotype,thesubtoName:thesubtoName,
thesubtoIcon:thesubtoIcon,thesubtoPermalink:thesubtoPermalink,thesubtoContent:thesubtoContent,
thesubtoroles:thesubtoroles},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#thesubtoName").css("border-color","#FF5733");
$("#thesubtoIcon").css("border-color","#FF5733");
$("#thesubtoPermalink").css("border-color","#FF5733");
$("#thesubtoContent").css("border-color","#FF5733");
$("#thesubtoroles").css("border-color","#FF5733");
toastr.error(data);
}else if(data == 'Update'){
toastr.info(data);
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
var thesubtostatusID   = $(this).attr("id");
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{thesubtostatusID:thesubtostatusID},
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
var thesubtodelID   = $(this).attr("data-id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{thesubtodelID:thesubtodelID},
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
data:{positionsubto:orderID},
success:function(data){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
})
}
});
</script>
<?php } } } ?>
