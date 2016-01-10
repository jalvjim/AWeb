<?php 
include('../BD.class.php');
include('../GM_busquedas_motor.class.php');
BD::conectar();
$anios = GM_busquedas_motor::obtener_anio_inicio_fin_marca($_POST['marca']);
BD::desconectar();
echo $anios == 0 ? 0 : json_encode($anios);
?>