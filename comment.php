<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="addcomment.php?id=<?php echo $_GET['id'];?>" method="POST">
<textarea rows="10" cols="50" name="comment"></textarea><br>
<button type="submit">comment</button>
</form>
</body>
</html>