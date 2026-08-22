<?php
if(isset($_COOKIE["PHPSESSID"]) !== '0'){
require_once __DIR__ . '/../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../config/db.config.php';
$data = new Databases;
$Logs = "SELECT * FROM admin_login_support  where sha1(admin_log_email)='".$_COOKIE["PHPSESSID"]."' and admin_log_session='on' ORDER BY admin_log_id LIMIT 1";
$Logs_data = $data->con->query($Logs);
if ($Logs_data->num_rows > 0) {
foreach($Logs_data as $logsRow)
{
?>
<header id="page-topbar">
<div class="layout-width">
<div class="navbar-header">
<div class="d-flex">
<div class="navbar-brand-box horizontal-logo">
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>dashboard" class="logo logo-dark">
<span class="logo-sm">
<img class="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/admin.png" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/admin.png" alt="" height="22">
</span>
<span class="logo-lg">
<img class="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/admin.png" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/admin.png" alt="" height="17">
</span>
</a>
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>dashboard" class="logo logo-light">
<span class="logo-sm">
<img class="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/admin.png" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/admin.png" alt="" height="22">
</span>
<span class="logo-lg">
<img class="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/admin.png" src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/admin.png" alt="" height="17">
</span>
</a>
</div>
<button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
<span class="hamburger-icon">
<span></span>
<span></span>
<span></span>
</span>
</button>
<form class="app-search d-none d-md-block">
<div class="position-relative">
<input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
<span class="mdi mdi-magnify search-widget-icon"></span>
<span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
</div>
<div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
<div data-simplebar style="max-height: 320px;">
<!-- item-->
<div class="dropdown-header">
<h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
</div>
<div class="dropdown-item bg-transparent text-wrap">
<a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
<a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i class="mdi mdi-magnify ms-1"></i></a>
</div>
<!-- item-->
<div class="dropdown-header mt-2">
<h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
</div>
<!-- item-->
<a href="javascript:void(0);" class="dropdown-item notify-item">
<i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
<span>Analytics Dashboard</span>
</a>
<!-- item-->
<a href="javascript:void(0);" class="dropdown-item notify-item">
<i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
<span>Help Center</span>
</a>
<!-- item-->
<a href="javascript:void(0);" class="dropdown-item notify-item">
<i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
<span>My account settings</span>
</a>
<!-- item-->
<div class="dropdown-header mt-2">
<h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
</div>
<div class="notification-list">
<!-- item -->
<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
<div class="d-flex">
<img src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/user/219983.png" class="me-3 rounded-circle avatar-xs" alt="user-pic">
<div class="flex-1">
<h6 class="m-0">Angela Bernier</h6>
<span class="fs-11 mb-0 text-muted">Manager</span>
</div>
</div>
</a>
<!-- item -->
<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
<div class="d-flex">
<img src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/user/219983.png" class="me-3 rounded-circle avatar-xs" alt="user-pic">
<div class="flex-1">
<h6 class="m-0">David Grasso</h6>
<span class="fs-11 mb-0 text-muted">Web Designer</span>
</div>
</div>
</a>
<!-- item -->
<a href="javascript:void(0);" class="dropdown-item notify-item py-2">
<div class="d-flex">
<img src="<?php echo pathUrl(__DIR__ . '/../../'); ?>uploads/user/219983.png" class="me-3 rounded-circle avatar-xs" alt="user-pic">
<div class="flex-1">
<h6 class="m-0">Mike Bunch</h6>
<span class="fs-11 mb-0 text-muted">React Developer</span>
</div>
</div>
</a>
</div>
</div>

<div class="text-center pt-3 pb-1">
<a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
</div>
</div>
</form>
</div>

<div class="d-flex align-items-center">

<div class="dropdown d-md-none topbar-head-dropdown header-item">
<button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="bx bx-search fs-22"></i>
</button>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
<form class="p-3">
<div class="form-group m-0">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
<button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
</div>
</div>
</form>
</div>
</div>
<div class="ms-1 header-item d-none d-sm-flex">
<button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" data-toggle="fullscreen">
<i class='bx bx-fullscreen fs-22'></i>
</button>
</div>
<div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
<div class="dropdown ms-sm-3 header-item topbar-user">
<button type="button" class="btn shadow-none extra-width" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="d-flex align-items-center">
<img class="lazy rounded-circle header-profile-user" data-srcset="<?php echo pathUrl(__DIR__ . '/../../../'); ?>uploads/user/219983.png" src="<?php echo pathUrl(__DIR__ . '/../../../'); ?>uploads/user/219983.png">
<span class="text-start ms-xl-2">
<span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $logsRow['admin_log_name']; ?></span>
<span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Dashboard</span>
</span>
</span>
</button>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>profile"><span class="align-middle">Profile</span></a>
<a class="dropdown-item" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>help"><span class="align-middle">Help</span></a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>lock/<?php echo $logsRow['admin_log_id']; ?>?screen=1"><span class="align-middle">Lock screen</span></a>
<a class="dropdown-item" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>logout"><span class="align-middle" data-key="t-logout">Logout</span></a>
</div>
</div>
</div>
</div>
</div>
</header>
<?php } } } ?>
