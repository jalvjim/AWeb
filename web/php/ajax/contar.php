<?php
	error_reporting(E_ALL);
	ini_set('display_errors','On');
if (!$_POST) exit;
require ("../BD.class.php");
require ("../GM_general.class.php");
require ("../GM_busquedas_motor.class.php");

if (empty($_POST['categoria']) || $_POST['categoria'] == 'motor')
	require ("../../res/modulos_buscadorAv/modulo_cuenta_motor.php");
else if ($_POST['categoria'] == 'inmobiliaria')
	require ("../../res/modulos_buscadorAv/modulo_cuenta_inmobiliaria.php");

$num = array();
$search = json_decode($_POST['search'], true);
//print_r($search);
BD::conectar();

foreach($search as $item) 
	$num[] = number_format(count(contar($item)), 0, ',', '.');

BD::desconectar();
echo json_encode($num);
?>