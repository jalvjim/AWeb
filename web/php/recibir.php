<?php

include 'Principal.class.php';
include 'BD.class.php';

print_r($_GET);

if (isset($_GET)) {
	BD::conectar();

	Principal::insertarMedida($_GET);

	BD::desconectar();

}

?>