<?php
	include('../../../php/BD.class.php');
	include('../../../php/Area_personal.class.php') ;

	BD::conectar();
	
	if(!empty($_POST['provincia_id'])) {
		$localidades=Area_personal::obtenerLocalidades($_POST['provincia_id']);

		echo'<option value="0">Seleccione Localidad</option>';

		foreach($localidades as $l) {

			echo '<option value="' . $l['id'] . '">' . $l['nombre'] . '</option>';

		}
	}

	BD::desconectar();
?>