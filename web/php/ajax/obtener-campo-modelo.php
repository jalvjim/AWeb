<?php
include('../BD.class.php');
include('../GM_busquedas_motor.class.php') ;

$modelos = array();
BD::conectar();
if ($_POST["campo"] == 'cc')
	$modelos = GM_busquedas_motor::obtener_cilindrada_modelo($_POST['marca'], $_POST['anio'], $_POST['combustible'], $_POST['modelo']);
else if ($_POST["campo"] == 'carroceria')
	$modelos = GM_busquedas_motor::obtener_carroceria_modelo($_POST['marca'], $_POST['anio'], $_POST['combustible'], $_POST['modelo']);
BD::desconectar();
echo json_encode($modelos);
?>