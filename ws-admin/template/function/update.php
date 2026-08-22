<?php
require_once __DIR__ . '/../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../config/db.config.php';
$data = new Databases;
if(isset($_POST["menustatusID"])){
if(!empty($_POST['menustatusID'])){
$whereStstus = array(
'menu_id' => mysqli_real_escape_string($data->con, $_POST['menustatusID'])
);
$menustQ = "SELECT * FROM main_menu WHERE menu_id='".$_POST['menustatusID']."' ORDER BY menu_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['menu_status'] == 'active'){
$status = 'inactive';
}else{
$status = 'active';
}
$update = array(
'menu_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('main_menu', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["submenustatusID"])){
if(!empty($_POST['submenustatusID'])){
$whereStstus = array(
'submenu_id' => mysqli_real_escape_string($data->con, $_POST['submenustatusID'])
);
$sellQ = "SELECT * FROM sub_menu WHERE submenu_id='".$_POST['submenustatusID']."'";
$sellQ_data = $data->con->query($sellQ);
foreach($sellQ_data as $sellRow)
{
if($sellRow['submenu_status'] == 'active'){
$status = 'inactive';
}else{
$status = 'active';
}
$update = array(
'submenu_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('sub_menu', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["themenustatusID"])){
if(!empty($_POST['themenustatusID'])){
$whereStstus = array(
'thememenu_id' => mysqli_real_escape_string($data->con, $_POST['themenustatusID'])
);
$menustQ = "SELECT * FROM  theme_main_menu  WHERE thememenu_id='".$_POST['themenustatusID']."' ORDER BY thememenu_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['thememenu_status'] == 'active'){
$status = 'inactive';
}else{
$status = 'active';
}
$update = array(
'thememenu_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('theme_main_menu', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["thesubmenustatusID"])){
if(!empty($_POST['thesubmenustatusID'])){
$whereStstus = array(
'themesub_id' => mysqli_real_escape_string($data->con, $_POST['thesubmenustatusID'])
);
$menustQ = "SELECT * FROM  theme_sub_menu  WHERE themesub_id='".$_POST['thesubmenustatusID']."' ORDER BY themesub_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['themesub_status'] == 'active'){
$status = 'inactive';
}else{
$status = 'active';
}
$update = array(
'themesub_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('theme_sub_menu', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["thesubtostatusID"])){
if(!empty($_POST['thesubtostatusID'])){
$whereStstus = array(
'themesubmenu_id' => mysqli_real_escape_string($data->con, $_POST['thesubtostatusID'])
);
$menustQ = "SELECT * FROM   theme_submenuto  WHERE themesubmenu_id='".$_POST['thesubtostatusID']."' ORDER BY themesubmenu_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['themesubmenu_status'] == 'active'){
$status = 'inactive';
}else{
$status = 'active';
}
$update = array(
'themesubmenu_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('theme_submenuto', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["projectstatusID"])){
if(!empty($_POST['projectstatusID'])){
$whereStstus = array(
'project_id' => mysqli_real_escape_string($data->con, $_POST['projectstatusID'])
);
$menustQ = "SELECT * FROM  projects WHERE project_id='".$_POST['projectstatusID']."' ORDER BY project_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['project_status'] == 'publish'){
$status = 'unpublish';
}else{
$status = 'publish';
}
$update = array(
'project_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('projects', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["blogstatusID"])){
if(!empty($_POST['blogstatusID'])){
$whereStstus = array(
'blogpost_id' => mysqli_real_escape_string($data->con, $_POST['blogstatusID'])
);
$menustQ = "SELECT * FROM   blog_post  WHERE blogpost_id='".$_POST['blogstatusID']."' ORDER BY blogpost_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['blogpost_status'] == 'publish'){
$status = 'unpublish';
}else{
$status = 'publish';
}
$update = array(
'blogpost_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('blog_post', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["proaboutID"])){
if(!empty($_POST['proaboutContent'])){
$whereStstus = array(
'product_range_id' => mysqli_real_escape_string($data->con, $_POST['proaboutID'])
);
$update = array(
'product_range_content' => mysqli_real_escape_string($data->con, $_POST['proaboutContent']),
'product_range_date'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->update('productrange_about', $update , $whereStstus))
{
$message = 'Update';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["productstatusID"])){
if(!empty($_POST['productstatusID'])){
$whereStstus = array(
'productrange_id' => mysqli_real_escape_string($data->con, $_POST['productstatusID'])
);
$menustQ = "SELECT * FROM   products_range  WHERE productrange_id='".$_POST['productstatusID']."' ORDER BY productrange_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['productrange_status'] == 'publish'){
$status = 'unpublish';
}else{
$status = 'publish';
}
$update = array(
'productrange_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('products_range', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["adminup_ID"])){
if(!empty($_POST['adminFullName'])){
$whereStstus = array(
'admin_log_id' => mysqli_real_escape_string($data->con, $_POST['adminup_ID'])
);
$update = array(
'admin_userlog_id'    => mysqli_real_escape_string($data->con, $_POST['adminID']),
'admin_log_name'      => mysqli_real_escape_string($data->con, $_POST['adminFullName']),
'admin_log_email'     => mysqli_real_escape_string($data->con, $_POST['adminEmail']),
'admin_log_phone'     => mysqli_real_escape_string($data->con, $_POST['adminPhoneNumber']),
'admin_recoery_email' => mysqli_real_escape_string($data->con, $_POST['adminreEmail']),
'admin_log_pin'       => mysqli_real_escape_string($data->con, $_POST['adminPin'])
);
if($data->update('admin_login_support', $update , $whereStstus))
{
$message = 'Update';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["adminpass_ID"])){
if(!empty($_POST['adminOldpassword'])){
$sql = "SELECT * FROM admin_login_support where admin_log_id='".$_POST["adminpass_ID"]."'";
$result = $data->con->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){
if (password_verify($_POST['adminOldpassword'], $row['admin_log_password'])) {
if((mysqli_real_escape_string($data->con, $_POST['adminNewpassword'])) == (mysqli_real_escape_string($data->con, $_POST['adminConfipassword']))){
if(strlen(mysqli_real_escape_string($data->con, $_POST['adminConfipassword'])) >= 6){
$newpassword = array(
'admin_log_password' => mysqli_real_escape_string($data->con, password_hash($_POST['adminConfipassword'], PASSWORD_DEFAULT))
);
$where_passsword = array(
'admin_log_id' => mysqli_real_escape_string($data->con, $_POST['adminpass_ID'])
);
if($data->update('admin_login_support', $newpassword , $where_passsword))
{
$message = 'Update';
}
}else{
$message = 'Minlength 6';
}
}else{
$message = 'Password not confirm';
}
}else{
$message = 'Old password not match';
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
if(isset($_POST["orderprocID"])){
if(!empty($_POST['orderprocContent'])){
$whereStstus = array(
'orderproccess_id' => mysqli_real_escape_string($data->con, $_POST['orderprocID'])
);
$update = array(
'orderproccess_content' => mysqli_real_escape_string($data->con, $_POST['orderprocContent']),
'orderproccess_date'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->update('order_proccess', $update , $whereStstus))
{
$message = 'Update';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["projectcaseID"])){
if(!empty($_POST['projectcaseContent'])){
$whereStstus = array(
'projcasestudies_id' => mysqli_real_escape_string($data->con, $_POST['projectcaseID'])
);
$update = array(
'projcasestudies_content' => mysqli_real_escape_string($data->con, $_POST['projectcaseContent']),
'projcasestudies_date'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->update('projects_casestudies', $update , $whereStstus))
{
$message = 'Update';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["casestatusID"])){
if(!empty($_POST['casestatusID'])){
$whereStstus = array(
'casestu_blog_id' => mysqli_real_escape_string($data->con, $_POST['casestatusID'])
);
$menustQ = "SELECT * FROM  casestudies_blog   WHERE casestu_blog_id='".$_POST['casestatusID']."' ORDER BY casestu_blog_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['casestu_blog_status'] == 'publish'){
$status = 'unpublish';
}else{
$status = 'publish';
}
$update = array(
'casestu_blog_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('casestudies_blog', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["contactstatusID"])){
if(!empty($_POST['contactstatusID'])){
$whereStstus = array(
'contactus_id' => mysqli_real_escape_string($data->con, $_POST['contactstatusID'])
);
$menustQ = "SELECT * FROM   contact_us  WHERE contactus_id='".$_POST['contactstatusID']."' ORDER BY contactus_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['contactus_status'] == 'readable'){
$status = 'unreadable';
}else{
$status = 'readable';
}
$update = array(
'contactus_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('contact_us', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["contactrep_ID"])){
if(!empty($_POST['contactrep_content'])){
$whereStstus = array(
'contactus_id' => mysqli_real_escape_string($data->con, $_POST['contactrep_ID'])
);
$update = array(
'contactus_replay'  => mysqli_real_escape_string($data->con, $_POST['contactrep_content'])
);
if($data->update('contact_us', $update , $whereStstus))
{
$message = 'Update';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["subscriberstatusID"])){
if(!empty($_POST['subscriberstatusID'])){
$whereStstus = array(
'subscriber_email_id' => mysqli_real_escape_string($data->con, $_POST['subscriberstatusID'])
);
$menustQ = "SELECT * FROM  subscriber_email  WHERE subscriber_email_id='".$_POST['subscriberstatusID']."' ORDER BY subscriber_email_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['subscriber_status'] == 'active'){
$status = 'inactive';
}else{
$status = 'active';
}
$update = array(
'subscriber_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('subscriber_email', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["getquotestatusID"])){
if(!empty($_POST['getquotestatusID'])){
$whereStstus = array(
'cust_quote_id' => mysqli_real_escape_string($data->con, $_POST['getquotestatusID'])
);
$menustQ = "SELECT * FROM   customer_quote  WHERE cust_quote_id='".$_POST['getquotestatusID']."' ORDER BY cust_quote_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['cust_quote_status'] == 'active'){
$status = 'inactive';
}else{
$status = 'active';
}
$update = array(
'cust_quote_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('customer_quote', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["logostatusID"])){
if(!empty($_POST['logostatusID'])){
$updateAll = array(
'logo_status' => mysqli_real_escape_string($data->con, 'inactive')
);
$whereActive = array(
'logo_status'   => mysqli_real_escape_string($data->con, 'active'),
'logo_position' => mysqli_real_escape_string($data->con, $_POST['logoPositionName'])
);
if($data->update('logo_upload', $updateAll, $whereActive))
{
$whereStstus = array(
'logo_id' => mysqli_real_escape_string($data->con, $_POST['logostatusID'])
);
$logoID = "SELECT * FROM logo_upload WHERE logo_id='".$_POST['logostatusID']."'";
$logoID_data = $data->con->query($logoID);
foreach($logoID_data as $logoRow)
{
if($logoRow['logo_status'] == 'active'){
$status = 'inactive';
}else{
$status = 'active';
}
$update = array(
'logo_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('logo_upload', $update , $whereStstus))
{
$message = $status;
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
if(isset($_POST["position"])){
if(!empty($_POST['position'])){
$position = $_POST['position'];
$i=1;
foreach($position as $k=>$v){
$update = array(
'position_order' => mysqli_real_escape_string($data->con, $i)
);
$whereAdmin = array(
'menu_id' => mysqli_real_escape_string($data->con, $v)
);
if($data->update('main_menu', $update , $whereAdmin))
{
$message = 'Success';
}
$i++;
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["positionsub"])){
if(!empty($_POST['positionsub'])){
$position = $_POST['positionsub'];
$i=1;
foreach($position as $k=>$v){
$update = array(
'menu_position_order' => mysqli_real_escape_string($data->con, $i)
);
$whereAdmin = array(
'submenu_id' => mysqli_real_escape_string($data->con, $v)
);
if($data->update('sub_menu', $update , $whereAdmin))
{
$message = 'Success';
}
$i++;
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["positionthmenu"])){
if(!empty($_POST['positionthmenu'])){
$position = $_POST['positionthmenu'];
$i=1;
foreach($position as $k=>$v){
$update = array(
'theme_position_order' => mysqli_real_escape_string($data->con, $i)
);
$whereAdmin = array(
'thememenu_id' => mysqli_real_escape_string($data->con, $v)
);
if($data->update('theme_main_menu', $update , $whereAdmin))
{
$message = 'Success';
}
$i++;
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["positionthsumenu"])){
if(!empty($_POST['positionthsumenu'])){
$position = $_POST['positionthsumenu'];
$i=1;
foreach($position as $k=>$v){
$update = array(
'thememenu_orderposition' => mysqli_real_escape_string($data->con, $i)
);
$whereAdmin = array(
'themesub_id' => mysqli_real_escape_string($data->con, $v)
);
if($data->update('theme_sub_menu', $update , $whereAdmin))
{
$message = 'Success';
}
$i++;
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["positionsubto"])){
if(!empty($_POST['positionsubto'])){
$position = $_POST['positionsubto'];
$i=1;
foreach($position as $k=>$v){
$update = array(
'themesubmenu_orderposition' => mysqli_real_escape_string($data->con, $i)
);
$whereAdmin = array(
'themesubmenu_id' => mysqli_real_escape_string($data->con, $v)
);
if($data->update('theme_submenuto', $update , $whereAdmin))
{
$message = 'Success';
}
$i++;
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["contentstatusID"])){
if(!empty($_POST['contentstatusID'])){
$whereStstus = array(
'menu_id' => mysqli_real_escape_string($data->con, $_POST['contentstatusID'])
);
$menustQ = "SELECT * FROM main_menu WHERE menu_id='".$_POST['contentstatusID']."' ORDER BY menu_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['menu_content_type'] == 'dynamic'){
$status = 'default';
}else{
$status = 'dynamic';
}
$update = array(
'menu_content_type' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('main_menu', $update , $whereStstus))
{
$message = 'Success';
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["themcontentstatusID"])){
if(!empty($_POST['themcontentstatusID'])){
$whereStstus = array(
'thememenu_id' => mysqli_real_escape_string($data->con, $_POST['themcontentstatusID'])
);
$menustQ = "SELECT * FROM theme_main_menu WHERE thememenu_id='".$_POST['themcontentstatusID']."' ORDER BY thememenu_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['thememenu_content_type'] == 'dynamic'){
$status = 'default';
}else{
$status = 'dynamic';
}
$update = array(
'thememenu_content_type' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('theme_main_menu', $update , $whereStstus))
{
$message = 'Success';
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["headingID"])){
if(!empty($_POST['headingContent'])){
$whereStstus = array(
'theme_heading_id' => mysqli_real_escape_string($data->con, $_POST['headingID'])
);
$update = array(
'theme_heading_content' => mysqli_real_escape_string($data->con, $_POST['headingContent']),
'theme_heading_date'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->update('theme_heading', $update , $whereStstus))
{
$message = 'Update';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["footerID"])){
if(!empty($_POST['footerContent'])){
$whereStstus = array(
'theme_footer_id' => mysqli_real_escape_string($data->con, $_POST['footerID'])
);
$update = array(
'theme_footer_content' => mysqli_real_escape_string($data->con, $_POST['footerContent']),
'theme_footer_date'     => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->update('theme_footer', $update , $whereStstus))
{
$message = 'Update';
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["pagecontentTitle"])){
if(!empty($_POST['pageContent'])){
$insert_data = array(
'thememenu_id'             => mysqli_real_escape_string($data->con, $_POST['pageContentID']),
'page_content_title'       => mysqli_real_escape_string($data->con, $_POST['pagecontentTitle']),
'page_content_description' => mysqli_real_escape_string($data->con, $_POST['pageContent']),
'page_content_date'        => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
$where = array(
'thememenu_id'      => mysqli_real_escape_string($data->con, $_POST['pageContentID'])
);
$result = $data->select_where('page_content', $where);
if(count($result) > 0){
if(!empty($_POST['pageContentUP'])){
$update = array(
'page_content_id' => mysqli_real_escape_string($data->con, $_POST['pageContentUP'])
);
if($data->update('page_content', $insert_data, $update))
{
$message = 'Update';
}
}
}else{
if($data->insert('page_content', $insert_data))
{
$message = 'Success';
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["bannerid"])){
if(!empty($_POST['bannerContent'])){
$update = array(
'bannerslider_content' => mysqli_real_escape_string($data->con, $_POST['bannerContent'])
);
$whereID = array(
'bannerslider_id' => mysqli_real_escape_string($data->con, $_POST['bannerid'])
);
if($data->update('banner_slider', $update , $whereID))
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
if(isset($_POST["positionc"])){
if(!empty($_POST['positionc'])){
$position = $_POST['positionc'];
$i=1;
foreach($position as $k=>$v){
$update = array(
'packages_category_possition' => mysqli_real_escape_string($data->con, $i)
);
$whereAdmin = array(
'packages_category_id' => mysqli_real_escape_string($data->con, $v)
);
if($data->update('packages_category', $update , $whereAdmin))
{
$message = 'Success';
}
$i++;
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["packagestatusID"])){
if(!empty($_POST['packagestatusID'])){
$whereStstus = array(
'event_pakage_id' => mysqli_real_escape_string($data->con, $_POST['packagestatusID'])
);
$menustQ = "SELECT * FROM   event_pakage  WHERE event_pakage_id='".$_POST['packagestatusID']."' ORDER BY event_pakage_id LIMIT 1";
$menustQ_data = $data->con->query($menustQ);
foreach($menustQ_data as $mstRow)
{
if($mstRow['event_pakage_status'] == 'publish'){
$status = 'unpublish';
}else{
$status = 'publish';
}
$update = array(
'event_pakage_status' => mysqli_real_escape_string($data->con, $status)
);
if($data->update('event_pakage', $update , $whereStstus))
{
$message = $status;
}
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
if(isset($_POST["positionalbum"])){
if(!empty($_POST['positionalbum'])){
$position = $_POST['positionalbum'];
$i=1;
foreach($position as $k=>$v){
$update = array(
'album_images_possition' => mysqli_real_escape_string($data->con, $i)
);
$whereAdmin = array(
'album_images_id' => mysqli_real_escape_string($data->con, $v)
);
if($data->update('album_images', $update , $whereAdmin))
{
$message = 'Success';
}
$i++;
}
}else{
$message = 'This value is required';
}
echo $message;
$data->con->close();
exit();
}
?>
