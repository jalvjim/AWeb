<?php

include '../php/Usuarios.class.php';

if ($_POST['submit'] == "Login") {

	BD::conectar();

	$param['usuario'] = $_POST['usuario'];
	$param['password'] = $_POST['pass'];
	$exito = Usuarios::login_usuarios($param);

}

?>