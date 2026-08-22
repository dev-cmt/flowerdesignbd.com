<?php
if(!empty($readmoreID)){
$ID = $readmoreID;
}else {
$ID = '';
}
?>
<div id="root"></div>
<script type="text/javascript">
let pageUrl = '/template/views/event.album';
let getID   = '?getid=<?php echo $ID; ?>';
var objXMLHttpRequest = new window.XMLHttpRequest();
method = 'GET';
var url = new URL (baseUrl + pageUrl + baseUrlformat + getID);
objXMLHttpRequest.onreadystatechange = function() {
if(objXMLHttpRequest.readyState === 4) {
if(objXMLHttpRequest.status === 200) {
objXMLHttpRequest.onload = function () {
document.getElementById("root").innerHTML=objXMLHttpRequest.responseText;
};
}else{
reject('Error Code: ' +  objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
}
}
}
objXMLHttpRequest.open(method, encodeURI(url), false);
objXMLHttpRequest.send();
</script>
<script>
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.11';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
