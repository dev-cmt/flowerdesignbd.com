<?php
require_once __DIR__ . '/../../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../../config/db.config.php';
$data   = new Databases;
$resMessage = 'err';
$target_dir = "../../../../uploads/banner/";
$fileNames = array_filter($_FILES['file']['name']);
foreach($_FILES['file']['name'] as $key=>$val){
$file = $_FILES['file']['tmp_name'][$key];
$file_name = $_FILES['file']['name'][$key];
$file_name_array = explode(".", $file_name);
$extension = end($file_name_array);
$new_image_name = rand() . '.' . $extension;
$target_file = $target_dir . $new_image_name;
$imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$allowd_file_ext = array("jpg", "jpeg", "png");
if (!file_exists($_FILES["file"]["tmp_name"][$key])) {
$resMessage = 'err';
} else if (!in_array($imageExt, $allowd_file_ext)) {
$resMessage = 'err';
} else if ($_FILES["file"]["size"][$key] > 10097152) {
$resMessage = 'err';
} else if (file_exists($target_file)) {
$resMessage = 'err';
} else {
if (move_uploaded_file($_FILES["file"]["tmp_name"][$key], $target_file)){
$insert_data = array(
'bannerslider_image'   => mysqli_real_escape_string($data->con, $new_image_name)
);
if($data->insert('banner_slider', $insert_data))
{
$resMessage = 'ok';
}
}else{
$resMessage = 'err';
}
}
}
echo $resMessage;
?>
