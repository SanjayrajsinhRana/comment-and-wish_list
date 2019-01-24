<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		PRODUCT
	</title>
<style type="text/css">
		body{
			background:linear-gradient(#abb2b9,#ccd1d1,#abb2b9);
		}

	.img
	{
		
		width:90%;
		height:80%;
		margin-left: 5%;
		margin-top: 5%;
		border-radius: 10px;

	}
	.main
	{
		width: 20%;
		height: 250px;
		margin-left: 4%;
		float: left;
		border-top: 2px solid green;
		border-bottom: 2px solid green;
		border-radius: 10px;
		margin-top: 3%;
		background-color: white;
	}
	.pname
	{
		margin-left: 38%;
		font-size: 20px;
		margin-top: 0px;

	}
	.link
	{
		color: black;
	}
</style>
</head>
<body>
<?php
require ('connection.php');
$con1=new connection();
$con=$con1->connect();
if(isset($_SESSION['u_id']))
{
$query="SELECT * FROM product";
$select=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($select))
{
?>
<a class="link" href="viewdetails.php?id=<?php echo $row['pid']?>">
<div class="main">
		
<?php $a=$row['pimg'];
$b=explode(',',$a);
?>
			<img class='img' src='../product/picture/<?php echo $b[0]?>' alt='image not found'/><br/>
		<p class="pname">	<?php
			echo $row['pname'];
			?></p>

</div>
</a>
<?php
}
}
else
{
	header("Location ../form/login.php");
}
?>
<!-- <a href="../form/homepage.php"><button>HOME_PAGE</button></a> -->
</body>
</html>