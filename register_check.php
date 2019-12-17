<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$user=$_POST['user'];
$passwd1=$_POST['passwd1'];

$sql="insert into user(name,password) values ('$user','$passwd1')";

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