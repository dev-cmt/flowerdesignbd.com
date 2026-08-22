<?php
if(isset($_POST["form_email"])){
if(!empty($_POST['form_subject'])){
$where = array(
'contactus_email'  => mysqli_real_escape_string($data->con, $_POST['form_email']),
'contactus_status' => mysqli_real_escape_string($data->con, 'inactive')
);
$result = $data->select_where('contact_us', $where);
if(count($result) > 0){
$message = 'Responsive pending';
}else{
$insert_data = array(
'contactus_fullname' => mysqli_real_escape_string($data->con, $_POST['form_name']),
'contactus_email'    => mysqli_real_escape_string($data->con, $_POST['form_email']),
'contactus_subject'  => mysqli_real_escape_string($data->con, $_POST['form_subject']),
'contactus_content'  => mysqli_real_escape_string($data->con, $_POST['form_message']),
'contactus_date'     => mysqli_real_escape_string($data->con, date('Y/m/d'))
);
if($data->insert('contact_us', $insert_data))
{
$message = 'Success';
}
}
}else{
$message = 'Value is required';
}
echo $message;
$data->con->close();
exit();
}
?>
