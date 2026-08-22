<?php
$data = new Databases;
use MatthiasMullie\Minify;
$outputCSS = '';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Flower Design Wedding Planner. Flower Design is an outstanding Events Planner formed with the intention of excellent Client service. We are an in form events co. and running with Professionalism and Perfection through 6 years. Our inspiration is our large number of clients perception.</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="keywords" content="Flower Design Wedding Planner. Flower Design is an outstanding Events Planner formed with the intention of excellent Client service. We are an in form events co. and running with Professionalism and Perfection through 6 years. Our inspiration is our large number of clients perception.">
<meta name="description" content="Flower Design Wedding Planner. Flower Design is an outstanding Events Planner formed with the intention of excellent Client service. We are an in form events co. and running with Professionalism and Perfection through 6 years. Our inspiration is our large number of clients perception.">
<link rel=" shortcut icon" href="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/images/favicon.png" type="image/png">
<meta name="theme-color" content="#000000">
<?php
$outputCSS .= '
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/animate.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/font-awesome.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/bootstrap.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/owl.carousel.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/owl.theme.default.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/magnific-popup.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/odometer.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/custome.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/mdbbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/style.css">
<link rel="stylesheet" href="'.pathUrl(__DIR__ . '/../../').'public/css/responsive.css">
';
$minifierCSS = new Minify\CSS($outputCSS);
echo $minifierCSS->minify();
?>
<script src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/jquery-ui.min.js"></script>
<script src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/js/jquery.3.7.0.min.js"></script>
<script src="<?php echo pathUrl(__DIR__ . '/../../'); ?>public/baseUrl.js"></script>
</head>
<body>
<!-- Loadnig Page Start -->
<div class="loader-wrapper">
<div class="text-center middle">
<div class="lds-ellipsis">
<div></div>
<div></div>
<div></div>
<div></div>
</div>
</div>
</div>
<!-- Loadnig Page End -->
