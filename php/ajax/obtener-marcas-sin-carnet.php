<?php
include('../BD.class.php');
include('../GM_busquedas_motor.class.php') ;
require_once("../../res/modulos_buscadorAv/modulo_cuenta_motor.php");

BD::conectar();
$marcas = GM_busquedas_motor::obtener_marcas_motor("sincarnet");

$configCuenta = array('categoria' => 224, 'marca' => '');
if (!empty($_POST['precio_desde']))
	$configCuenta['precio_desde'] = $_POST['precio_desde'];

foreach ($marcas as &$marca) {
	$configCuenta['marca'] = $marca['nombre'];
	$marca['contador'] = count(contar($configCuenta));
}

BD::desconectar();
echo json_encode($marcas);
?>