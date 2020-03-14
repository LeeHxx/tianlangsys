<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$get=$_POST['cleaning_get'];
$readiness=$_POST['cleaning_readiness'];
$opertor=$_POST['cleaning_opertor'];
$completion=$_POST['cleaning_completion'];
$end=$_POST['cleaning_end'];
$turn_date=$_POST['cleaning_turn_date'];
$volume=$_POST['cleaning_turn_volume'];

$sql="insert into cleaning(order_id,cleaning_get,cleaning_readiness,cleaning_opertor,cleaning_completion,cleaning_end,cleaning_turn_date,cleaning_turn_volume) values ('$id','$get','$readiness','$opertor','$completion','$end','$turn_date','$volume')";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: workshop-clean-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-clean-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
