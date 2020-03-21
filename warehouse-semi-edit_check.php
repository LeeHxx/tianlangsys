<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$income=$_POST['semi_income'];
$place=$_POST['semi_place'];
$receive=$_POST['semi_receive'];

$sql="UPDATE semi set semi_income='$income',semi_place='$place',semi_receive='$receive' WHERE order_id='$id'";
$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('修改成功！');window.location.href='warehouse-semi-add-success.php';</script>";
    //header("Location: warehouse-semi-add-success.php");
    echo "yes";
	exit;
}else{
  echo "<script>alert('修改失败！请重新检查填写内容。');window.history.back(-1);</script>";
  //header("Location: warehouse-semi-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
