<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<form action="./pruebafecha.php" method="GET">
	<input type="text" name="dato">

	<input type="submit">
</form>




<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
echo date("h") . "  -  " . DATE("H");



?>

</body>
</html>