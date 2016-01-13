<?php
session_start();
if ($_POST) {
	if (!empty($_POST["signup_email"])) exit;	// Honey pot
	session_start();
	include('../BD.class.php');
	include('../GM_usuarios.class.php') ;
	require ('../Cookies.class.php');
	$param = array();
	$param['nombre'] = $_POST['nombre'];
	$param["email"]  = $_POST["loiRo"];
	$param["password"] = $_POST["hpss"];
	BD::conectar();
	$error = GM_usuarios::nuevo_usuario($param);		
		
	if ($error)
		echo $error;
	else {
		echo GM_usuarios::login_usuarios($param);
		GM_usuarios::copiar_cookies_a_favoritos($_SESSION["usuario_id"]);
	}
	BD::desconectar();
}
?>