<?php
session_start();
//$_SESSION['nuevo_anuncio'] = $_POST;
include('../BD.class.php');
include('../GM_busquedas_motor.class.php') ;
$coches = array();
BD::conectar();
$coches = GM_busquedas_motor::obtener_coches_relacionados($_POST);
BD::desconectar();
echo $coches == 0 ? 0 : json_encode($coches);
?>