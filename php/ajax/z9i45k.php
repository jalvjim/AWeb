<?php 
/* 
	Autor: Vicente Giraldo
	Fecha: 02/12/2015
	Descripción: Envío del formulario de contacto.
*/

if ($_POST) {
	if (!empty($_POST["fContactoEmail"])) exit;	// Honey pot
	require('../GM_usuarios.class.php');
	$params = array('accion' => 'contacto', 'nombre' => $_POST['fContactoNombre'], 'usuario_email' => $_POST['io87d'], 'consulta' => $_POST['fContactoAsunto']);
	echo GM_usuarios::enviar_email($params) ? 1 : 0;
}
?>