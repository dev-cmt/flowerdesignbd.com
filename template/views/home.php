<?php
require_once __DIR__ . '/../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../config/db.config.php';
require_once __DIR__ . '/../../template/parts/parts.header.php';
$data = new Databases;
?>
<section id="packages" class="section-padding">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="section-title">
<h2 class="">Our Packages</h2>
</div>
</div>
</div>
<div class="row justify-content-center">
<?php
$eventpkQ = "SELECT * FROM  event_pakage  ORDER BY event_pakage_id  ASC LIMIT 9";
$eventpkQ_data = $data->con->query($eventpkQ);
foreach($eventpkQ_data as $evpkRow)
{
?>
<div class="col-lg-4 col-sm-6 col-12 padding-top-15">
<div class="services-update wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.5s">
<?php
$eventimgQ = "SELECT * FROM  eventpakage_images WHERE event_pakage_id='".$evpkRow['event_pakage_id']."'  ORDER BY eventpakage_images_id ASC LIMIT 1";
$eventimgQ_data = $data->con->query($eventimgQ);
foreach($eventimgQ_data as $imgRow)
{
?>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>event/gallary/<?php echo $evpkRow['event_pakage_id']; ?>">
<div class="services-content">
<img  class="lazy object-fit-cover img-thumbnail img-fluid image-height-250" data-src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/placeholder.webp" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/event/<?php echo $imgRow['eventpakage_images_name']; ?>">
</div>
</a>
<?php } ?>
</div>
<center><a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>event/gallary/<?php echo $evpkRow['event_pakage_id']; ?>"><p class="bg-primary text-white titlenow"><i class="bi bi-cursor"></i> <?php echo $evpkRow['event_pakage_name']; ?></p></a></center>
</div>
<?php } ?>
</div>
</div>
</section>
<section id="service" class="service-area section-padding">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="section-title">
<h2 class="text-white">Our Service</h2>
</div>
</div>
</div>
<div class="row justify-content-center">
<?php
$projectQ = "SELECT * FROM  project_content ORDER BY RAND(), project_content_id ASC LIMIT 6";
$projectQ_data = $data->con->query($projectQ);
foreach($projectQ_data as $proRow)
{
?>
<div class="col-lg-4 col-sm-6 col-12">
<div class="services wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.5s">
<div class="services-title-icon d-flex">
<div class="services-icon">
<img class="lazy service-img img-fluid" data-src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/placeholder.webp" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/<?php echo $proRow['project_content_image']; ?>">
</div>
<h4 class="services-title"><?php echo $proRow['project_content_name']; ?></h4>
</div>
<div class="services-content">
<p class="text text-justify"><?php echo $proRow['project_content_content']; ?></p>
<a class="services-btn" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>readmore/<?php echo $proRow['project_content_id']; ?>">Read More <i class="fa fa-arrow-right"></i></a>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</section>

<section id="Portfolio" class="blogs section-padding bg-light">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-title">
<h2>Portfolio</h2>
<p class="section_subtitle">Meet My Awesome Works and Enjoy.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="row">
<?php
$proQ = "SELECT * FROM  banner_slider  ORDER BY bannerslider_id DESC LIMIT 16";
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
<div class="row justify-content-md-center">
<div class="col-sm-3">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>portfoliomore" class="button js-scroll">Portfolio More <i class="fa fa-arrow-right"></i></a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<!--Blog Section End-->
<section id="contact" class="contact-area section-padding padding-bottom-100">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-title">
<div style="text-decoration:none; overflow:hidden;max-width:100%;width:100%;height:350px;"><div id="embedded-map-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=Flower+Design+Wedding+Planner&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="embed-ded-maphtml" href="https://www.bootstrapskins.com/themes" id="get-data-for-map">premium bootstrap themes</a><style>#embedded-map-display img.text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="section-title">
<h2>Contact Us</h2>
<p class="section_subtitle">I will get back to you in less than 24 hours.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="contact-information wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.5s">
<div class="row">
<div class="col-sm-12">
<div class="contact-details">
<i class="fa fa-phone"></i>
<p>Call us</p>
<h6>+88 01756-951950 </h6>
</div>
</div>
<div class="col-sm-12">
<div class="contact-details">
<i class="fa fa-home"></i>
<p>Visit us</p>
<h6>137/A, New Eskaton, Dhaka-1217, Dhaka, Bangladesh</h6>
</div>
</div>
<div class="col-sm-12">
<div class="contact-details">
<i class="fa fa-envelope"></i>
<p>Email </p>
<h6>flowerdesignbd@gmail.com</h6>
</div>
</div>
<div class="col-sm-12">
<div class="contact-details">
<i class="fa fa-hashtag"></i>
<p>Social Media</p>
<ul class="social-icons">
<li class=""><a data-toggle="tooltip" href="https://www.facebook.com/flowerdesignbd" target="_blank" title="" data-original-title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
<li class=""><a data-toggle="tooltip" href="https://www.youtube.com/@flowerdesignweddingplanner2298" target="_blank" title="" data-original-title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
<li class=""><a data-toggle="tooltip" href="https://www.google.co.bd/" target="_blank" title="" data-original-title="Google"><i class="fa fa-google"></i></a></li>
<li class=""><a data-toggle="tooltip" href="https://dribbble.com/" target="_blank" title="" data-original-title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
<li class=""><a data-toggle="tooltip" href="https://github.com/" target="_blank" title="" data-original-title="GitHub"><i class="fa fa-github"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<form class="contact-form form wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.5s">
<div class="controls">
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="form-group has-error has-danger">
<input id="form_name" type="text" name="name" placeholder="Type Your Name" required="required">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group has-error has-danger">
<input id="form_email" type="email" name="email" placeholder="Type Your Email" required="required">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group has-error has-danger">
<input id="form_subject" type="text" name="subject" placeholder="Type Your Subject" required="required">
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<textarea id="form_message" name="message" placeholder="Type Your Message" rows="4" required="required"></textarea>
</div>
</div>
<div class="col-md-12">
<button type="button" class="button submit result" data-text="Send Message"><span>Send Message <i class="fa fa-arrow-right"></i></span></button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
