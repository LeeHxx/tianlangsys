<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_GET['id'];
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

$sql="UPDATE dip set dip_get='$get',dip_recipient='$recipient',dip_readiness='$readiness',dip_first_start='$first_start',dip_first_opertor='$first_opertor',dip_batch_completion='$completion',dip_batch_end='$batch_end',dip_opertor='$opertor',dip_turn_date='$turn_date',dip_turn_volume='$volume' where id='$id'";
$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('修改成功！');window.location.href='workshop-dip-add.php';</script>";
    //header("Location: workshop-dip-add-success.php");
    // echo "yes";
	exit;
}else{
  echo "<script>alert('修改失败！请检查填写信息无误。');window.history.back(-1);</script>";
  //header("Location: workshop-dip-add.php");
  //echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
