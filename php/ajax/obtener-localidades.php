<?php
if (!$_POST) exit;
include('../BD.class.php');
include('../GM_general.class.php') ;
$idProvincia = addslashes($_POST['pid']);
BD::conectar();
$localidades = GM_general::obtener_localidades($idProvincia, 1);
BD::desconectar();
echo json_encode($localidades);
?>