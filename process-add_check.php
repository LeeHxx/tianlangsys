<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$bom=$_POST['bom'];
$stencil=$_POST['stencil'];
$tooling=$_POST['tooling'];
$allocation=$_POST['personal_allocation'];
$confirmation_data=$_POST['process_confirmation_data'];
$confirm=$_POST['process_confirm'];

$sql="insert into process(order_id,bom,stencil,tooling,personal_allocation,process_confirmation_data,process_confirm) values ('$id','$bom','$stencil','$tooling','$allocation','$confirmation_data','$confirm')";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: process-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: process-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
