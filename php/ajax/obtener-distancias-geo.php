<?php

/*
	Creación:
		- 07/10/2015, Juan Antonio
*/

session_start();

if(isset($_POST['loc'])){
	$loc = filter_input(INPUT_POST,'loc', FILTER_SANITIZE_STRING);
	include_once '../GM_general.class.php';
	include_once '../BD.class.php';
	BD::conectar();
	$coords = GM_general::obtener_coordenadas_localidad($loc);
	BD::desconectar();
	if(isset($coords)){
		list($_SESSION['geoposicion']['latitud'],$_SESSION['geoposicion']['longitud']) = explode(',',$coords);
		echo '1';
	}
	else
		echo '0';
}
elseif (!empty($_POST['geoposicion'])) {
//	unset($_SESSION['geoposicion']);
	$_SESSION['geoposicion']['latitud'] = $_POST['geoposicion']['latitude'];
	$_SESSION['geoposicion']['longitud'] = $_POST['geoposicion']['longitude'];
	echo '1';
}
else echo '0';

?>