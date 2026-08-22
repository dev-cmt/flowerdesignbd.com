<?php
include '../../config/db.config.php';
$data   = new Databases;
$upload = 'err';
$data = new Databases;
if(isset($_POST['userAhutornidpassport'])){
$sqlCheck = "SELECT * FROM user_account_authorized  WHERE account_authorized_phone='".$_POST['userAthurPhone']."' and account_authorized_nidpass='".$_POST['userAhutornidpassport']."'";
$result_data = $data->con->query($sqlCheck);
if ($result_data->num_rows > 0) {
$upload = 'err';
}else{
if(is_array($_FILES)) {
$uploadedFile = $_FILES['file']['tmp_name'];
$sourceProperties = getimagesize($uploadedFile);
$newFileName = time().rand(100,999);
$dirPath = "../../ws-admin/uploads/member/";
$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$imageType = $sourceProperties[2];
switch ($imageType) {
case IMAGETYPE_PNG:
$imageSrc = imagecreatefrompng($uploadedFile);
$tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
imagepng($tmp,$dirPath. $newFileName. ".". $ext);
break;
case IMAGETYPE_JPEG:
$imageSrc = imagecreatefromjpeg($uploadedFile);
$tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
imagejpeg($tmp,$dirPath. $newFileName. ".". $ext);
break;
case IMAGETYPE_GIF:
$imageSrc = imagecreatefromgif($uploadedFile);
$tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
imagegif($tmp,$dirPath. $newFileName. ".". $ext);
break;
default:
exit;
break;
}
$insert_data = array(
'id' => mysqli_real_escape_string($data->con, $_POST['userAhutorID']),
'account_authorized_type'     => mysqli_real_escape_string($data->con, $_POST['userIdentityType']),
'account_authorized_phone'    => mysqli_real_escape_string($data->con, $_POST['userAthurPhone']),
'account_authorized_nidpass'  => mysqli_real_escape_string($data->con, $_POST['userAhutornidpassport']),
'account_authorized_govimage' => mysqli_real_escape_string($data->con, $newFileName.".".$ext),
'account_authorized_status'   => mysqli_real_escape_string($data->con, 'inactive'),
'account_authorized_date'     => mysqli_real_escape_string($data->con, date('Y/m/d')),
'account_authorized_mdate'    => mysqli_real_escape_string($data->con, date('Y/m'))
);
if($data->insert('user_account_authorized', $insert_data))
{
$upload = 'ok';
}
}
}
}
function imageResize($imageSrc,$imageWidth,$imageHeight) {
$newImageWidth =500;
$newImageHeight =700;
$newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
return $newImageLayer;
}
echo $upload;
?>
