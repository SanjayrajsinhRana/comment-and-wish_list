<?php
session_start();
require ('connection.php');
$con1=new connection();
$con=$con1->connect();
if (isset($_POST['comment'])) {

$query="CREATE TABLE IF NOT EXISTS comment(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
cid int,
cmt TEXT,
pid int)";
$result1=mysqli_query($con,$query); 
//$ctable=mysqli_query($con,$query);
$uid=$_SESSION['u_id'];
$cmt=$_POST['comment'];
$pid=$_GET['id'];
if($cmt == null)
{
	header("Location: ../product/viewdetails.php?id=$pid");	
}
else
{
$query1="INSERT INTO comment(cid,cmt,pid) values ('$uid','$cmt','$pid')";
if(mysqli_query($con,$query1))
{
	header("Location: ../product/viewdetails.php?id=$pid");
}
else
{
	echo mysqli_error($con);
}
}
}
else
{
	header("Location: ../form/login.php");
}
?>