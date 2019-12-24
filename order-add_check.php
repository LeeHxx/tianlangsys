<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$name=$_POST['order_name'];
$type=$_POST['order_type'];
$number=$_POST['order_number'];
$client=$_POST['order_client'];
$start=$_POST['order_start'];
$end=$_POST['order_end'];

$sql="insert into orders values ('$id','$name','$type','$number','$client','$start','$end')";

$result=mysqli_query($conn,$sql);

if($result){
    echo "yes";
	exit;
}else{	
	echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);
?>