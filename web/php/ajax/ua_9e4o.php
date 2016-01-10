<?php
/*
	25/09/2015 Vicente Giraldo
*/
	
if ($_POST) {

	// ¡¡¡ Es un bot !!!
	if (!empty($_POST['email']))
		exit;
	
	
	require ("../BD.class.php");
	require ("../GM_usuarios.class.php");
	require ("../GM_general.class.php");
		
	BD::conectar();
	$datos = GM_usuarios::obtener_datos_para_contacto($_POST['ref']);
	BD::desconectar();

	if ($datos != 0) {
		$email["accion"] = "contacto_anuncio";
		$email["nombre"] = $datos["nombre"];
		$email["email"] = $datos["email"];
		$email["nombre_contactante"] = $_POST["nombre_contactante"];
		$email["email_contactante"] = $_POST["y7687s"];
		$email["tlf_contactante"] = $_POST["tlf_contactante"];
		$email["referencia"] = $_POST["ref"];
		$email["msj"] = $_POST["comment"];
		$email["titulo"] = $datos["titulo"];
		$email["enlace"]= "http://" . $_SERVER['HTTP_HOST'] ."/" . $datos['nombre_rr'] . "/" . GM_general::slugify($datos['titulo']) . "-gm" . $_POST["ref"] . ".htm";
		echo GM_usuarios::enviar_email($email);
		}
} else return 0;
?>