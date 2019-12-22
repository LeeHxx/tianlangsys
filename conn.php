<?php
//使用define函数定义数据库服务器地址、用户名和密码常量
define("HOST","127.0.0.1");
define("USER","root");
define("PASSWD","root");
//使用mysql_connect()函数，连接数据服务器
$conn=mysqli_connect(HOST,USER,PASSWD);
//如果数据库连接失败，抛出错误信息
if(!$conn)
{
	die('Could not connect:' .mysqli_error());
}
//选择所要操作的数据库
$dbselect=mysqli_select_db($conn,"stusys");
//如果数据库选择失败，抛出错误信息
if(!$dbselect)
{
	die('Can\'t use DataBase:' .mysqli_error());
}
//设置编码为utf8
//mysqli_query("set names 'utf8'");
?>
