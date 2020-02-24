<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$code_id=$_POST['code_id'];
echo $code_id;
echo "??";
$sql="select * from orders where order_id='$code_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  $_SESSION['order_id']=$code_id;
    header("Location: workshop-code-add.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-code-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
