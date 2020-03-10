<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$get=$_POST['smt_get'];
$readiness=$_POST['smt_readiness'];
$line=$_POST['smt_line'];
$classes=$_POST['smt_classes'];
$first_start=$_POST['smt_first_start'];
$first_end=$_POST['smt_first_end'];
$first_opertor=$_POST['smt_first_opertor'];
$completion=$_POST['smt_batch_completion'];
$batch_end=$_POST['smt_batch_end'];
$opertor=$_POST['smt_opertor'];
$department=$_POST['smt_turn_department'];
$volume=$_POST['smt_turn_volume'];

$sql="UPDATE smt set smt_get='$get',smt_readiness='$readiness',smt_line='$line',smt_classes='$classes',smt_first_start='$first_start',smt_first_end='$first_end',smt_first_opertor='$first_opertor',smt_batch_completion='$completion',smt_batch_end='$batch_end',smt_opertor='$opertor',smt_turn_department='$department',smt_turn_volume='$volume' WHERE order_id='$id'";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: workshop-smt-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-smt-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
