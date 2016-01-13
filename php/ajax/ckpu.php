<?php 
if (!$_POST) exit;
include('../BD.class.php');
include('../GM_usuarios.class.php');

$params = array('email' => addslashes($_POST['e']), 'password' => $_POST['p']);
BD::conectar();
$user = GM_usuarios::encontrar_usuario($params);
echo empty($user) ? 0 : json_encode($user);
BD::desconectar();
?>