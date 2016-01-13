<?php
if (!$_POST) exit;
require ("../BD.class.php");
require ("../GM_general.class.php");

if (empty($_POST['categoria']) || $_POST['categoria'] == 'motor') {
	require ("../GM_busquedas_motor.class.php");
	require ("../../res/modulos_buscadorAv/modulo_cuenta_motor.php");
}
else if ($_POST['categoria'] == 'inmobiliaria')
	require ("../../res/modulos_buscadorAv/modulo_cuenta_inmobiliaria.php");
unset($_POST['categoria']);

BD::conectar();
$data = array();
$data['categoria'] = GM_general::obtener_id_categoria($_POST['url']);
unset($_POST['url']);
foreach ($_POST as $key => $value)
	$data[$key] = $value;
echo count(contar($data));
BD::desconectar();
?>