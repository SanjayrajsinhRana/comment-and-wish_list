<?php
class connection
{
	function connect()
	{
		$dbserver="localhost";
		$dbusername="root";
		$dbpassword="";
		$database="product";
		$conn=mysqli_connect($dbserver,$dbusername,$dbpassword,$database);
		if($conn == false)
		{
			echo mysqli_error($conn);
		}
		else
		{	
			return $conn;
		}
	}
}
?>