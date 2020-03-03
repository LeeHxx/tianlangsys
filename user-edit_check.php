<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id = $_GET['id'];
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];
$job=$_POST['job'];
$tel=$_POST['tel'];
$orders=$_POST['orders'];
$material=$_POST['material'];
$process=$_POST['process'];
$warehouse=$_POST['warehouse'];
$making=$_POST['making'];
$quality=$_POST['quality'];
$product=$_POST['product'];
//echo $id,$job,$user_name,$user_password,$tel,$orders,$material,$process,$warehouse,$making,$quality,$product;

$sql="UPDATE user SET user_name='$user_name',user_password='$user_password',job='$job',tel='$tel',orders=b'$orders',material=b'$material',process=b'$process',warehouse=b'$warehouse',making=b'$making',quality=b'$quality',product=b'$product' WHERE user_id='$id'";

$result=mysqli_query($conn,$sql);

if($result){
    header("Location: user-edit-success.php?id=$id");
    echo "yes";
	exit;
}else{
  //header("Location: material-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
