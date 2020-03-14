<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$addition_date=$_POST['addition_date'];
$type=$_POST['addition_type'];
$volume=$_POST['addition_volume'];
$applicant=$_POST['addition_applicant'];
$reason=$_POST['addition_reason'];
$leader=$_POST['addition_leader'];
$price=$_POST['addition_price'];
$controller=$_POST['addition_controller'];


$sql="UPDATE addition set addition_date='$addition_date',addition_type='$type',addition_volume='$volume',addition_applicant='$applicant',addition_reason='$reason',addition_leader='$leader',addition_price='$price',addition_controller='$controller' WHERE order_id='$id'";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: addition-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: addition-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
