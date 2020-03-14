<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$first_date=$_POST['quality_first_date'];
$first_inspection=$_POST['quality_first_inspection'];
$first_confirm=$_POST['quality_first_confirm'];
$batch_inspect=$_POST['quality_batch_inspect'];
$inspection=$_POST['quality_inspection'];
$OK_volume=$_POST['quality_OK_volume'];
$NG_volume=$_POST['quality_NG_volume'];
$inspection_confirm=$_POST['quality_inspection_confirm'];
$inspection_date=$_POST['quality_inspection_date'];

$sql="UPDATE quality set quality_first_date='$first_date',quality_first_inspection='$first_inspection',quality_first_confirm='$first_confirm',quality_batch_inspect='$batch_inspect',quality_inspection='$inspection',quality_OK_volume='$OK_volume',quality_NG_volume='$NG_volume',quality_inspection_confirm='$inspection_confirm',quality_inspection_date='$inspection_date'";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: quality-add-success.php");
    echo "yes";
	exit;
}else{
  header("Location: quality-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
