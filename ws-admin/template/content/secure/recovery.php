<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
?>
<div class="auth-page-wrapper pt-5">
<div class="auth-one-bg-position auth-one-bg" id="auth-particles">
<div class="bg-overlay"></div>
<div class="shape">
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
<path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
</svg>
</div>
</div>
<!-- auth page content -->
<div class="auth-page-content">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="text-center mt-sm-5 mb-4 text-white-50">
<div>
<a href="<?php echo pathUrl(__DIR__ . '/../../../../'); ?>" class="d-inline-block auth-logo"></a>
</div>
<p class="mt-3 fs-15 fw-medium"></p>
</div>
</div>
</div>
<!-- end row -->
<div class="row justify-content-center">
<div class="col-md-8 col-lg-6 col-xl-5">
<div class="card mt-4">
<div class="card-body p-4">
<div class="text-center mt-2">
<h6 class="text-primary"></h6>
<p class="text-muted"></p>
</div>
<div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
Your email will be sent to you
</div>
<div class="p-2">
<form>
<div class="mb-4">
<label class="form-label"><i class="bi bi-envelope-open"></i> Email</label>
<input type="email" class="form-control" id="email" placeholder="Enter Email" required>
</div>
<div class="text-center mt-4">
<button class="btn btn-success w-100 authbutton submit" type="submit">Send Reset Link</button>
</div>
</form><!-- end form -->
</div>
</div>
</div>
<div class="mt-4 text-center">
<p class="mb-0">Wait, I remember my password <a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>" class="fw-semibold text-primary text-decoration"> ws admin </a> </p>
</div>
</div>
</div>
</div>
</div>
</div>
