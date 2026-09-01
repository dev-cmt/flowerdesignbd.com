<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
if(!empty($_POST['query'])){
$menuQ = "SELECT * FROM   theme_main_menu WHERE thememenu_id='".$_POST['query']."'";
$menuQ_data = $data->con->query($menuQ);
if ($menuQ_data->num_rows > 0) {
foreach($menuQ_data as $upRow)
{
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
$submenuQ = "SELECT * FROM  theme_sub_menu WHERE themesub_id='".$_POST['update']."'";
$submenuQ_data = $data->con->query($submenuQ);
if ($submenuQ_data->num_rows > 0) {
foreach($submenuQ_data as $subupRow)
{
?>
<div class="mb-3">
<input type="hidden" name="themenusub_update" id="themenusub_update" value="<?php echo $subupRow['themesub_id']; ?>" />
<input type="hidden" name="themenusubID" id="themenusubID" value="<?php echo $upRow['thememenu_id']; ?>" />
<input type="hidden" name="themenusutype" id="themenusutype" value="<?php echo $upRow['thememenu_type']; ?>" />
<input type="text" name="thesubmenuName" value="<?php echo $subupRow['themesub_name']; ?>" class="form-control" id="thesubmenuName" placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text" name="thesubmenuIcon" value="<?php echo $subupRow['themesub_icon']; ?>" class="form-control" id="thesubmenuIcon" placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" name="thesubmenuPermalink" value="<?php echo $subupRow['themesub_parmalink']; ?>" class="form-control" id="thesubmenuPermalink" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea name="thesubmenuContent" class="snow-editor-height-200 form-control" id="thesubmenuContent" rows="5" placeholder="Menu Content"><?php echo $subupRow['themesub_content']; ?></textarea>
</div>
<div class="mb-3">
<select class="form-control" name="thesubmenuroles" id="thesubmenuroles">
<option value="sub">Dropdown menu</option>
<option value="none">Dropdown none</option>
</select>
</div>
<?php } } else {
header("location:pathUrl__DIR__ . /../theme/submenu/".$_POST['query']);
} } else { ?>
<div class="mb-3">
<input type="hidden" name="themenusubID" id="themenusubID" value="<?php echo $upRow['thememenu_id']; ?>" />
<input type="hidden" name="themenusutype" id="themenusutype" value="<?php echo $upRow['thememenu_type']; ?>" />
<input type="text" name="thesubmenuName" class="form-control" id="thesubmenuName" placeholder="Menu Name" required>
</div>
<div class="mb-3">
<input type="text" name="thesubmenuIcon" class="form-control" id="thesubmenuIcon" placeholder="Menu Icon" required>
</div>
<div class="mb-3">
<input type="text" name="thesubmenuPermalink" class="form-control" id="thesubmenuPermalink" placeholder="Permalink Name" required>
</div>
<div class="mb-3">
<textarea name="thesubmenuContent" class="snow-editor-height-200 form-control" id="thesubmenuContent" rows="5" placeholder="Menu Content">Menu Content</textarea>
</div>
<div class="mb-3">
<select class="form-control" name="thesubmenuroles" id="thesubmenuroles">
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
CKEDITOR.replace('thesubmenuContent',{
height:300,
filebrowserUploadMethod: 'form',
filebrowserUploadUrl: baseUrl + urlupload + baseUrlformat
});
</script>
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
SELECT * FROM  theme_sub_menu INNER JOIN theme_main_menu ON theme_sub_menu.thememenu_id=theme_main_menu.thememenu_id
";
if($_POST['query'] != '')
{
$query .= '
WHERE	theme_main_menu.thememenu_id="'.($_POST['query']).'"
';
}
$query .= 'ORDER BY	theme_sub_menu.thememenu_orderposition ASC ';
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
if($row['themesub_status'] == 'active'){
$statusSwitch = 'checked';
$dissabled    = 'disabled';
}else{
$statusSwitch = '';
$dissabled    = 'none';
}
if($row['themesub_roles'] == 'sub'){
$submenulink = '<a class="decoration-none" href="'.pathUrl(__DIR__ . '/../../../').'theme/submenu/submenuto/'.$row['themesub_id'].'">'.$row['themesub_name'].'</a>';
}else {
$submenulink = $row['themesub_name'];
}
$output .= '
<tr id="'.$row['themesub_id'].'">
<td>'.++$serial.'</td>
<td>'.$row['thememenu_name'].'</td>
<td>'.$submenulink.'</td>
<td>
<div class="form-check form-switch">
<input class="form-check-input mychoice" type="checkbox" role="switch" value="'.$row['themesub_id'].'" id="'.$row['themesub_id'].'" '.$statusSwitch.' />
</div>
</td>
<td>'.$row['themesub_date'].'</td>
<td class="text-right">
<a href="'.pathUrl(__DIR__ . '/../../../').'theme/submenu/update/'.$upRow['thememenu_id'].'/'.$row['themesub_id'].'"><button type="button" class="btn btn-primary table-btn-runded btn-sm"><i class="bi bi-pencil"></i></button></a>
<button type="button" class="btn btn-danger table-btn-runded btn-sm mychoiceDel" data-id="'.$row['themesub_id'].'" '.$dissabled.'><i class="bi bi-x-lg"></i></button>
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
var themenusub_update   = $('#themenusub_update').val();
var themenusutype       = $('#themenusutype').val();
var themenusubID        = $('#themenusubID').val();
var thesubmenuName      = $('#thesubmenuName').val();
var thesubmenuIcon      = $('#thesubmenuIcon').val();
var thesubmenuPermalink = $('#thesubmenuPermalink').val();
var thesubmenuContent   = CKEDITOR.instances['thesubmenuContent'].getData();
var thesubmenuroles     = $('#thesubmenuroles').val();
$.ajax({
url: baseUrl + urlinsert + baseUrlformat,
method:"post",
data:{themenusutype:themenusutype,themenusubID:themenusubID,thesubmenuName:thesubmenuName,thesubmenuIcon:thesubmenuIcon,
thesubmenuPermalink:thesubmenuPermalink,thesubmenuContent:thesubmenuContent,thesubmenuroles:thesubmenuroles,
themenusub_update:themenusub_update},
dataType:"text",
success:function(data){
var check = ['This value is required','Name Duplicate'];
if(check.includes(data)){
$("#thesubmenuName").css("border-color","#FF5733");
$("#thesubmenuIcon").css("border-color","#FF5733");
$("#thesubmenuPermalink").css("border-color","#FF5733");
$("#thesubmenuContent").css("border-color","#FF5733");
$("#thesubmenuroles").css("border-color","#FF5733");
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
var thesubmenustatusID   = $(this).attr("id");
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{thesubmenustatusID:thesubmenustatusID},
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
var thesubmenudelID   = $(this).attr("data-id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{thesubmenudelID:thesubmenudelID},
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
data:{positionthsumenu:orderID},
success:function(data){
toastr.success(data);
setTimeout(function(){ location.reload(); }, 3000);
}
})
}
});
</script>
<?php } } } ?>

