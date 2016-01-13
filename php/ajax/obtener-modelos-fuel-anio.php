<?php
include('../BD.class.php');
include('../GM_busquedas_motor.class.php') ;

//$tmp = explode ('_', $_POST["tipo"]);
//$campo_contador = array_shift($tmp);

$modelos = array();
BD::conectar();
$modelos = GM_busquedas_motor::obtener_modelos_fuel_anio($_POST['marca'], $_POST['anio'], $_POST['combustible']);
BD::desconectar();
echo json_encode($modelos);
?>