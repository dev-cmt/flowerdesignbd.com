<?php
require_once __DIR__ . '/../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../vendor/autoload.php';
use MatthiasMullie\Minify;
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
<meta charset="utf-8" />
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Dashboard" name="description" />
<meta content="Themesbrand" name="author" />
<link rel="shortcut icon" href="<?php echo pathUrl(__DIR__ . '/../../../'); ?>uploads/favicon/favicon.png">
<?php
$outputCSS = '';
$outputCSS .= '
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/dropzone/dropzone.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css"  />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/aos/aos.css?reset,base,forms,template" media="screen" rel="stylesheet"  />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/font-awesome-4.7.0/css/font-awesome.min.css?reset,base,forms,template" media="screen" rel="stylesheet"  />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/swiper/swiper-bundle.min.css?reset,base,forms,template" media="screen" rel="stylesheet" />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/css/bootstrap.min.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/css/app.min.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css"  />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/css/icons.min.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/icons/font/bootstrap-icons.min.css?reset,base,forms,template" media="screen" rel="stylesheet" />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/css/custom.min.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/css/custome.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../').'public/assets/css/toastr.min.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
';
$minifierCSS = new Minify\CSS($outputCSS);
echo $minifierCSS->minify();
?>
</head>
<body>
<?php
$outputHeadJS = '';
$outputHeadJS .= '
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/dropzone/dropzone-min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/jquery-3.7.0.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/jquery-ui.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/layout.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/toastr.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/baseUrl.js"></script>
';
$minifierHeadJS = new Minify\JS($outputHeadJS);
echo $minifierHeadJS->minify();
?>
