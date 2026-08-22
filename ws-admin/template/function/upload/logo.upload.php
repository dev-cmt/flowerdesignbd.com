<?php
require_once __DIR__ . '/../../../../config/url/pathUrl.url.php';
require_once __DIR__ . '/../../../../config/db.config.php';
$data   = new Databases;
$resMessage = 'err';
// Set image placement folder
$target_dir = "../../../../uploads/logo/";
// Get file path
$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
$file_name_array = explode(".", $file_name);
$extension = end($file_name_array);
$new_image_name = rand() . '.' . $extension;
$target_file = $target_dir . $new_image_name;
// Get file extension
$imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Allowed file types
$allowd_file_ext = array("jpg", "jpeg", "png");
if (!file_exists($_FILES["file"]["tmp_name"])) {
$resMessage = 'err';
} else if (!in_array($imageExt, $allowd_file_ext)) {
$resMessage = 'err';
} else if ($_FILES["file"]["size"] > 2097152) {
$resMessage = 'err';
} else if (file_exists($target_file)) {
$resMessage = 'err';
} else {
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
$insert_data = array(
'logo_status'   => mysqli_real_escape_string($data->con, 'inactive'),
'logo_position' => mysqli_real_escape_string($data->con, $_GET['name']),
'logo_date'     => mysqli_real_escape_string($data->con, date('Y/m/d')),
'logo_image'    => mysqli_real_escape_string($data->con, $new_image_name)
);
if($data->insert('logo_upload', $insert_data))
{
$resMessage = 'ok';
}
}else{
$resMessage = 'err';
}
}
echo $resMessage;
?>
