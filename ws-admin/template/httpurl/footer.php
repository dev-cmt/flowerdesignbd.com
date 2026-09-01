<?php
use MatthiasMullie\Minify;
?>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
$(document).on("contextmenu", "img", function(e) {
return false;
});
});
if ($.fn.lazyload) {
$("img.lazy").lazyload({
effect : "fadeIn"
});
}
</script>
<?php
$outputFootJS = '';
$outputFootJS .= '
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/plugins.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/toastr.options.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/wow.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/main.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/typed.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../../').'public/js/owl.carousel.js"></script>
';
$minifierFootJS = new Minify\JS($outputFootJS);
echo $minifierFootJS->minify();
?>
</body>
</html>
