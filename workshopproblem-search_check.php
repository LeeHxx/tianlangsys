<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$problem_id=$_POST['problem_id'];

$sql="select * from orders where order_id='$problem_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num>0){
  $_SESSION['order_id']=$problem_id;
    header("Location: workshopproblem-add.php");
    // echo "yes";
	exit;
}else{
  header("Location: workshopproblem-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
