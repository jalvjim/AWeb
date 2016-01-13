<?php
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors','On');
if (!$_POST) exit;
require('../BD.class.php');
require('../GM_usuarios.class.php');
require('../GM_general.class.php');

$prefijo_ref	= $_POST['ref'][0];
$ref 			= substr($_POST['ref'], 1);
$ret 			= $_POST['ret'];

$usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 0;


BD::conectar();
if ($usuario_id) {
	GM_usuarios::limpiar_articulos($usuario_id, $prefijo_ref);
	$cuantas = GM_usuarios::contar_articulos_usuario($usuario_id, $prefijo_ref);
	if ($cuantas < GM_usuarios::$max_favoritos) {
		if (!GM_usuarios::existe_articulo($usuario_id, $prefijo_ref.$ref)) {
			$ok = GM_usuarios::almacenar_articulo ($usuario_id, $prefijo_ref.$ref);
			if ($ok)
				GM_usuarios::sumar_favorito($ref, $prefijo_ref);
		} else 
			echo -1;
	}
	else
		echo 0;
	
} else {
	require('../Cookies.class.php');
	Cookies::limpiar_articulos();
	$ok = Cookies::set_articulo($prefijo_ref.$ref);
}

if ($ok==1 && $ret) {
	$item = GM_usuarios::obtener_datos_vistos_recientemente(array($ref), $prefijo_ref);
	$item[0]['precio'] = number_format($item[0]['precio'], 0, ',', '.');
	echo json_encode($item);
}
else echo $ok;
BD::desconectar();
?>