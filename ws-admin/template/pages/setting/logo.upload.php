<div id="root"></div>
<script>
$(document).ready(function(){
let loadUrl       = '/template/content/setting/logo.content';
$('#root').html(make_skeleton());
setTimeout(function(){
load_content(1);
},1000);
function make_skeleton()
{
var output = '';
for(var count = 0; count < 1; count++)
{
output += '<div class="page-content">';
output += '<div class="container-fluid">';
output += '<div class="row">';
output += '<div class="col-lg-12">';
output += '<div data-aos="fade-in"  class="card">';
output += '<div class="card-body">';
output += '<div class="d-flex align-items-center">';
output += '<strong>Loading...</strong>';
output += '<div class="spinner-border spinner-border-sm ms-auto" role="status" aria-hidden="true">';
output += '</div>';
output += '</div>';
output += '</div>';
output += '</div>';
output += '</div>';
output += '</div>';
output += '</div>';
output += '</div>';
}
return output;
}
function load_content(limit)
{
load_data(1);
function load_data(page, query = '')
{
$.ajax({
url: baseUrl + loadUrl + baseUrlformat,
method:"POST",
data:{page:page, query:query},
success:function(data)
{
setTimeout(function(){
$('#root').html(data);
}, 1000);
}
});
}
}
});
</script>
