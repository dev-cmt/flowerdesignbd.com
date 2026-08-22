<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
return false;
}
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/db.config.php';
require_once __DIR__ . '/../config/url/pathUrl.url.php';
$data = new Databases;
$router = new \Bramus\Router\Router();
$router->get('/', function (){
include 'template/secure/login.php';
});
$router->get('/lock/(\d+)', function ($lockID){
include 'template/secure/lockscreen.php';
});
$router->get('/recovery', function (){
include 'template/secure/recovery.php';
});
$router->get('/password', function (){
include 'template/secure/password.php';
});
$router->get('/logout', function () {
include 'template/pages/logout/logout.php';
});
// Custom 404 Handler
$router->set404(function () {
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
include 'template/secure/login.php';
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
