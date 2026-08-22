<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
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
SELECT * FROM  projects
";
if($_POST['query'] != '')
{
$query .= '
WHERE	project_name LIKE "%'.($_POST['query']).'%"
';
}
$query .= 'ORDER BY project_id ASC ';
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';
$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();
$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();
if($total_data == '0'){
$output = '<center><img class="img-responsive img-not-found" src="'.pathUrl(__DIR__ . '/../../../').'uploads/10000000014.png" /></center>';
}else{
$output = '
<table class="table table-hover table-striped table-bordered">
<thead>
<tr>
<th>Serial No</th>
<th>Project Name</th>
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
if($row['project_status'] == 'publish'){
$statusSwitch = 'checked';
$dissabled    = 'disabled';
}else{
$statusSwitch = '';
$dissabled    = 'none';
}
$output .= '
<tr id="'.$row['project_id'].'">
<td>'.++$serial.'</td>
<td>'.$row['project_name'].'</td>
<td>
<div class="form-check form-switch">
<input class="form-check-input mychoice" type="checkbox" role="switch" value="'.$row['project_id'].'" id="'.$row['project_id'].'" '.$statusSwitch.' />
</div>
</td>
<td>'.$row['project_date'].'</td>
<td class="text-right">
<a href="'.pathUrl(__DIR__ . '/../../../').'projects/update/'.$row['project_id'].'"><button type="button" class="btn btn-primary table-btn-runded btn-sm"><i class="bi bi-pencil"></i></button></a>
<button type="button" class="btn btn-danger table-btn-runded btn-sm mychoiceDel" data-id="'.$row['project_id'].'" '.$dissabled.'><i class="bi bi-x-lg"></i></button>
</td>
</tr>
';
}
}
else
{
$output .= '';
}
if($total_data == '0'){
}else{
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
<script type="text/javascript">
$(document).ready(function(){
var urlinsert = '/template/function/insert';
var urlupdate = '/template/function/update';
var urldelect = '/template/function/delete';
// status update
$('.mychoice').click( function() {
var projectstatusID   = $(this).attr("id");
$.ajax({
url: baseUrl + urlupdate + baseUrlformat,
method:"post",
data:{projectstatusID:projectstatusID},
dataType:"text",
success:function(data){
if(data !== 'publish'){
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
var projectdelID   = $(this).attr("data-id");
$.ajax({
url: baseUrl + urldelect + baseUrlformat,
method:"post",
data:{projectdelID:projectdelID},
dataType:"text",
success:function(data){
toastr.error(data);
setTimeout(function(){ location.reload(); }, 3000);
}
});
});
});
</script>
<script type="text/javascript">
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
function updateOrder(data) {
$.ajax({
url:"<?php echo pathUrl(__DIR__ . '/../../../'); ?>function/",
type:'post',
data:{position:data},
success:function(data){
toastr.success(data);
}
})
}
</script>
