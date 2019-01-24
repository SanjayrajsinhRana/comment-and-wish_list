<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.shipping_center
		{
			margin-top: 2%;
			margin-left: 20%;
			height: 600px;
			width: 800px;
		}
	</style>
</head>
<body>
<div class="shipping_center">
	<div class="shipping_add">
		<form method="POST" action="placeorder.php">
			<textarea rows="10" cols="50" placeholder="Enter address:" name="address"></textarea>		
	</div>
	<div class="bill_details">
		<mark>TOTAL AMOUNT PAYABLE:</mark>
		<?php
		$bill=$_GET['bill'];
		echo $bill;
		?>
	</div>
	<button type="submit" name="placeorder">Place Order</button>
		</form>
</div>
</body>
</html>