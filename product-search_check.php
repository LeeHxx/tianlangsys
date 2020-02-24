<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$product_id=$_POST['product_id'];
echo $product_id;
echo "??";
$sql="select * from orders where order_id='$product_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  $_SESSION['order_id']=$product_id;
    header("Location: product-add.php");
    echo "yes";
	exit;
}else{
  header("Location: product-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
