<?php
require_once __DIR__ . '/../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../config/db.config.php';
$data = new Databases;
?>
<header class="home-area-1 overflow-hidden section-padding"></header>
<section class="section-padding">
<div class="container">
<div class="row justify-content-center padding-bottom-50">
<?php
$proQ = "SELECT * FROM  banner_slider  ORDER BY bannerslider_id DESC LIMIT 40";
$proQ_data = $data->con->query($proQ);
foreach($proQ_data as $proRow)
{
?>
<!--Blogs Item-->
<div class="blog-item col-sm-3">
<div class="blog-img">
<a class="popup-img project-item" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/banner/<?php echo $proRow['bannerslider_image']; ?>">
<img class="lazy object-fit-cover img-thumbnail img-fluid image-height-250" data-src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/placeholder.webp" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/banner/<?php echo $proRow['bannerslider_image']; ?>">
</a>
</div>
</div>
<!--Blogs Item-->
<?php } ?>
</div>
</div>
</section>
