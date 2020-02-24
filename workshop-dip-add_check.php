<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$get=$_POST['dip_get'];
$recipient=$_POST['dip_recipient'];
$readiness=$_POST['dip_readiness'];
$first_start=$_POST['dip_first_start'];
$first_opertor=$_POST['dip_first_opertor'];
$completion=$_POST['dip_batch_completion'];
$batch_end=$_POST['dip_batch_end'];
$opertor=$_POST['dip_opertor'];
$turn_date=$_POST['dip_turn_date'];
$volume=$_POST['dip_turn_volume'];

$sql="insert into dip(order_id,dip_get,dip_recipient,dip_readiness,dip_first_start,dip_first_opertor,dip_batch_completion,dip_batch_end,dip_opertor,dip_turn_date,dip_turn_volume) values ('$id','$get','$recipient','$readiness','$first_start','$first_end','$first_opertor','$completion','$batch_end','$opertor','$turn_date','$volume')";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: workshop-dip-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-dip-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
