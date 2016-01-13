<?php
include('../BD.class.php');
include('../GM_busquedas_motor.class.php') ;

$data = array();
BD::conectar();
$data = GM_busquedas_motor::obtener_nombres_categorias($_POST['idc']);
BD::desconectar();
echo json_encode($data);
?>