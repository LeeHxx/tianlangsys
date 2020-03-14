<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$income=$_POST['semi_income'];
$place=$_POST['semi_place'];
$receive=$_POST['semi_receive'];

$sql="UPDATE semi set semi_income='$income',semi_place='$place',semi_receive='$receive'";
$result=mysqli_query($conn,$sql);

if($result){
    header("Location: semi-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: semi-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
