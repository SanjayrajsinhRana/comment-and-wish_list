<?php
include('header.php');
require('connection.php');
$con1=new connection();
$con=$con1->connect();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.wish_prod
		{
			margin-top: 5px;
			width: 100%;
			height: 200px;
			background-color: gray;
			float: left;
		}
		.left_block
		{
			margin-top: 10px;
			height: 90%;
			float: left;
			margin-left: 20px;
			width: 45%;
			background-color: white;
		}
		.img
	{
		width:90%;
		height:80%;
		margin-left: 5%;
		margin-top: 5%;
		border-radius: 10px;

	}
	</style>
</head>
<body>
<div class="wish_prod">

<?php
$cust_id =$_SESSION['u_id'];
//$wquery="SELECT pid,pname,pimg FROM product WHERE cid='$cust_id'";
$wquery="SELECT * FROM product WHERE pid IN(SELECT pid FROM wish_list WHERE cid='$cust_id')";
$result=mysqli_query($con,$wquery);
while ($row=mysqli_fetch_assoc($result)) 
{?>
	<div class="wish_prod">
		<div class="left_block">
			<img class='img' src='../product/picture/<?php echo $row["pimg"]?>' alt='image not found'/><br/>

		</div>
	<div class="left_block">
			DETAILS:<br>
		PRICE IN ₹=<?php echo $row["price"]?>
		<br>
		PICTURE_ID=<?php echo $row["pid"]?>
		<br>
		PRODUCT_NAME=<?php echo $row["pname"]?>
		<br>
		IMAGE_NAME=<?php echo $row["pimg"]?>
		<br>
	</div>
		</div>
</div>
<?php
}
?>
</div>
<a href="viewproduct.php"><button>Product-Page</button></a>
</body>
</html>