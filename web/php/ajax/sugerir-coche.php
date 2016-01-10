<?php
//error_reporting(E_ALL);
//ini_set('display_errors','On');
include('../BD.class.php');
include('../GM_busquedas_motor.class.php');
BD::conectar();
$sugerencias = GM_busquedas_motor::obtener_sugerencias_coches($_GET['term'],$_GET['anio']);
echo json_encode($sugerencias);
BD::desconectar();
?>