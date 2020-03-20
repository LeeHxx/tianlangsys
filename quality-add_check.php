<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$first_date=$_POST['quality_first_date'];
$first_inspection=$_POST['quality_first_inspection'];
$first_confirm=$_POST['quality_first_confirm'];
$batch_inspect=$_POST['quality_batch_inspect'];
$inspection=$_POST['quality_inspection'];
$OK_volume=$_POST['quality_OK_volume'];
$NG_volume=$_POST['quality_NG_volume'];
$inspection_confirm=$_POST['quality_inspection_confirm'];
$inspection_date=$_POST['quality_inspection_date'];

$sql="insert into quality(order_id,quality_first_date,quality_first_inspection,quality_first_confirm,quality_batch_inspect,quality_inspection,quality_OK_volume,quality_NG_volume,quality_inspection_confirm,quality_inspection_date) values ('$id','$first_date','$first_inspection','$first_confirm','$batch_inspect','$inspection','$OK_volume','$NG_volume','$inspection_confirm','$inspection_date')";

$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('添加成功！');window.location.href='quality-search.php';</script>";
    //header("Location: quality-add-success.php");
    echo "yes";
	exit;
}else{
  echo "<script>alert('添加失败！');window.location.href='quality-search.php';</script>";
  //header("Location: quality-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
