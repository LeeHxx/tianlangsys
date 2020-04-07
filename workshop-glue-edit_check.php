<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_GET['id'];
$get=$_POST['glue_get'];
$readiness=$_POST['glue_readiness'];
$opertor=$_POST['glue_opertor'];
$completion=$_POST['glue_completion'];
$batch_end=$_POST['glue_end'];
$turn_date=$_POST['glue_turn_date'];
$volume=$_POST['glue_turn_volume'];

$sql="UPDATE glue set glue_get='$get',glue_readiness='$readiness',glue_opertor='$opertor',glue_completion='$completion',glue_end='$batch_end',glue_turn_date='$turn_date',glue_turn_volume='$volume' where id='$id'";
$result=mysqli_query($conn,$sql);

if($result){
  echo "<script>alert('修改成功！');window.location.href='workshop-glue-add.php';</script>";
    // header("Location: workshop-glue-add-success.php");
    // echo "yes";
	exit;
}else{
  echo "<script>alert('修改失败！请检查填写信息无误。');window.history.back(-1);</script>";
    //header("Location: workshop-glue-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
