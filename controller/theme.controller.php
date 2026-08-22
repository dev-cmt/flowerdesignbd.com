<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
return false;
}
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/db.config.php';
require_once __DIR__ . '/../config/url/pathUrl.url.php';
$router = new \Bramus\Router\Router();
// home route start
$router->get('/', function (){
include 'template/pages/home.php';
});
$router->get('/readmore/(\d+)', function ($readmoreID){
include 'template/pages/project.php';
});
$router->get('/event/gallary/(\d+)', function ($readmoreID){
include 'template/pages/event.gallary.php';
});
$router->get('/event/album/(\d+)', function ($readmoreID){
include 'template/pages/event.album.php';
});
$router->get('/portfoliomore', function (){
include 'template/pages/portfolio.php';
});
// about route start
// contact route end
// Custom 404 Handler
$router->set404(function () {
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
include 'resources/theme/pages/home.php';
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
