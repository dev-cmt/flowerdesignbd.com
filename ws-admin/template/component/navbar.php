<?php
if(isset($_COOKIE["PHPSESSID"]) !== '0'){
require_once __DIR__ . '/../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../config/db.config.php';
$data = new Databases;
?>
<div class="app-menu navbar-menu" id="navbarmenu">
<div class="navbar-brand-box">
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>ws-admin/dashboard" class="logo logo-dark">
<span class="logo-sm">
<img class="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../../'); ?>uploads/logo/admin.png" alt="" height="20">
</span>
<span class="logo-lg">
<img class="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../../'); ?>uploads/logo/admin.png" alt="" height="45">
</span>
</a>
<a href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>ws-admin" class="logo logo-light">
<span class="logo-sm">
<img class="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../../'); ?>uploads/logo/admin.png" alt="" height="20">
</span>
<span class="logo-lg">
<img class="lazy" data-srcset="<?php echo pathUrl(__DIR__ . '/../../../'); ?>uploads/logo/admin.png" alt="" height="45">
</span>
</a>
<button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
<i class="ri-record-circle-line"></i>
</button>
</div>
<div id="scrollbar">
<div class="container-fluid">
<div id="two-column-menu">
</div>
<ul class="navbar-nav" id="navbar-nav">
<li class="menu-title"><span data-key="t-menu">Menu</span></li>
<li class="nav-item">
<a class="nav-link menu-link" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>dashboard">
<i class="bi bi-house"></i> <span data-key="t-dashboards">Dashboards</span>
</a>
</li> <!-- end Dashboard Menu -->
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
<i class="bi bi-menu-button-wide"></i> <span data-key="t-apps">Menu setup</span>
</a>
<div class="collapse menu-dropdown" id="sidebarApps">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>menu/new/pages" class="nav-link" data-key="t-chat">New pages</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>menu/page/summary" class="nav-link" data-key="t-chat">Page summary</a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarTheme" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
<i class="bi bi-cup-hot"></i> <span data-key="t-apps">Theme setup</span>
</a>
<div class="collapse menu-dropdown" id="sidebarTheme">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>theme/heading/update" class="nav-link" data-key="t-chat">Heading and footer</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>theme/banner/slider" class="nav-link" data-key="t-chat">Banner slider</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>theme/new/pages" class="nav-link" data-key="t-chat">New pages</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>theme/page/summary" class="nav-link" data-key="t-chat">Page summary</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>theme/social/pages" class="nav-link" data-key="t-chat">Social media</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>theme/facebookYouTube" class="nav-link" data-key="t-chat">Facebook or YouTube</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>theme/default/gallery" class="nav-link" data-key="t-chat">Default media content</a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
<i class="bi bi-layout-text-sidebar-reverse"></i> <span data-key="t-authentication">Company profile</span>
</a>
<div class="collapse menu-dropdown" id="sidebarAuth">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>company/profile" class="nav-link" data-key="t-horizontal">Company</a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
<i class="bi bi-book"></i> <span data-key="t-pages">Blog</span>
</a>
<div class="collapse menu-dropdown" id="sidebarPages">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>blog/new" class="nav-link" data-key="t-team">New blog</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>blog/gallery" class="nav-link" data-key="t-timeline">Blog gallery</a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
<i class="bi bi-p-circle-fill"></i> <span data-key="t-landing">Event Pakages</span>
</a>
<div class="collapse menu-dropdown" id="sidebarLanding">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>create/pakages" class="nav-link" data-key="t-nft-landing">Create pakages</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>#create/pakages/gallery" class="nav-link"><span data-key="t-job">Pakages gallery</span></a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
<i class="bi bi-card-text"></i> <span data-key="t-landing">Products Manage</span>
</a>
<div class="collapse menu-dropdown" id="sidebarLanding">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>products/new/range" class="nav-link" data-key="t-nft-landing">Create products</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>products/range/gallery" class="nav-link"><span data-key="t-job">Product gallery</span></a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>client/logo">
<i class="bi bi-upload"></i> <span data-key="t-widgets">Client Logo</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>contact">
<i class="bi bi-info-circle"></i> <span data-key="t-widgets">Contact</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>subscriber">
<i class="bi bi-envelope"></i> <span data-key="t-widgets">Subscriber</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
<i class="bi bi-gear"></i> <span data-key="t-icons">Setting</span>
</a>
<div class="collapse menu-dropdown" id="sidebarIcons">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>setting/logo/upload" class="nav-link" data-key="t-remix">Logo upload</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>setting/update" class="nav-link" data-key="t-boxicons">Setting</a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarbackup" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
<i class="bi bi-database"></i> <span data-key="t-icons">Backup</span>
</a>
<div class="collapse menu-dropdown" id="sidebarbackup">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>backup/download" class="nav-link" data-key="t-remix">Download</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>backup/recovery" class="nav-link" data-key="t-boxicons">Recovery</a>
</li>
<li class="nav-item">
<a href="<?php echo pathUrl(__DIR__ . '/../../'); ?>backup/summary" class="nav-link" data-key="t-material-design">Backup summary</a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>logout">
<i class="bi bi-box-arrow-right"></i> <span data-key="t-widgets">Logout</span>
</a>
</li>
</ul>
</div>
</div>
<div class="sidebar-background"></div>
</div>
<?php } ?>
