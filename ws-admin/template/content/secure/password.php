<?php
include '../../../../config/db.config.php';
include '../../../../config/url/pathUrl.url.php';
?>
<div class="auth-page-wrapper pt-5">
<!-- auth page bg -->
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
<a href="index.html" class="d-inline-block auth-logo"></a>
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
<h6 class="text-primary">Create new password</h6>
<p class="text-muted"></p>
</div>
<div class="p-2">
<form action="#">
<div class="mb-3">
<label class="form-label" for="password-input"><i class="bi bi-shield-lock"></i> Password</label>
<div class="position-relative auth-pass-inputgroup">
<input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none shadow-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
</div>
<div id="passwordInput" class="form-text">Must be at least 8 characters.</div>
</div>
<div class="mb-3">
<label class="form-label" for="confirm-password-input"><i class="bi bi-shield-lock-fill"></i> Confirm Password</label>
<div class="position-relative auth-pass-inputgroup mb-3">
<input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="confirm-password-input" required>
<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none shadow-none text-muted password-addon" type="button" id="confirm-password-input"><i class="ri-eye-fill align-middle"></i></button>
</div>
</div>
<div id="password-contain" class="p-3 bg-light mb-2 rounded">
<p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
<p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
<p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
<p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
</div>
<div class="mt-4">
<button class="btn btn-success w-100 authbutton submit" type="submit">Password Recovery</button>
</div>
</form>
</div>
</div>
</div>
<div class="mt-4 text-center">
<p class="mb-0">Wait, I remember my password <a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>" class="fw-semibold text-primary text-decoration"> ws admin</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
