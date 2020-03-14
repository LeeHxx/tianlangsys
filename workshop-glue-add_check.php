<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$get=$_POST['glue_get'];
$readiness=$_POST['glue_readiness'];
$opertor=$_POST['glue_opertor'];
$completion=$_POST['glue_completion'];
$batch_end=$_POST['glue_end'];
$turn_date=$_POST['glue_turn_date'];
$volume=$_POST['glue_turn_volume'];

$sql="insert into glue(order_id,glue_get,glue_readiness,glue_opertor,glue_completion,glue_end,glue_turn_date,glue_turn_volume) values ('$id','$get','$readiness','$opertor','$completion','$batch_end','$turn_date','$volume')";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: workshop-glue-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-glue-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
