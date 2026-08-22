<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
$data = new Databases;
?>
<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-lg-12">
<div class="card rounded-0 bg-soft-success mx-n4 mt-n4 border-top">
<div class="px-4">
<div class="row">
<div class="col-xxl-5 align-self-center">
<div class="py-4">
<h4 class="display-6 coming-soon-text"></h4>
<p class="text-success fs-15 mt-3"></p>
<div class="height-50"></div>
<div class="hstack flex-wrap gap-2">
<button type="button" class="btn btn-primary btn-label rounded-pill"><i class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i> Email Us</button>
<button type="button" class="btn btn-info btn-label rounded-pill"><i class="ri-twitter-line label-icon align-middle rounded-pill fs-16 me-2"></i> Send Us Tweet</button>
</div>
</div>
</div>
<div class="col-xxl-3 ms-auto">
<div class="mb-n5 pb-1 faq-img d-none d-xxl-block">
<img src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>public/assets/images/faq-img.png" alt="" class="img-fluid">
</div>
</div>
</div>
</div>
<!-- end card body -->
</div>
<!-- end card -->

<div class="row justify-content-evenly">
<div class="col-lg-4">
<div class="mt-3">
<div class="d-flex align-items-center mb-2">
<div class="flex-shrink-0 me-1">
<i class="ri-question-line fs-16 align-middle text-success me-1"></i>
</div>
<div class="flex-grow-1">
<h6 class="fs-14 mb-0 fw-semibold">General Questions</h6>
</div>
</div>

<div class="accordion accordion-border-box" id="genques-accordion">
<div class="accordion-item shadow">
<h2 class="accordion-header" id="genques-headingOne">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseOne" aria-expanded="true" aria-controls="genques-collapseOne">
What is Lorem Ipsum ?
</button>
</h2>
<div id="genques-collapseOne" class="accordion-collapse collapse show" aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="genques-headingTwo">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseTwo" aria-expanded="false" aria-controls="genques-collapseTwo">
Why do we use it ?
</button>
</h2>
<div id="genques-collapseTwo" class="accordion-collapse collapse" aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="genques-headingThree">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseThree" aria-expanded="false" aria-controls="genques-collapseThree">
Where does it come from ?
</button>
</h2>
<div id="genques-collapseThree" class="accordion-collapse collapse" aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="genques-headingFour">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseFour" aria-expanded="false" aria-controls="genques-collapseFour">
Where can I get some ?
</button>
</h2>
<div id="genques-collapseFour" class="accordion-collapse collapse" aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
<div class="accordion-body">

</div>
</div>
</div>
</div>
<!--end accordion-->
</div>
</div>

<div class="col-lg-4">
<div class="mt-3">
<div class="d-flex align-items-center mb-2">
<div class="flex-shrink-0 me-1">
<i class="ri-user-settings-line fs-16 align-middle text-success me-1"></i>
</div>
<div class="flex-grow-1">
<h6 class="fs-14 mb-0 fw-semibold">Manage Account</h6>
</div>
</div>

<div class="accordion accordion-border-box" id="manageaccount-accordion">
<div class="accordion-item shadow">
<h2 class="accordion-header" id="manageaccount-headingOne">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseOne" aria-expanded="false" aria-controls="manageaccount-collapseOne">
Where can I get some ?
</button>
</h2>
<div id="manageaccount-collapseOne" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingOne" data-bs-parent="#manageaccount-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="manageaccount-headingTwo">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseTwo" aria-expanded="true" aria-controls="manageaccount-collapseTwo">
Where does it come from ?
</button>
</h2>
<div id="manageaccount-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="manageaccount-headingTwo" data-bs-parent="#manageaccount-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="manageaccount-headingThree">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseThree" aria-expanded="false" aria-controls="manageaccount-collapseThree">
Why do we use it ?
</button>
</h2>
<div id="manageaccount-collapseThree" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingThree" data-bs-parent="#manageaccount-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="manageaccount-headingFour">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseFour" aria-expanded="false" aria-controls="manageaccount-collapseFour">
What is Lorem Ipsum ?
</button>
</h2>
<div id="manageaccount-collapseFour" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingFour" data-bs-parent="#manageaccount-accordion">
<div class="accordion-body">

</div>
</div>
</div>
</div>
<!--end accordion-->
</div>
</div>

<div class="col-lg-4">
<div class="mt-3">
<div class="d-flex align-items-center mb-2">
<div class="flex-shrink-0 me-1">
<i class="ri-shield-keyhole-line fs-16 align-middle text-success me-1"></i>
</div>
<div class="flex-grow-1">
<h6 class="fs-14 mb-0 fw-semibold">Privacy &amp; Security</h6>
</div>
</div>

<div class="accordion accordion-border-box" id="privacy-accordion">
<div class="accordion-item shadow">
<h2 class="accordion-header" id="privacy-headingOne">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseOne" aria-expanded="true" aria-controls="privacy-collapseOne">
Why do we use it ?
</button>
</h2>
<div id="privacy-collapseOne" class="accordion-collapse collapse show" aria-labelledby="privacy-headingOne" data-bs-parent="#privacy-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="privacy-headingTwo">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseTwo" aria-expanded="false" aria-controls="privacy-collapseTwo">
Where can I get some ?
</button>
</h2>
<div id="privacy-collapseTwo" class="accordion-collapse collapse" aria-labelledby="privacy-headingTwo" data-bs-parent="#privacy-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="privacy-headingThree">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseThree" aria-expanded="false" aria-controls="privacy-collapseThree">
What is Lorem Ipsum ?
</button>
</h2>
<div id="privacy-collapseThree" class="accordion-collapse collapse" aria-labelledby="privacy-headingThree" data-bs-parent="#privacy-accordion">
<div class="accordion-body">

</div>
</div>
</div>
<div class="accordion-item shadow">
<h2 class="accordion-header" id="privacy-headingFour">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseFour" aria-expanded="false" aria-controls="privacy-collapseFour">
Where does it come from ?
</button>
</h2>
<div id="privacy-collapseFour" class="accordion-collapse collapse" aria-labelledby="privacy-headingFour" data-bs-parent="#privacy-accordion">
<div class="accordion-body">

</div>
</div>
</div>
</div>
<!--end accordion-->
</div>
</div>
</div>
</div>
<!--end col-->.
</div>
<!--end row-->
</div>
<!-- container-fluid -->
</div>
