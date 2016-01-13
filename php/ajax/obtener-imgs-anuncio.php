<?php
include('../BD.class.php');
include("../GM_general.class.php");

if($_GET['anuncio']){
	BD::conectar();
	switch($_GET['categoria-padre']){
		case 'inmobiliaria' : 
			include("../GM_busquedas_inmo.class.php");
			$imgs = GM_busquedas_inmo::obtener_fotos_anuncio($_GET['anuncio']);
			echo json_encode($imgs);
			break;
		case 'motor' : 
			include('../GM_busquedas_motor.class.php');	
			$imgs = GM_busquedas_motor::obtener_fotos_anuncio($_GET['anuncio']);
			echo json_encode($imgs);
			break;
			
	}

	BD::desconectar();
}
else
	echo 0;


?>