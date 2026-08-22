<?php
use MatthiasMullie\Minify;
?>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
$(document).on("contextmenu", "img", function(e) {
return false;
});
});
$("img.lazy").lazyload({
effect : "fadeIn"
});
</script>
<?php
$outputFootJS = '';
$outputFootJS .= '
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/lazy.load.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/upload.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/toastr.options.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/simplebar/simplebar.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/node-waves/waves.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/feather-icons/feather.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/plugins.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/app.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/pages/form-file-upload.init.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/aos/aos.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/swiper/swiper-bundle.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/pages/animation-aos.init.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/pages/notifications.init.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/js/pages/profile.init.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/assets/libs/prismjs/prism.js"></script>
';
$minifierFootJS = new Minify\JS($outputFootJS);
echo $minifierFootJS->minify();
?>
</body>
</html>
