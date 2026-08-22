<?php
require_once __DIR__ . '/../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../config/db.config.php';
$data = new Databases;
if(isset($_POST["menuName"])){
if(!empty($_POST['menuPermalink'])){
$insert_data = array(
'menu_name'         => mysqli_real_escape_string($data->con, $_POST['menuName']),
'menu_icon'         => mysqli_real_escape_string($data->con, $_POST['menuIcon']),
'menu_permalink'    => mysqli_real_escape_string($data->con, $_POST['menuPermalink']),
'menu_content'      => mysqli_real_escape_string($data->con, $_POST['menuContent']),
'menu_content_type' => mysqli_real_escape_string($data->con, $_POST['contentType']),
'menu_status'       => mysqli_real_escape_string($data->con, 'inactive'),
'menu_roles'        => mysqli_real_escape_string($data->con, $_POST['menuroles']),
'menu_createdb'     => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['menu_idUP'])){
$update = array(
'menu_id' => mysqli_real_escape_string($data->con, $_POST['menu_idUP'])
);
if($data->update('main_menu', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'menu_name'      => mysqli_real_escape_string($data->con, $_POST['menuName'])
);
$result = $data->select_where('main_menu', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('main_menu', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["submenuName"])){
if(!empty($_POST['submenuPermalink'])){
$insert_data = array(
'menu_id'           => mysqli_real_escape_string($data->con, $_POST['menusubID']),
'submenu_name'      => mysqli_real_escape_string($data->con, $_POST['submenuName']),
'submenu_icon'      => mysqli_real_escape_string($data->con, $_POST['submenuIcon']),
'submenu_parmalink' => mysqli_real_escape_string($data->con, $_POST['submenuPermalink']),
'submenu_content'   => mysqli_real_escape_string($data->con, $_POST['submenuContent']),
'submenu_status'    => mysqli_real_escape_string($data->con, 'inactive'),
'submenu_createdb'  => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['menusub_update'])){
$update = array(
'submenu_id' => mysqli_real_escape_string($data->con, $_POST['menusub_update'])
);
if($data->update('sub_menu', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'submenu_name'  => mysqli_real_escape_string($data->con, $_POST['submenuName']),
'menu_id'       => mysqli_real_escape_string($data->con, $_POST['menusubID'])
);
$result = $data->select_where('sub_menu', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('sub_menu', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["thememenuName"])){
if(!empty($_POST['thememenuPermalink'])){
$insert_data = array(
'thememenu_name'         => mysqli_real_escape_string($data->con, $_POST['thememenuName']),
'thememenu_icon'         => mysqli_real_escape_string($data->con, $_POST['thememenuIcon']),
'thememenu_parmalink'    => mysqli_real_escape_string($data->con, $_POST['thememenuPermalink']),
'thememenu_content'      => mysqli_real_escape_string($data->con, $_POST['thememenuContent']),
'thememenu_content_type' => mysqli_real_escape_string($data->con, $_POST['themecontentType']),
'thememenu_type'         => mysqli_real_escape_string($data->con, $_POST['themepositionType']),
'thememenu_status'       => mysqli_real_escape_string($data->con, 'inactive'),
'thememenu_roles'        => mysqli_real_escape_string($data->con, $_POST['thememenuroles']),
'thememenu_date'         => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['thememenu_idUP'])){
$update = array(
'thememenu_id' => mysqli_real_escape_string($data->con, $_POST['thememenu_idUP'])
);
if($data->update('theme_main_menu', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'thememenu_name'  => mysqli_real_escape_string($data->con, $_POST['thememenuName']),
'thememenu_type'  => mysqli_real_escape_string($data->con, $_POST['themepositionType'])
);
$result = $data->select_where('theme_main_menu', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('theme_main_menu', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["thesubmenuName"])){
if(!empty($_POST['thesubmenuPermalink'])){
$insert_data = array(
'thememenu_id'       => mysqli_real_escape_string($data->con, $_POST['themenusubID']),
'themesub_name'      => mysqli_real_escape_string($data->con, $_POST['thesubmenuName']),
'themesub_icon'      => mysqli_real_escape_string($data->con, $_POST['thesubmenuIcon']),
'themesub_parmalink' => mysqli_real_escape_string($data->con, $_POST['thesubmenuPermalink']),
'themesub_content'   => mysqli_real_escape_string($data->con, $_POST['thesubmenuContent']),
'themesub_status'    => mysqli_real_escape_string($data->con, 'inactive'),
'themesub_roles'     => mysqli_real_escape_string($data->con, $_POST['thesubmenuroles']),
'themesub_type'      => mysqli_real_escape_string($data->con, $_POST['themenusutype']),
'themesub_date'      => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['themenusub_update'])){
$update = array(
'themesub_id' => mysqli_real_escape_string($data->con, $_POST['themenusub_update'])
);
if($data->update('theme_sub_menu', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'themesub_name'  => mysqli_real_escape_string($data->con, $_POST['thesubmenuName']),
'themesub_type'  => mysqli_real_escape_string($data->con, $_POST['themenusutype'])
);
$result = $data->select_where('theme_sub_menu', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('theme_sub_menu', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["thesubtoName"])){
if(!empty($_POST['thesubtoPermalink'])){
$insert_data = array(
'themesub_id'            => mysqli_real_escape_string($data->con, $_POST['thesubtoID']),
'themesubmenu_name'      => mysqli_real_escape_string($data->con, $_POST['thesubtoName']),
'themesubmenu_icon'      => mysqli_real_escape_string($data->con, $_POST['thesubtoIcon']),
'themesubmenu_parmalink' => mysqli_real_escape_string($data->con, $_POST['thesubtoPermalink']),
'themesubmenu_content'   => mysqli_real_escape_string($data->con, $_POST['thesubtoContent']),
'themesubmenu_status'    => mysqli_real_escape_string($data->con, 'inactive'),
'themesubmenu_roles'     => mysqli_real_escape_string($data->con, $_POST['thesubtoroles']),
'themesubmenu_type'      => mysqli_real_escape_string($data->con, $_POST['thesubtotype']),
'themesubmenu_date'      => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['thesubto_update'])){
$update = array(
'themesubmenu_id' => mysqli_real_escape_string($data->con, $_POST['thesubto_update'])
);
if($data->update('theme_submenuto', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'themesubmenu_name'  => mysqli_real_escape_string($data->con, $_POST['thesubtoName']),
'themesubmenu_type'  => mysqli_real_escape_string($data->con, $_POST['thesubtotype'])
);
$result = $data->select_where('theme_submenuto', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('theme_submenuto', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["projectName"])){
if(!empty($_POST['projectContent'])){
$insert_data = array(
'project_name'     => mysqli_real_escape_string($data->con, $_POST['projectName']),
'project_content'  => mysqli_real_escape_string($data->con, $_POST['projectContent']),
'project_status'   => mysqli_real_escape_string($data->con, $_POST['projectStatus']),
'project_date'     => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['projectID'])){
$update = array(
'project_id' => mysqli_real_escape_string($data->con, $_POST['projectID'])
);
if($data->update('projects', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'project_name'  => mysqli_real_escape_string($data->con, $_POST['projectName'])
);
$result = $data->select_where('projects', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('projects', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["blogName"])){
if(!empty($_POST['blogContent'])){
$insert_data = array(
'blogpost_name'     => mysqli_real_escape_string($data->con, $_POST['blogName']),
'blogpost_content'  => mysqli_real_escape_string($data->con, $_POST['blogContent']),
'blogpost_status'   => mysqli_real_escape_string($data->con, $_POST['blogStatus']),
'blogpost_date'     => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['blogID'])){
$update = array(
'blogpost_id' => mysqli_real_escape_string($data->con, $_POST['blogID'])
);
if($data->update('blog_post', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'blogpost_name'      => mysqli_real_escape_string($data->con, $_POST['blogName']),
'blogpost_category'  => mysqli_real_escape_string($data->con, $_POST['blogCategory'])
);
$result = $data->select_where('blog_post', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('blog_post', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["productName"])){
if(!empty($_POST['productContent'])){
$insert_data = array(
'productrange_name'    => mysqli_real_escape_string($data->con, $_POST['productName']),
'productrange_content' => mysqli_real_escape_string($data->con, $_POST['productContent']),
'productrange_status'  => mysqli_real_escape_string($data->con, $_POST['productStatus']),
'productrange_date'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['productID'])){
$update = array(
'productrange_id' => mysqli_real_escape_string($data->con, $_POST['productID'])
);
if($data->update('products_range', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'productrange_name'      => mysqli_real_escape_string($data->con, $_POST['productName'])
);
$result = $data->select_where('products_range', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('products_range', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["procaseName"])){
if(!empty($_POST['procaseContent'])){
$insert_data = array(
'casestu_blog_name'    => mysqli_real_escape_string($data->con, $_POST['procaseName']),
'casestu_blog_content' => mysqli_real_escape_string($data->con, $_POST['procaseContent']),
'casestu_blog_status'  => mysqli_real_escape_string($data->con, $_POST['procaseStatus']),
'casestu_blog_date'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['procaseup_id'])){
$update = array(
'casestu_blog_id' => mysqli_real_escape_string($data->con, $_POST['procaseup_id'])
);
if($data->update('casestudies_blog', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'casestu_blog_name'      => mysqli_real_escape_string($data->con, $_POST['procaseName'])
);
$result = $data->select_where('casestudies_blog', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('casestudies_blog', $insert_data))
{
$message = 'Success';
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

if(isset($_POST["companyproTag"])){
if(!empty($_POST['companyproContent'])){
$insert_data = array(
'company_profile_tag'     => mysqli_real_escape_string($data->con, $_POST['companyproTag']),
'company_profile_content' => mysqli_real_escape_string($data->con, $_POST['companyproContent']),
'company_profile_date'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['companypro_id'])){
$update = array(
'company_profile_id' => mysqli_real_escape_string($data->con, $_POST['companypro_id'])
);
if($data->update('company_profile', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'company_profile_tag'      => mysqli_real_escape_string($data->con, $_POST['companyproTag'])
);
$result = $data->select_where('company_profile', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('company_profile', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["socialName"])){
if(!empty($_POST['socialUrl'])){
$insert_data = array(
'social_media_name'   => mysqli_real_escape_string($data->con, $_POST['socialName']),
'social_media_link'   => mysqli_real_escape_string($data->con, $_POST['socialUrl']),
'social_media_icon'   => mysqli_real_escape_string($data->con, $_POST['sociaIcon']),
'social_media_status' => mysqli_real_escape_string($data->con, $_POST['socialStatus'])
);
if(!empty($_POST['socialupID'])){
$update = array(
'social_media_id' => mysqli_real_escape_string($data->con, $_POST['socialupID'])
);
if($data->update('social_media', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'social_media_name'  => mysqli_real_escape_string($data->con, $_POST['socialName'])
);
$result = $data->select_where('social_media', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('social_media', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["titlevideoName"])){
if(!empty($_POST['fbyoutubeUrl'])){
$insert_data = array(
'video_content_title'   => mysqli_real_escape_string($data->con, $_POST['titlevideoName']),
'video_content_content' => mysqli_real_escape_string($data->con, $_POST['contentvideoDescription']),
'video_content_url'     => mysqli_real_escape_string($data->con, $_POST['fbyoutubeUrl']),
'video_content_type'    => mysqli_real_escape_string($data->con, $_POST['videoStatustype']),
'video_content_status'  => mysqli_real_escape_string($data->con, $_POST['videoStatus']),
'video_content_date'    => mysqli_real_escape_string($data->con, date('Y-m-d'))
);
if(!empty($_POST['videfbupdateID'])){
$update = array(
'video_content_id' => mysqli_real_escape_string($data->con, $_POST['videfbupdateID'])
);
if($data->update('video_content', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'video_content_url'  => mysqli_real_escape_string($data->con, $_POST['fbyoutubeUrl'])
);
$result = $data->select_where('video_content', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('video_content', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["eventpakageName"])){
if(!empty($_POST['eventpakageName'])){
$insert_data = array(
'event_pakage_name'     => mysqli_real_escape_string($data->con, $_POST['eventpakageName']),
'event_pakage_content'  => mysqli_real_escape_string($data->con, $_POST['eventpakageNameContent']),
'event_pakage_status'   => mysqli_real_escape_string($data->con, $_POST['eventpakageNameStatus']),
'event_pakage_date'     => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['eventpakID'])){
$update = array(
'event_pakage_id' => mysqli_real_escape_string($data->con, $_POST['eventpakID'])
);
if($data->update('event_pakage', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'event_pakage_name'      => mysqli_real_escape_string($data->con, $_POST['eventpakageName']),
);
$result = $data->select_where('event_pakage', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('event_pakage', $insert_data))
{
$message = 'Success';
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
if(isset($_POST["eventalbumName"])){
if(!empty($_POST['eventalbumName'])){
$insert_data = array(
'event_pakage_id '          => mysqli_real_escape_string($data->con, $_POST['albumeventID']),
'packages_album_name'       => mysqli_real_escape_string($data->con, $_POST['eventalbumName']),
'packages_category_date'    => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if(!empty($_POST['eventalbumID'])){
$update = array(
'packages_category_id' => mysqli_real_escape_string($data->con, $_POST['eventalbumID'])
);
if($data->update('packages_category', $insert_data, $update))
{
$message = 'Update';
}
}else{
$where = array(
'packages_album_name' => mysqli_real_escape_string($data->con, $_POST['eventalbumName'])
);
$result = $data->select_where('packages_category', $where);
if(count($result) > 0){
$message = 'Name Duplicate';
}else{
if($data->insert('packages_category', $insert_data))
{
$message = 'Success';
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
?>
