<?php
//error_reporting(E_ALL);
//ini_set('display_errors','On');
include('../BD.class.php');
include('../GM_general.class.php');
BD::conectar();
$sugerencias = GM_general::obtener_sugerencias_localidades($_POST['term']);
echo json_encode($sugerencias);
BD::desconectar();
?>