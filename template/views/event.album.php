<?php
include '../../config/url/pathUrl.url.php';
include '../../config/db.config.php';
$data = new Databases;
if(isset($_GET['getid'])){
$id = $_GET['getid'];
?>
<header id="home" class="home-area-1 overflow-hidden section-padding"></header>
<section class="section-padding">
<div class="container">
<div class="row justify-content-center padding-bottom-50">
<?php
$proQ = "SELECT * FROM  album_images  WHERE packages_category_id='$id' ORDER BY album_images_possition ASC LIMIT 500";
$proQ_data = $data->con->query($proQ);
foreach($proQ_data as $proRow)
{
?>
<div class="blog-item col-sm-3">
<div class="blog-img">
<a class="popup-img project-item" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/album/<?php echo $proRow['album_images_name']; ?>">
<img class="lazy object-fit-cover img-thumbnail img-fluid image-height-250" data-src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/placeholder.webp" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/album/<?php echo $proRow['album_images_name']; ?>">
</a>
</div>
</div>
<?php } ?>
</div>
</div>
</section>
<?php } ?>
