<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
?>
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="">
<div class="card-body">
<div class="row">
<div class="col-lg-12">
<div class="row gallery-wrapper">
<?php
$limit = '12';
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
$output = '';
}else{
$output = '';
}
$serial = '';
if($total_data > 0)
{
foreach($result as $row)
{
$imageOut = '<img class="contain img-thumbnail gallery-img img-fluid mx-auto" src="'.pathUrl(__DIR__ . '/../../../../').'uploads/10000000020.png" alt="" />';
$proImageQ = "SELECT * FROM projects_images WHERE project_id='".$row['project_id']."' ORDER BY projectimages_id LIMIT 1";
$proImageQ_data = $data->con->query($proImageQ);
foreach($proImageQ_data as $primgRow)
{
$imageOut = '<img class="contain img-thumbnail gallery-img img-fluid mx-auto" src="'.pathUrl(__DIR__ . '/../../../../').'uploads/project/'.$primgRow['projectimages_name'].'"/>';
}
$date = new DateTime($row['project_date'], new DateTimezone('Asia/Dhaka')); $currentDate = $date->format('F Y, m');
$output .= '
<div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development" data-category="designing development">
<div class="gallery-box card">
<div class="gallery-container gallery-overlay">
<a class="image-popup" href="#" title="">
'.$imageOut.'
<div class="gallery-overlay">
<h5 class="overlay-caption">'.$row['project_name'].'</h5>
</div>
</a>
</div>
<div class="box-content">
<div class="d-flex align-items-center mt-1">
<div class="flex-grow-1 text-muted">by <a href="#" class="text-body text-truncate">Projects</a></div>
<div class="flex-shrink-0">
<div class="d-flex gap-3">
<button type="button" class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0 shadow-none">
'.$currentDate.'
</button>
</div>
</div>
</div>
</div>
</div>
</div>
';
}
}
else
{
$output .= '<center><img class="img-responsive" src="'.pathUrl(__DIR__ . '/../../../').'uploads/10000000014.png" /></center>';
}
$output .= '
</div>
<div class="text-center my-2">
<div class="row g-0 text-center">
<ul class="pagination pagination-separated justify-content-center">
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
</div>
