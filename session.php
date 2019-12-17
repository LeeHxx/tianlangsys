<?php
//开启session
session_start();
//检测用户是否登录，若没有登录则转向登录页面
if (!isset($_SESSION['ischecked'])){
	header("Location:login.php");
}
?>