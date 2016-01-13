<?php
if ($_POST) {
	if (!empty($_POST['user_email2'])) echo -1;
	require('../BD.class.php');
	require('../GM_usuarios.class.php');
	BD::conectar();
	echo GM_usuarios::recuperar_password($_POST['em']);
	BD::desconectar();
} else echo -1;
?>