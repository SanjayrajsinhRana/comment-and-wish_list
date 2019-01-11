<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="addproduct.php" method="POST" enctype="multipart/form-data">
<input type="text" name="pname" placeholder="enter product name">
<input type="file" name="image">
<input type="submit" name="submit">
</form>
</body>
</html>