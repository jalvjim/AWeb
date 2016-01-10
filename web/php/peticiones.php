<?php

header('Location: http://localhost/web/interfaz/index.php');

class Peticiones {
	private static $tblInterfaces = 'Interfaces';
	private static $tblMedidas = 'Medidas';
	private static $tblDispositivos = 'Dispositivos';
	private static $tblUsuarios = 'Usuarios';

	public static function recuperarFicheros() {

		$result = BD::consultar("SELECT ip FROM " . self::$tblInterfaces);

		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			mysqli_free_result($result);
		}

		$i=0;
		while ($i<count($data[])){

			exec("wget -r http:" . $data[$i] . " -P /var/www/html/web/files {
				# code...
			}");
			i++;
		}
	}

	public static function (){

	}
}

?>