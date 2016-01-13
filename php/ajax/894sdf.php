<?php
session_start();
if ($_POST) {
	if (!empty($_POST["user_email"])) exit;	// Honey pot
	session_start();
	include('../BD.class.php');
	include('../GM_usuarios.class.php');
	require ('../Cookies.class.php');
	$param["email"]  = $_POST["67dg"];
	$param["password"] = $_POST["4rdvx"];
	BD::conectar();
	$error = GM_usuarios::login_usuarios($param);
	
	if ($error == 0)
		GM_usuarios::copiar_cookies_a_favoritos($_SESSION["usuario_id"]);
	
	BD::desconectar();
	echo $error;
}
?>