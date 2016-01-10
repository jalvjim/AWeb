<?php
include('../BD.class.php');
include('../GM_busquedas_motor.class.php') ;
$data = array();
BD::conectar();
$data = GM_busquedas_motor::obtener_datos_mapa($_POST["idp"]);
BD::desconectar();
echo json_encode($data);
?>