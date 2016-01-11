<?

session_start();

?>
<html>
	<head>
	</head>
	<body>
		<form method="POST" action="procesarLogin.php">
			<input type="name" name="usuario" placeholder="Usuario"></input>
			<input type="password" name="pass" placeholder="Contraseña"></input>
			<button type="submit" name="submit" class="btn btn-primary" value="Login">Login</button>
		</form>
	</body>
</html>



<?


?>