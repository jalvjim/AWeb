<?php
include('../BD.class.php');
include('../GM_busquedas_motor.class.php') ;
require_once ('../GM_general.class.php');
require_once("../../res/modulos_buscadorAv/modulo_cuenta_motor.php");


BD::conectar();

$tmp = explode ('_', $_POST["tipo"]);
$campo_contador = array_shift($tmp);
$IDCategoria = GM_general::obtener_id_categoria($campo_contador);
$paraContar = array('categoria' => $IDCategoria);
$paraContar['marca'] = GM_busquedas_motor::obtener_nombre_marca($_POST['marca']);
if (!empty($_POST["precio_desde"]))
	$paraContar['precio_desde'] = $_POST["precio_desde"];
if (!empty($_POST["anio_desde"]))
	$paraContar['anio_desde'] = $_POST["anio_desde"];

$modelos = array();
$modelos = GM_busquedas_motor::obtener_modelos_motor($paraContar['marca'], $campo_contador);

foreach ($modelos as &$modelo) {
	$paraContar['modelo'] = $modelo['nombre'];
	$listaIDs = contar($paraContar);
	$num = count($listaIDs);
	$modelo["n$campo_contador"] = $num;
}

BD::desconectar();
echo json_encode($modelos);
?>