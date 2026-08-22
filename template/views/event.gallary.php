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
$proQ = "SELECT * FROM  packages_category INNER JOIN eventpakage_images On eventpakage_images.event_pakage_id=packages_category.event_pakage_id WHERE eventpakage_images.event_pakage_id='$id' ORDER BY packages_category.packages_category_possition ASC LIMIT 120";
$proQ_data = $data->con->query($proQ);
foreach($proQ_data as $proRow)
{
$albumQ = "SELECT * FROM  album_images  WHERE  packages_category_id='".$proRow['packages_category_id']."' ORDER BY album_images_id ASC LIMIT 1";
$albumQ_data = $data->con->query($albumQ);
if ($albumQ_data->num_rows > 0){
foreach($albumQ_data as $albumRow)
{
$albumimages = "uploads/album/".$albumRow['album_images_name'];
}
}else{
$albumimages = "uploads/event/".$proRow['eventpakage_images_name'];
}
?>
<div class="blog-item col-sm-3 padding-top-10">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>event/album/<?php echo $proRow['packages_category_id']; ?>">
<div class="blog-img img-overlay">
<img class="lazy object-fit-cover img-thumbnail img-fluid rounded" data-src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/placeholder.webp" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?><?php echo $albumimages; ?>">
<div class="overlay">
<div class="text_1"><?php echo $proRow['packages_album_name']; ?></div>
</div>
</div>
</a>
<center><p class="bg-primary text-white titlenow"><i class="bi bi-images"></i> <?php echo $proRow['packages_album_name']; ?></p></center>

</div>
<?php } ?>
</div>
</div>
</section>
<?php } ?>
