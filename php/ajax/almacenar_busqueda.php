<?php
	session_start();
	include('../BD.class.php');
	include('../GM_usuarios.class.php') ;
	
	$MAX = 10;  // número máximo de datos que se pueden almacenar por un único usuario 
	
	
	if ($_SESSION["usuario_id"]) {
		BD::conectar();
		$params = array();
		
		$cuantas = GM_usuarios::contar_busquedas_usuario($_SESSION["usuario_id"]);
		if ($cuantas < $MAX) {
			if (!GM_usuarios::existe_busqueda($_SESSION["usuario_id"], $_POST["url"])) {
				$params["usuario"] = $_SESSION["usuario_id"];
				$params["url"] = $_POST["url"];
				$params["keywords"] = $_POST["nameBusc"];
				$result = GM_usuarios::almacenar_busqueda ($params);
				if ($result) 
					echo 0;
				else
					echo 1;
			}
			else 
				echo 2;
		}
		else {
			//-------- MENSAJE PARA QUE BORRE 
			echo 3;
		}
		BD::desconectar();
	}
?>