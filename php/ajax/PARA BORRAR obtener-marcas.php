<?php
include('../BD.class.php');
include('../GM_busquedas_motor.class.php') ;
$marcas = array();
BD::conectar();
//$campo_contador = str_replace("-", "_", $_POST["cat"]);
$tmp = explode ('_', $_POST["cat"]);
$campo_contador = array_shift($tmp);
$marcas["importantes"] = GM_busquedas_motor::obtener_marcas_importantes($campo_contador);
$marcas["todas"] = GM_busquedas_motor::obtener_marcas_motor($campo_contador);
BD::desconectar();
echo json_encode($marcas);
?>