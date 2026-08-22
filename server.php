<?php
require_once __DIR__ . '/config/db.config.php';
require_once __DIR__ . '/config/url/pathUrl.url.php';
require_once __DIR__ . '/vendor/autoload.php';
$data = new Databases;
function ob_end_clean_all() {
$handlers = ob_list_handlers();
while (count($handlers) > 0 && $handlers[count($handlers) - 1] != 'ob_gzhandler' && $handlers[count($handlers) - 1] != 'zlib output compression') {
ob_end_clean();
$handlers = ob_list_handlers();
}
}
ob_implicit_flush(1);
include 'template/template.php';
flush();
session_write_close();
$data->con->close();
?>
