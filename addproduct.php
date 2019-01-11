<?php
session_start();
?>
<?php
require ('connection.php');
$con1=new connection();
$con=$con1->connect();

$query ="CREATE TABLE IF NOT EXISTS product(
pid int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
pname varchar(255),
pimg varchar(255))";                        
if(mysqli_query($con,$query))
{
	$product=$_POST['pname'];
	$target = "picture/".basename($_FILES['image']['name']);
	$p_name = $_FILES['image']['name'];
	$move = move_uploaded_file($_FILES['image']['tmp_name'],$target);
	$query2 = "INSERT INTO product (pname,pimg) VALUES ('$product','$p_name')";
	if(mysqli_query($con,$query2))
	{
		header("Location: ../form/homepage.php?productAdded=DONE");
	}
	else
	{
			echo mysqli_error($con);
	}





}
else
{
	echo mysqli_error($con);
}
?>