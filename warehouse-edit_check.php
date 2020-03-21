<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$place=$_POST['warehouse_place'];
$kitting=$_POST['warehouse_kitting'];
$preprocessing=$_POST['warehouse_preprocessing'];
$keeper=$_POST['warehouse_keeper'];
$department=$_POST['warehouse_turn_department'];
$volume=$_POST['warehouse_turn_volume'];
$turn_date=$_POST['warehouse_turn_date'];
$turn_group=$_POST['warehouse_turn_group'];

$sql="UPDATE warehouse set warehouse_place='$place',warehouse_kitting='$kitting',warehouse_preprocessing='$preprocessing',warehouse_keeper='$keeper',warehouse_turn_department='$department',warehouse_turn_volume='$volume',warehouse_turn_date='$turn_date',warehouse_turn_group='$turn_group' WHERE order_id='$id'";
$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('修改成功！');window.location.href='warehouse-search.php';</script>";
    //header("Location: warehouse-add-success.php");
    echo "yes";
	exit;
}else{
  echo "<script>alert('修改失败！请重新检查填写内容。');window.history.back(-1);</script>";
  //header("Location: warehouse-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
