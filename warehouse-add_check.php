<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$place=$_POST['warehouse_place'];
$kitting=$_POST['warehouse_kitting'];
$preprocessing=$_POST['warehouse_preprocessing'];
$keeper=$_POST['warehouse_keeper'];
$department=$_POST['warehouse_turn_department'];
$volume=$_POST['warehouse_turn_volume'];
$turn_date=$_POST['warehouse_turn_date'];
$turn_group=$_POST['warehouse_turn_group'];

$sql="insert into warehouse(order_id,warehouse_place,warehouse_kitting,warehouse_preprocessing,warehouse_keeper,warehouse_turn_department,warehouse_turn_volume,warehouse_turn_date,warehouse_turn_group) values ('$id','$place','$kitting','$preprocessing','$keeper','$department','$volume','$turn_date','$turn_group')";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: warehouse-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: warehouse-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
