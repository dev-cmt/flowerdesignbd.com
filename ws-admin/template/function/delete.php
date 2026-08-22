<?php
require_once __DIR__ . '/../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../config/db.config.php';
$data = new Databases;
if(isset($_POST["menudelID"])){
if(!empty($_POST['menudelID'])){
$whereProID = array(
'menu_id' => mysqli_real_escape_string($data->con, $_POST['menudelID'])
);
if($data->delete('main_menu', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["submenudelID"])){
if(!empty($_POST['submenudelID'])){
$whereProID = array(
'submenu_id' => mysqli_real_escape_string($data->con, $_POST['submenudelID'])
);
if($data->delete('sub_menu', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["themenudelID"])){
if(!empty($_POST['themenudelID'])){
$whereProID = array(
'thememenu_id' => mysqli_real_escape_string($data->con, $_POST['themenudelID'])
);
if($data->delete('theme_main_menu', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["thesubmenudelID"])){
if(!empty($_POST['thesubmenudelID'])){
$whereProID = array(
'themesub_id' => mysqli_real_escape_string($data->con, $_POST['thesubmenudelID'])
);
if($data->delete('theme_sub_menu', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["thesubtodelID"])){
if(!empty($_POST['thesubtodelID'])){
$whereProID = array(
'themesubmenu_id' => mysqli_real_escape_string($data->con, $_POST['thesubtodelID'])
);
if($data->delete('theme_submenuto', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["projectdelID"])){
if(!empty($_POST['projectdelID'])){
$whereProID = array(
'project_id' => mysqli_real_escape_string($data->con, $_POST['projectdelID'])
);
if($data->delete('projects', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["blogdelID"])){
if(!empty($_POST['blogdelID'])){
$whereProID = array(
'blogpost_id' => mysqli_real_escape_string($data->con, $_POST['blogdelID'])
);
if($data->delete('blog_post', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["productdelID"])){
if(!empty($_POST['productdelID'])){
$whereProID = array(
'productrange_id' => mysqli_real_escape_string($data->con, $_POST['productdelID'])
);
if($data->delete('products_range', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["casedelID"])){
if(!empty($_POST['casedelID'])){
$whereProID = array(
'casestu_blog_id' => mysqli_real_escape_string($data->con, $_POST['casedelID'])
);
if($data->delete('casestudies_blog', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["contactdelID"])){
if(!empty($_POST['contactdelID'])){
$whereProID = array(
'contactus_id' => mysqli_real_escape_string($data->con, $_POST['contactdelID'])
);
if($data->delete('contact_us', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["subscriberdelID"])){
if(!empty($_POST['subscriberdelID'])){
$whereProID = array(
'subscriber_email_id' => mysqli_real_escape_string($data->con, $_POST['subscriberdelID'])
);
if($data->delete('subscriber_email', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["getquotedelID"])){
if(!empty($_POST['getquotedelID'])){
$whereProID = array(
'cust_quote_id' => mysqli_real_escape_string($data->con, $_POST['getquotedelID'])
);
if($data->delete('customer_quote', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["logodelID"])){
if(!empty($_POST['logodelID'])){
$checkQ = "SELECT * FROM  logo_upload  where  logo_id='".$_POST['logodelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'logo_id' => mysqli_real_escape_string($data->con, $_POST['logodelID'])
);
if($data->delete('logo_upload', $whereproID))
{
$filePath = '../../../uploads/logo/'.$rowImage['logo_image'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else {
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["bannerdelID"])){
if(!empty($_POST['bannerdelID'])){
$checkQ = "SELECT * FROM   banner_slider   where  bannerslider_id='".$_POST['bannerdelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'bannerslider_id' => mysqli_real_escape_string($data->con, $_POST['bannerdelID'])
);
if($data->delete('banner_slider', $whereproID))
{
$filePath = '../../../uploads/banner/'.$rowImage['bannerslider_image'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else {
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["blogimagedelID"])){
if(!empty($_POST['blogimagedelID'])){
$checkQ = "SELECT * FROM  blog_images  where blogimages_id='".$_POST['blogimagedelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'blogimages_id' => mysqli_real_escape_string($data->con, $_POST['blogimagedelID'])
);
if($data->delete('blog_images', $whereproID))
{
$filePath = '../../../uploads/blog/'.$rowImage['blogimages_name'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else {
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["productimagedelID"])){
if(!empty($_POST['productimagedelID'])){
$checkQ = "SELECT * FROM  product_images  where productimages_id='".$_POST['productimagedelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'productimages_id' => mysqli_real_escape_string($data->con, $_POST['productimagedelID'])
);
if($data->delete('product_images', $whereproID))
{
$filePath = '../../../uploads/product/'.$rowImage['productimages_name'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else {
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["clientlogodelID"])){
if(!empty($_POST['clientlogodelID'])){
$checkQ = "SELECT * FROM  client_logo  where clientlogo_id='".$_POST['clientlogodelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'clientlogo_id' => mysqli_real_escape_string($data->con, $_POST['clientlogodelID'])
);
if($data->delete('client_logo', $whereproID))
{
$filePath = '../../../uploads/client/logo/'.$rowImage['clientlogo_name'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else {
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["companydelID"])){
if(!empty($_POST['companydelID'])){
$whereProID = array(
'company_profile_id' => mysqli_real_escape_string($data->con, $_POST['companydelID'])
);
if($data->delete('company_profile', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["defaultbannerdelID"])){
if(!empty($_POST['defaultbannerdelID'])){
$checkQ = "SELECT * FROM  theme_default_gallery  where theme_defgallery_id='".$_POST['defaultbannerdelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'theme_defgallery_id' => mysqli_real_escape_string($data->con, $_POST['defaultbannerdelID'])
);
if($data->delete('theme_default_gallery', $whereproID))
{
$filePath = '../../../uploads/content/'.$rowImage['theme_defgallery_image'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else{
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["clientdelID"])){
if(!empty($_POST['clientdelID'])){
$checkQ = "SELECT * FROM  client_logo  where clientlogo_id='".$_POST['clientdelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'clientlogo_id' => mysqli_real_escape_string($data->con, $_POST['clientdelID'])
);
if($data->delete('client_logo', $whereproID))
{
$filePath = '../../../uploads/client/logo/'.$rowImage['clientlogo_images'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else{
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["eventimagedelID"])){
if(!empty($_POST['eventimagedelID'])){
$checkQ = "SELECT * FROM  eventpakage_images  where eventpakage_images_id='".$_POST['eventimagedelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'eventpakage_images_id' => mysqli_real_escape_string($data->con, $_POST['eventimagedelID'])
);
if($data->delete('eventpakage_images', $whereproID))
{
$filePath = '../../../uploads/event/'.$rowImage['eventpakage_images_name'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else{
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["albumdelID"])){
if(!empty($_POST['albumdelID'])){
$whereProID = array(
'packages_category_id' => mysqli_real_escape_string($data->con, $_POST['albumdelID'])
);
if($data->delete('packages_category', $whereProID))
{
$message = 'Success';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["albumimgdelID"])){
if(!empty($_POST['albumimgdelID'])){
$checkQ = "SELECT * FROM  album_images  where album_images_id='".$_POST['albumimgdelID']."'";
$checkQ_data = $data->con->query($checkQ);
if ($checkQ_data->num_rows > 0) {
while($rowImage = $checkQ_data->fetch_assoc()){
$whereproID = array(
'album_images_id' => mysqli_real_escape_string($data->con, $_POST['albumimgdelID'])
);
if($data->delete('album_images', $whereproID))
{
$filePath = '../../../uploads/album/'.$rowImage['album_images_name'];
if (file_exists($filePath))
{
unlink($filePath);
$message = 'Success';
}else{
$message = 'File name require';
}
}
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["packagedelID"])){
if(!empty($_POST['packagedelID'])){
$whereProID = array(
'event_pakage_id' => mysqli_real_escape_string($data->con, $_POST['packagedelID'])
);
if($data->delete('event_pakage', $whereProID))
{
$message = 'Remove';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
?>
