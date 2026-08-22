<?php
error_reporting(E_ALL);
function insert_charset_header() {
header('Content-Type: text/html; charset=UTF-8');
exit;
}
include '../config/url/pathUrl.url.php';
include '../config/db.config.php';
$data    = new Databases;
$message = '';
$loadHe  = '';
include 'model/data.insert.php';
include 'model/data.update.php';
include 'model/data.delete.php';
?>
