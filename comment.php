<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.btn_sub
	{
		border-radius: 15px;
		background-color: #f98c1f;
	}
</style>
<body>
<form action="addcomment.php?id=<?php echo $_GET['id'];?>" method="POST">
<textarea rows="10" cols="50" name="comment"></textarea><br>
<button type="submit" class="btn_sub">comment</button>
</form>
</body>
</html>