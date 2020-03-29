<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_GET['id'];
$order_id=$_POST['order_id'];
$feedback_date=$_POST['feedback_date'];
$feedback=$_POST['feedback'];
$type=$_POST['problem_type'];
$description=$_POST['problem_description'];
$solving_time=$_POST['solving_time'];
$solution=$_POST['solution'];
$responsible=$_POST['problem_responsible'];


$sql="UPDATE problem set feedback_date='$feedback_date',feedback='$feedback',problem_type='$type',problem_description='$description',solving_time='$solving_time',solution='$solution',problem_responsible='$responsible' WHERE id='$id'";

$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('修改成功！');window.location.href='workshopproblem-add.php';</script>";
    // header("Location: problem-add-success.php");
    // echo "yes";
	exit;
}else{
  echo "<script>alert('修改失败！请检查填写信息无误。');window.history.back(-1);</script>";
  // header("Location: problem-add.php");
  // echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
