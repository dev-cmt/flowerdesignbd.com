<?php
$data = new Databases;
?>
<header id="home" class="home-area hero-equal-height overflow-hidden section-padding">
<div class="container">
<div class="row d-flex align-items-center">
<div class="col-lg-10 col-md-8">
<div class="text-left home-content z-index position-relative">
<?php
$footerQ = "SELECT * FROM   theme_footer ORDER BY theme_footer_id LIMIT 1";
$footerQ_data = $data->con->query($footerQ);
if($footerQ_data->num_rows > 0) {
foreach($footerQ_data as $fetRow)
{
echo $fetRow['theme_footer_content'];
 } } ?>
<a href="#contact" class="button js-scroll">Contact <i class="fa fa-arrow-right"></i></a>
</div>
</div>
</div>
</div>
<div class="scroll-btn">
<a href="#about" class="js-scroll">
<img class="lazy" data-src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/placeholder.webp" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/mouse.svg" alt="scroll">
</a>
</div>
<div class="social">
<a class="text">Social Links</a>
<div class="line"></div>
<a href="https://www.facebook.com/flowerdesignbd" target="_blank"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
</div>
</header>
