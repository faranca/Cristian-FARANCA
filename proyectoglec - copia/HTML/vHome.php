<?php 

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Home</title>
</head>
<body>
	<div class="bg">
		<div id="menu">
			<?php include '../HTML/vMenu.php'
				 ?>
		</div>
		<div id="contenidohome">
			<h1> Bienvenido <?php echo $_SESSION['usuario']."!";  ?> </h1>
			<img src="../img/logo-glec.png" width="200px" height="200px">
		</div>
	</div>
</body>
</html>