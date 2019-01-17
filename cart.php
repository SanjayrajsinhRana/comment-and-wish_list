<?php
include ('header.php');
require('connection.php');
$con1=new connection();
$con=$con1->connect();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CART</title>
<style type="text/css">

	.wish_prod
		{
			margin-top: 5px;
			width: 30%;
			height: 100px;
			float: left;
		}
		.left_block
		{
			margin-top: 10px;
			height: 100px;
			float: right;
			margin-left: 20px;
			width: 30%;
			background-color: white;
		}
	.c_product
	{
		margin-left: 1%;
		margin-top: 1%;
		width: 65%;
		float: left;
		height: 800px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border-radius: 15px;

	}
	.bill
	{
		margin-top: 1%;
		float: left;
		margin-left: 1%;
		height: 300px;
		width: 33%;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border-radius: 15px;
	}
	.product
	{
		margin-top: 2%;
		height: auto;
		background-color: white;
	}
	.button
	{
		margin-top: 5%;
		height: 15%;
		background-color: white;
		border-top: 1px solid black;
		border-bottom: 1px solid black;
	}
	.button_prod
	{	
		height: 50%;
		width:20%;
		margin-right: 1%;
		float: right;
		margin-top: 3%;
		border-radius: 15px;
		background-color: #f98c1f;
	}
	.menu
	{
		height: 200px;
		width: 100%;
		border-top: 1px solid black;
		border-bottom: 1px solid black;
		margin-top: 1%;

	}
	.details
	{
		margin-top: 10%;
		margin-left: 40%;
	}
	.btn_remove
	{
				background-color: #f98c1f;
				border-radius: 15px;
	}
	.price_details
	{
		color: grey;
		margin-top: 5px;
	}
</style>
</head>
<body>
<div class="c_product">
	<div class="product">
		<?php
		$cust_id=$_SESSION['u_id'];
		$wquery="SELECT * FROM product WHERE pid IN(SELECT pid FROM cart WHERE cid='$cust_id')";
		$result=mysqli_query($con,$wquery);
		if (mysqli_num_rows($result) == 0) 
		{
			echo "No any product in cart";?>
			<a href="viewproduct.php"><button class="button_prod">continue shopping</button></a>
			<?php
		}
		else
		{
		while ($row=mysqli_fetch_assoc($result)) 
		{?>
			<div class="menu">
						<div class="wish_prod">
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
					<a href="removefrmcart.php?id=<?php echo $row['pid']?>">
					<button class="btn_remove">REMOVE</button></a>
				</div>
			</div>
		
<?php
}
?>
</div>
	<div class="button">
		<a href="viewproduct.php"><button class="button_prod">continue shopping</button></a>
		<button class="button_prod">Place Order</button>
	</div>
</div>
</div>
<div class="bill">
	<div class="details">
	<p class="price_details">PRICE DETAILS</p>	
	Amount Payable:<?php
			$price_query="SELECT SUM(price) FROM product WHERE pid IN(SELECT pid FROM cart WHERE cid='$cust_id')";
			if ($result2=mysqli_query($con,$price_query)) 
			{
				while ($row=mysqli_fetch_assoc($result2))
				{
					echo $row['SUM(price)'];
				}
			}
			else
			{
				echo mysqli_error($con);
			}
		}
			?>
		</div>
</div>
</body>
</html>