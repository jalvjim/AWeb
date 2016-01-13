<?php 
// 16/10/2015 Vicente Giraldo: Creación del fichero.
if (!$_POST) exit;
require ('../BD.class.php');
require ('../GM_general.class.php');
BD::conectar();
$marcas = GM_general::obtener_todas_marcas($_POST['p'], $_POST['c']);
BD::desconectar();
echo json_encode($marcas);
?>