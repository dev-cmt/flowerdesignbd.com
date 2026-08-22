<?php
use MatthiasMullie\Minify;
$outputFOOT = '';
?>
<a href="#" class="back-to-top back-to-top-pulse"><i class="fa fa-arrow-up"></i></a>
<!--Jquery js-->
<script>
function logElementEvent(eventName, element) {
console.log(Date.now(), eventName, element.getAttribute("data-src"));
}
var callback_enter = function (element) {
logElementEvent("🔑 ENTERED", element);
};
var callback_exit = function (element) {
logElementEvent("🚪 EXITED", element);
};
var callback_loading = function (element) {
logElementEvent("⌚ LOADING", element);
};
var callback_loaded = function (element) {
logElementEvent("👍 LOADED", element);
};
var callback_error = function (element) {
logElementEvent("💀 ERROR", element);
element.src ="https://via.placeholder.com/440x560/?text=Error+Placeholder";
};
var callback_finish = function () {
logElementEvent("✔️ FINISHED", document.documentElement);
};
var callback_cancel = function (element) {
logElementEvent("🔥 CANCEL", element);
};
window.lazyLoadOptions = {
threshold: 0,
callback_enter: callback_enter,
callback_exit: callback_exit,
callback_cancel: callback_cancel,
callback_loading: callback_loading,
callback_loaded: callback_loaded,
callback_error: callback_error,
callback_finish: callback_finish
};
window.addEventListener(
"LazyLoad::Initialized",
function (e) {
console.log(e.detail.instance);
},
false
);
</script>
<script>
const img_slider_elements=document.querySelectorAll(".img-caroussel");
const arrows_elts= document.querySelectorAll(".arrows i")
const round_elts=document.querySelectorAll(".round");
let current_img= 1;
round_elts.forEach((round_elt)=>{
round_elt.addEventListener("click", change_img_slider)
})
arrows_elts.forEach((arrow)=>{
arrow.addEventListener("click", change_img_slider)
})
function change_img_slider(e){
let index_img_to_show=null
if (e.currentTarget.id === "previous"){
index_img_to_show= parseInt(current_img) - 1 < 1 ? img_slider_elements.length  :  parseInt(current_img) - 1
}
else if(e.currentTarget.classList.contains("round")){
index_img_to_show=e.currentTarget.getAttribute("data-img")
}
else{
index_img_to_show= parseInt(current_img) + 1 > img_slider_elements.length ? 1 :  parseInt(current_img) + 1
}
img_slider_elements.forEach((img)=>{
img.classList.remove("active")
if(img.getAttribute("data-img") == index_img_to_show){
current_img= img.getAttribute("data-img")
img.classList.add("active")
}
})
round_elts.forEach((round_elt)=>{
round_elt.classList.remove("active")
if(round_elt.getAttribute("data-img") == index_img_to_show){
round_elt.classList.add("active")
}
})
}
</script>
<?php
$outputFOOT .= '
<script src="'.pathUrl(__DIR__ . '/../../').'public/node_modules/vanilla-lazyload/dist/lazyload.min.js" async></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/mdbbootstrap/js/mdb.umd.min.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/js/jquery-3.5.1.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/js/plugins.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/js/bootstrap.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/js/owl.carousel.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/js/typed.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/js/wow.js"></script>
<script src="'.pathUrl(__DIR__ . '/../../').'public/js/main.js"></script>
';
$minifierFOOT = new Minify\JS($outputFOOT);
echo $minifierFOOT->minify();
?>
</body>
</html>
