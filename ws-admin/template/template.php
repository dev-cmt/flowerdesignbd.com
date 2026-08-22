<?php include 'template/httpurl/header.php'; ?>
<div id="layout-wrapper">
<div id="header"></div>
<div id="navbar">
<div class="app-menu navbar-menu" id="navbarmenu">
<div class="navbar-brand-box">
<a href="#" class="logo logo-dark">
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
<a class="nav-link menu-link" href="#">
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
<a href="#" class="nav-link" data-key="t-chat">New pages</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-chat">Page summary</a>
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
<a href="#" class="nav-link" data-key="t-chat">Heading update</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-chat">New pages</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-chat">Page summary</a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
<i class="bi bi-layout-text-sidebar-reverse"></i> <span data-key="t-authentication">Projects</span>
</a>
<div class="collapse menu-dropdown" id="sidebarAuth">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-horizontal">New projects</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link"  data-key="t-horizontal">Projects gallery</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-horizontal">Case studies</a>
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
<a href="#" class="nav-link" data-key="t-team">New Blog</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-timeline">Blog Gallery</a>
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
<a href="#" class="nav-link" data-key="t-nft-landing">Categories</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-nft-landing">Create Products</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link"><span data-key="t-job">Product Gallery</span></a>
</li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
<i class="bi bi-basket3"></i> <span data-key="t-base-ui">Get Quote</span>
</a>
<div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
<div class="row">
<div class="col-lg-4">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-alerts">Order Progress</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-badges">Order GetGuote</a>
</li>
</ul>
</div>
</div>
</div>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#">
<i class="bi bi-upload"></i> <span data-key="t-widgets">Client Logo</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#">
<i class="bi bi-info-circle"></i> <span data-key="t-widgets">Contact</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link menu-link" href="#">
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
<a href="#" class="nav-link" data-key="t-remix">Logo upload</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-boxicons">Setting</a>
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
<a href="#" class="nav-link" data-key="t-remix">Download</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-boxicons">Recovery</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link" data-key="t-material-design">Backup summary</a>
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
</div>
<div class="vertical-overlay"></div>
<div class="main-content">
<?php include '../controller/dashboard.controller.php'; ?>
<?php include 'template/component/footer.php'; ?>
</div>
</div>
<script type="text/javascript">
let headerUrl = '/template/component/header';
let navbarUrl = '/template/component/navbar';
var objXMLHttpRequest = new window.XMLHttpRequest();
method = 'GET';
var url = baseUrl + headerUrl + baseUrlformat;
if(!Function.prototype.bind){
Function.prototype.bind=function(oThis){
if (typeof this !== "function") throw new TypeError("");
var aArgs=Array.prototype.slice.call(arguments,1),fToBind=this,fNOP=function(){},fBound=function(){return fToBind.apply(this instanceof fNOP && oThis? this: oThis,aArgs.concat(Array.prototype.slice.call(arguments)));};
fNOP.prototype=this.prototype;
fBound.prototype=new fNOP();
return fBound;
};
}
objXMLHttpRequest.onreadystatechange = function() {
if (objXMLHttpRequest.readyState == XMLHttpRequest.DONE) {
if(objXMLHttpRequest.status === 200) {
objXMLHttpRequest.onload = function(event){
document.getElementById("header").innerHTML=objXMLHttpRequest.responseText;
};
}else{
reject('Error Code: ' +  objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
}
}
}
objXMLHttpRequest.open(method, encodeURI(url), true);
objXMLHttpRequest.withCredentials = true;
objXMLHttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
objXMLHttpRequest.send();
var objXMLHttpRequestn = new XMLHttpRequest();
var urln = baseUrl + navbarUrl + baseUrlformat;
objXMLHttpRequestn.onreadystatechange = function() {
if (objXMLHttpRequestn.readyState == XMLHttpRequest.DONE) {
if(objXMLHttpRequestn.status === 200) {
objXMLHttpRequestn.onload  = function(event){
document.getElementById("navbar").innerHTML = objXMLHttpRequestn.responseText;
event.preventDefault();
};
}else{
reject('Error Code: ' +  objXMLHttpRequestn.status + ' Error Message: ' + objXMLHttpRequestn.statusText);
}
}
}
objXMLHttpRequestn.open(method, encodeURI(urln), true);
objXMLHttpRequestn.overrideMimeType("text/html");
objXMLHttpRequestn.send();
</script>
<?php include 'template/httpurl/footer.php'; ?>
