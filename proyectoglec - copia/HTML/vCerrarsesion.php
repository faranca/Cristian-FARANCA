<html>
   <head>
	<title>Cerrar Sesion</title>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="UTF-8" />
	<meta name="description" content="descripcion de la pagina" />
   </head>
   
   <body>
	<?php

			session_start();
			session_destroy();
			$_SESSION['login'] = 0;
		header('Location:../HTML/vLogin.php');
	?>
   </body>
</html>