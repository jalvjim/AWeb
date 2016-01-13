<?php

static $ruta = "../sketches";
include 'Principal.class.php';
include 'BD.class.php';

if (isset($_GET)) {
	$nombre = $_GET['nombre'];
	$nombre = $ruta . '/' . $nombre;

	BD::conectar();
	Principal::comprobarActualizacion($nombre, $ruta);
	BD::desconectar();
}

?>