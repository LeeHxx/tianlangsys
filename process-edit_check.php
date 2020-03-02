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

$sql="UPDATE process set bom='$bom',stencil='$stencil',tooling='$tooling',personal_allocation='$allocation',process_confirmation_data='$confirmation_data',process_confirmor='$confirm' WHERE order_id='$id'";

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
