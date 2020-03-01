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

$sql="UPDATE material set material_come='$come',material_volume='$volume',material_type='$type',material_okng='$okng',material_kitting='$kitting',material_admin='$admin' WHERE order_id='$id'";

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
