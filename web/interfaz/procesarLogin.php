<?php

include '../php/Usuarios.class.php';

if ($_POST['submit'] == "Login") {

	BD::conectar();

	$param['usuario'] = $_POST['usuario'];
	$param['password'] = $_POST['pass'];
	$error = Usuarios::login_usuarios($param);
	BD::desconectar();
	if (!$error) {
		header('Location: http://localhost/web/interfaz/index.php ');
		headers_sent();
	}

}

?>