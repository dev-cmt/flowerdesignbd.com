<?php
include '../../config/url/pathUrl.url.php';
include '../../config/db.config.php';
$data = new Databases;
if(isset($_GET['getid'])){
$id = $_GET['getid'];
?>
<header class="home-area-1 overflow-hidden section-padding"></header>
<section class="section-padding">
<div class="container">
<div class="row justify-content-center padding-bottom-50">
<?php
$proQ = "SELECT * FROM  banner_slider  ORDER BY bannerslider_id DESC LIMIT 4";
$proQ_data = $data->con->query($proQ);
foreach($proQ_data as $proRow)
{
?>
<!--Blogs Item-->
<div class="blog-item col-sm-3">
<div class="blog-img">
<a class="popup-img project-item img-thumbnail rounded" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/banner/<?php echo $proRow['bannerslider_image']; ?>">
<img class="lazy object-fit-cover border rounded image-height-250" data-src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/placeholder.webp" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/banner/<?php echo $proRow['bannerslider_image']; ?>">
</a>
</div>
</div>
<!--Blogs Item-->
<?php } ?>
</div>
</div>
</section>
<section id="service" class="service-area section-padding padding-bottom-100">
<div class="container">
<div class="row justify-content-center">
<?php
$projectQ = "SELECT * FROM  project_content WHERE project_content_id='$id'";
$projectQ_data = $data->con->query($projectQ);
foreach($projectQ_data as $proRow)
{
?>
<div class="col-12">
<div class="services wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.5s">
<div class="services-title-icon d-flex">
<div class="services-icon">
<img class="lazy service-img img-fluid" data-src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/placeholder.webp" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/<?php echo $proRow['project_content_image']; ?>">
</div>
<h4 class="services-title"><?php echo $proRow['project_content_name']; ?></h4>
</div>
<div class="services-content">
<p class="text text-justify"><?php echo $proRow['project_content_content']; ?></p>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</section>
<?php } ?>
