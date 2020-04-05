<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_GET['id'];
$receive_date=$_POST['product_receive_date'];
$receiver=$_POST['product_receiver'];
$pack_date=$_POST['product_pack_date'];
$packer=$_POST['product_packer'];
$pack_volume=$_POST['product_pack_volume'];
$deliver=$_POST['product_deliver'];
$deliver_volume=$_POST['product_deliver_volume'];
$shipper=$_POST['product_shipper'];
$client=$_POST['product_client'];

$sql="UPDATE product set product_receive_date='$receive_date',product_receiver='$receiver',product_pack_date='$pack_date',product_packer='$packer',product_pack_volume='$pack_volume',product_deliver='$deliver',product_deliver_volume='$deliver_volume',product_shipper='$shipper',product_client='$client' WHERE id='$id'";
$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('修改成功！');window.location.href='product-add.php';</script>";
    //header("Location: product-add-success.php");
    // echo "yes";
	exit;
}else{
  echo "<script>alert('修改失败！请检查填写信息无误。');window.history.back(-1);</script>";
  //header("Location: product-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
