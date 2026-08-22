<?php
$host = "Localhost";
$user = "akashcom_event";
$pass = "Rana@#01737";
$db   = "akashcom_event";
try {
$connect = new PDO ("mysql:host=$host;dbname=$db", "$user", "$pass", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4" , "SET SESSION time_zone = 'Asia/Dhaka'"));
$connect->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(PDOException $e) {
$e->getMessage();
}
class Databases{
public $con;
public $error;
public function __construct()
{
$servername = $GLOBALS['host'];
$username   = $GLOBALS["user"];
$password   = $GLOBALS["pass"];
$dbname     = $GLOBALS["db"];
$this->con = mysqli_connect($servername, $username, $password, $dbname);
$this->con->set_charset('utf8mb4');
}
public function select($table_name, $data)
{
$array = array();
$query = "SELECT * FROM ".$table_name."";
$result = mysqli_query($this->con, $query);
while($row = mysqli_fetch_assoc($result))
{
$array[] = $row;
}
return $array;
}
public function select_where($table_name, $where_condition)
{
$condition = '';
$array = array();
foreach($where_condition as $key => $value)
{
$condition .= $key . " = '".$value."' AND ";
}
$condition = substr($condition, 0, -5);
$query = "SELECT * FROM ".$table_name." WHERE " . $condition;
$result = mysqli_query($this->con, $query);
while($row = mysqli_fetch_array($result))
{
$array[] = $row;
}
return $array;
}
public function insert($table_name, $data)
{
$string = "INSERT INTO ".$table_name." (";
$string .= implode(",", array_keys($data)) . ') VALUES (';
$string .= "'" . implode("','", array_values($data)) . "')";
if(mysqli_query($this->con, $string))
{
return true;
}
else
{
echo mysqli_error($this->con);
}
}
public function insert_multiple($table_name, $data)
{
$string = "INSERT INTO ".$table_name." (";
$string .= implode(",", array_keys($data)) . ') VALUES (';
$string .= "'" . implode("','", array_values($data)) . "')";
if(mysqli_multi_query($this->con, $string))
{
return true;
}
else
{
mysqli_error($this->con);
}
}
public function update($table_name, $fields, $where_condition)
{
$query = '';
$condition = '';
foreach($fields as $key => $value)
{
$query .= $key . "='".$value."', ";
}
$query = substr($query, 0, -2);
foreach($where_condition as $key => $value)
{
$condition .= $key . "='".$value."' AND ";
}
$condition = substr($condition, 0, -5);
$query = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";
if(mysqli_query($this->con, $query))
{
return true;
}
}
public function delete($table_name, $where_condition)
{
$condition = '';
foreach($where_condition as $key => $value)
{
$condition .= $key . " = '".$value."' AND ";
$condition = substr($condition, 0, -5);
$query = "DELETE FROM ".$table_name." WHERE ".$condition."";
if(mysqli_query($this->con, $query))
{
return true;
}
}
}
}
?>
