<?php $data = new Databases; ?>
<div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="border-bottom-dashed border-bottom margin-bottom-10">
<div class="row g-3">
<div class="col-xl-12">
<div class="search-box">
<input type="text" class="form-control search" placeholder="Search ...">
<i class="ri-search-line search-icon"></i>
</div>
</div>
</div>
</div>
<div class="table-responsive">
<div id="root"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
let loadUrl       = '/template/content/subscriber/subscriber.content';
$('#root').html(make_skeleton());
setTimeout(function(){
load_content(1);
},1000);
function make_skeleton()
{
var output = '';
for(var count = 0; count < 1; count++)
{
output += '<div class="card-body d-flex-padding">';
output += '<div class="d-flex align-items-center">';
output += '<strong>Loading...</strong>';
output += '<div class="spinner-border spinner-border-sm ms-auto" role="status" aria-hidden="true">';
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
$('.table').css('opacity','10');
$('#root').html(data);
}, 1000);
}
});
}
$('.search').keyup(function(){
$('.table').css('opacity','0.1');
var query = $('.search').val();
load_data(1, query);
});
$(document).on('click', '.page-link', function(){
$('.table').css('opacity','0.1');
var page = $(this).data('page_number');
load_data(page);
});
}
});
</script>
