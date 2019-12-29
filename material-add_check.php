<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$come=$_POST['material_come'];
$volume=$_POST['material_volume'];
$type=$_POST['material_type'];
$okng=$_POST['material_okng'];
$kitting=$_POST['material_kitting'];
$admin=$_POST['material_admin'];

$sql="insert into material(order_id,material_come,material_volume,material_type,material_okng,material_kitting,material_admin) values ('$id','$come','$volume','$type','$okng','$kitting','$admin')";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: material-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: material-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
