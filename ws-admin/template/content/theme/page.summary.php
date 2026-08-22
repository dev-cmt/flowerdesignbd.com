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
<div class="col-sm-12">
<div class="hori-sitemap overflow-hidden">
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
<ul class="list-unstyled mb-0">
<li class="p-0 parent-title"><a href="javascript: void(0);" class="fw-semibold fs-14">Theme Menu</a></li>
<li>
<ul class="list-unstyled second-list row g-0 pt-0">
';
}
$serial = '';
if($total_data > 0)
{
foreach($result as $row)
{
$suboutput = '';
$submenuQ = "SELECT * FROM  theme_sub_menu WHERE thememenu_id='".$row['thememenu_id']."'";
$submenuQ_data = $data->con->query($submenuQ);
foreach($submenuQ_data as $subRow)
{
$suboutput .='
<li class="col-sm-6">
<a href="javascript: void(0);">'.$subRow['themesub_name'].'</a>
</li>
';
}
$output .= '
<li class="col-sm-2">
<a href="javascript: void(0);" class="sub-title">'.$row['thememenu_name'].'</a>
<ul class="list-unstyled row g-0 second-list">
'.$suboutput.'
</ul>
</li>
</li>
';
}
}
else
{
$output .= '<center><img class="img-responsive img-not-found" src="'.pathUrl(__DIR__ . '/../../../').'uploads/10000000014.png" /></center>';
}
$output .='
</ul>
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
</div>
