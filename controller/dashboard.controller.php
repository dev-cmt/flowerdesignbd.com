<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)){
return false;
}
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/db.config.php';
require_once __DIR__ . '/../config/url/pathUrl.url.php';
$data = new Databases;
$wsAdminRoot = __DIR__ . '/../ws-admin';
chdir($wsAdminRoot);
$router = new \Bramus\Router\Router();
$router->get('/', function (){
include 'template/pages/dashboard/dashboard.php';
});
$router->get('/dashboard', function () {
include 'template/pages/dashboard/dashboard.php';
});
$router->get('/menu/new/pages', function () {
include 'template/pages/menu/menu.create.php';
});
$router->get('/menu/update/pages/(\d+)', function ($menuID) {
include 'template/pages/menu/menu.create.php';
});
$router->get('/menu/submenu/(\d+)', function ($menuID) {
include 'template/pages/menu/menu.submenu.php';
});
$router->get('/menu/submenu/update/(\d+)/(\d+)', function ($menuID, $submenuID) {
include 'template/pages/menu/menu.submenu.php';
});
$router->get('/menu/page/summary', function () {
include 'template/pages/menu/page.summary.php';
});
// theme menu stats_stat_correlation
$router->get('/theme/heading/update', function () {
include 'template/pages/theme/heading.update.php';
});
$router->get('/theme/banner/slider', function () {
include 'template/pages/banner/slider.php';
});
$router->get('/theme/banner/slider/(\d+)', function ($bannerID) {
include 'template/pages/banner/slider.php';
});
$router->get('/theme/new/pages', function () {
include 'template/pages/theme/create.page.php';
});
$router->get('/theme/update/pages/(\d+)', function ($themeID) {
include 'template/pages/theme/create.page.php';
});
$router->get('/theme/submenu/(\d+)', function ($themeID) {
include 'template/pages/theme/create.submenu.php';
});
$router->get('/theme/submenu/update/(\d+)/(\d+)', function ($themeID, $updateD) {
include 'template/pages/theme/create.submenu.php';
});
$router->get('/theme/page/summary', function () {
include 'template/pages/theme/page.summary.php';
});
$router->get('/theme/submenu/submenuto/(\d+)', function ($themeID) {
include 'template/pages/theme/create.submenuto.php';
});
$router->get('/theme/submenuto/update/(\d+)/(\d+)', function ($themeID, $updateD) {
include 'template/pages/theme/create.submenuto.php';
});
$router->get('/theme/page/editor/(\d+)', function ($pageID) {
include 'template/pages/theme/page.editor.php';
});
$router->get('/theme/social/pages', function () {
include 'template/pages/social/social.pages.php';
});
$router->get('/theme/facebookYouTube', function () {
include 'template/pages/video/facebookYouTube.pages.php';
});
$router->get('/theme/facebookYouTube/(\d+)', function ($videoID) {
include 'template/pages/video/facebookYouTube.pages.php';
});
$router->get('/theme/social/pages/(\d+)', function ($socialID) {
include 'template/pages/social/social.pages.php';
});
$router->get('/theme/default/gallery', function () {
include 'template/pages/theme/default.gallery.php';
});
$router->get('/theme/default/gallery/(\d+)', function ($galleryID) {
include 'template/pages/theme/default.gallery.php';
});
// projects
$router->get('/projects/new/projects', function () {
include 'template/pages/project/new.project.php';
});
$router->get('/projects/update/(\d+)', function ($projectID){
include 'template/pages/project/new.project.php';
});
$router->get('/company/profile', function () {
include 'template/pages/company/profile.php';
});
$router->get('/company/profile/(\d+)', function ($companyID) {
include 'template/pages/company/profile.php';
});
$router->get('/projects/gallery', function () {
include 'template/pages/project/project.gallery.php';
});
// client logo
$router->get('/client/logo', function () {
include 'template/pages/client/client.logo.php';
});
// Contact
$router->get('/contact', function () {
include 'template/pages/contact/contact.support.php';
});
$router->get('/contact/replay/(\d+)', function ($contactID) {
include 'template/pages/contact/contact.support.php';
});
// Subscriber
$router->get('/subscriber', function () {
include 'template/pages/subscriber/subscriber.php';
});
// blog post
$router->get('/blog/new', function () {
include 'template/pages/blog/new.blog.php';
});
$router->get('/blog/update/(\d+)', function ($blogID){
include 'template/pages/blog/new.blog.php';
});
$router->get('/blog/gallery', function (){
include 'template/pages/blog/blog.gallery.php';
});
$router->get('/blog/details/(\d+)', function (){
include 'template/pages/blog/blog.summary.php';
});
// blog post
$router->get('/products/range/about', function () {
include 'template/pages/product/range.about.php';
});
$router->get('/products/new/range', function () {
include 'template/pages/product/new.product.php';
});
$router->get('/products/update/range/(\d+)', function ($productID) {
include 'template/pages/product/new.product.php';
});
$router->get('/products/range/gallery', function () {
include 'template/pages/product/product.gallery.php';
});
// order process
$router->get('/order/progress', function () {
include 'template/pages/order/order.progress.php';
});
$router->get('/order/getquote', function () {
include 'template/pages/order/order.getquote.php';
});
$router->get('/order/getquote/(\d+)', function ($getquoteID) {
include 'template/pages/order/order.getquote.php';
});
// Event pakage Now
$router->get('/create/pakages', function () {
include 'template/pages/pakages/create.pakage.php';
});
$router->get('/create/pakages/(\d+)', function ($update){
include 'template/pages/pakages/create.pakage.php';
});
$router->get('/create/pakages/(\d+)/(\d+)', function ($update,$editid){
include 'template/pages/pakages/create.pakage.php';
});
$router->get('/create/album/(\d+)/(\d+)', function ($update,$uploadID){
include 'template/pages/pakages/create.pakage.php';
});
// admin profile
$router->get('/profile', function () {
include 'template/pages/profile/profile.php';
});
$router->get('/help', function () {
include 'template/pages/profile/help.php';
});
$router->get('/settings', function () {
include 'template/pages/profile/settings.php';
});
// Logo upload
$router->get('/setting/logo/upload', function () {
include 'template/pages/setting/logo.upload.php';
});
// admin login lockscreen
$router->get('/lock/(\d+)', function ($lockName){
include 'template/pages/lockscreen/lockscreen.php';
});
$router->get('/logout', function () {
include 'template/pages/logout/logout.php';
});
// Custom 404 Handler
$router->set404(function () {
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
include 'template/secure/404.php';
});
$router->set404('/api(/.*)?', function() {
header('HTTP/1.1 404 Not Found');
header('Content-Type: application/json');
$jsonArray = array();
$jsonArray['status'] = "404";
$jsonArray['status_text'] = "route not defined";
echo json_encode($jsonArray);
});
$router->run();
?>
