<!DOCTYPE html>
<html>
<head>
	<title>GLEC-Login</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>

<div class="bg">
  <div class="loginp">
    <div class="formlogin">
      <a>Club Los Pibes</a>
			<form action="../Controllers/cLogin.php" method="POST">
				<input type="text" name="user" id="user"  required placeholder="Usuario">
				<input type="password" name="pass" id="pass"  required placeholder="******">
				<div>
					<input type="submit" name="enviar" value="Entrar">
				</div>
			</form>
    </div>
  </div>
</div>

</body>
</html>