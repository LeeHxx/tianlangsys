<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$get=$_POST['code_get'];
$readiness=$_POST['code_readiness'];
$opertor=$_POST['code_opertor'];
$completion=$_POST['code_completion'];
$batch_end=$_POST['code_end'];
$turn_date=$_POST['code_turn_date'];
$volume=$_POST['code_turn_volume'];

$sql="insert into code(order_id,code_get,code_readiness,code_opertor,code_completion,code_end,code_turn_date,code_turn_volume) values ('$id','$get','$readiness','$opertor','$completion','$batch_end','$turn_date','$volume')";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: workshop-code-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-code-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
