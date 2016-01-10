<?
include('../php/BD.class.php');
include('../php/Principal.class.php');
include('../php/Usuarios.class.php');

BD::conectar();
$exito=0;

?>
<html>
	<head>
	</head>
	<body>
		<form method="POST">
			<input type="name" name="usuario" placeholder="Usuario"></input>
			<input type="password" name="pass" placeholder="Contraseña"></input>
			<input type="submit" name="submit" placeholder="Login" value="Login"></input>
		</form>
	</body>
</html>



<?



if($_POST['submit']=="Login"){
	$param['usuario']=$_POST['usuario'];
	$param['password']=$_POST['password'];
	$exito=Usuarios::login_usuarios($param);

}
BD::desconectar();

if($exito==0)
	header('Location: http://localhost/web/interfaz/index.php');




?>