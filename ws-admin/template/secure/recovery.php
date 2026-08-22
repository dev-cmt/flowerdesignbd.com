<div id="root"></div>
<script type="text/javascript">
let functionUrl   = '/template/function/user.recovery';
let serviceUrl    = '/template/content/secure/recovery';
if(Function.prototype.bind){
Function.prototype.bind=function(oThis){
if (typeof this !== "function") throw new TypeError("");
var aArgs=Array.prototype.slice.call(arguments,1),fToBind=this,fNOP=function(){},fBound=function(){return fToBind.apply(this instanceof fNOP && oThis? this: oThis,aArgs.concat(Array.prototype.slice.call(arguments)));};
fNOP.prototype=this.prototype;
fBound.prototype=new fNOP();
return fBound;
};
var objXMLHttpRequest = new window.XMLHttpRequest();
var url = new URL (baseUrl + serviceUrl + baseUrlformat);
objXMLHttpRequest.onreadystatechange = function() {
if(objXMLHttpRequest.readyState === 4) {
if(objXMLHttpRequest.status === 200) {
document.getElementById("root").innerHTML=objXMLHttpRequest.responseText;
}else {
reject('Error Code: ' +  objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
}
}
}
objXMLHttpRequest.open("GET", encodeURI(url), false);
objXMLHttpRequest.send();
}
</script>
