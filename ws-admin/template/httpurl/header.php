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
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/bootstrap.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/mdbbootstrap/css/mdb.min.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/font-awesome.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/animate.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/owl.carousel.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/owl.theme.default.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/magnific-popup.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/odometer.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/style.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/responsive.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/custome.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/dark.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
<link href="'.pathUrl(__DIR__ . '/../../../').'public/css/toastr.min.css?reset,base,forms,template" media="screen" rel="stylesheet" type="text/css" />
';
$minifierCSS = new Minify\CSS($outputCSS);
echo $minifierCSS->minify();
?>
</head>
<body>
<script>
function reject(message) {
console.error(message);
}
</script>
<?php
$outputHeadJS = '';
$outputHeadJS .= '
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/jquery.3.7.0.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/jquery-ui.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/bootstrap.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/toastr.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/baseUrl.js"></script>
';
$minifierHeadJS = new Minify\JS($outputHeadJS);
echo $minifierHeadJS->minify();
?>
