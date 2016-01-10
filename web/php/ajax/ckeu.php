<?php 
if (!$_POST) exit;
include('../BD.class.php');
include('../GM_usuarios.class.php');
BD::conectar();
echo GM_usuarios::existe($_POST['email']);
BD::desconectar();
?>