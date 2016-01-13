<?php
// Dependencias: php/BD.class.php

class Principal {
	private static $tblInterfaces = 'Interfaces';
	private static $tblMedidas = 'Medidas';
	private static $tblDispositivos = 'Dispositivos';
	private static $tblUsuarios = 'Usuarios';

	public static function obtenerDatosUsuario($idUsuario) {

		$result = BD::consultar("SELECT * FROM " . self::$tblUsuarios . " WHERE id='" . $idUsuario . "'");
		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}

	}

	public static function actualizarDatosUsuario($datos, $idUsuario) {

		$result = BD::consultar("UPDATE " . self::$tblUsuarios . " SET nombre = '" . $datos['nombre'] . ", apellidos=" . $datos['apellidos'] . "', usuario='" . $datos['usuario'] . "' WHERE id='" . $idUsuario . "'");

		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
		}
		return $nuevos;
	}

	public static function actualizarPassword($old, $new, $idUsuario) {
		if ($new == $_POST['confirpass']) {
			echo "Contraseña confirmada";
			$result = BD::consultar("UPDATE " . self::$tblUsuarios . " SET password ='" . md5($new) . "' WHERE password='" . md5($old) . "' AND id='" . $idUsuario . "'");

			if ($result) {
				while ($row = mysqli_fetch_assoc($result)) {
					$data[] = $row;
				}

				mysqli_free_result($result);
				print_r('\n' . $data);
				return 1;

			}
		} else {
			print_r("ERROR. La nueva contraseña no coincide");
			return 0;
		}

	}

	public static function obtenerDispositivos($idUsuario) {
		$result = BD::consultar("SELECT id, nombre FROM " . self::$tblDispositivos);
		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}

	}

	public static function obtenerInterfacesPorDispositivo($idDispositivo) {
		$result = BD::consultar("SELECT * FROM " . self::$tblInterfaces . " WHERE id_dispositivo='" . $idDispositivo . "'");
		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}

	}

	public static function obtenerInterfaces() {
		$result = BD::consultar("SELECT * FROM " . self::$tblInterfaces);
		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}
	}

	public static function obtenerMedidasPorDispositivo($idDispositivo) {
		$result = BD::consultar("SELECT id FROM " . self::$tblMedidas . " WHERE id_dispositivo='" . $idDispositivo . "'");
		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}

	}

	public static function obtenerTodasLasMedidas() {
		$result = BD::consultar("SELECT * FROM " . self::$tblMedidas);
		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}

	}
	public static function obtenerUltimasMedidas() {
		$result = BD::consultar("SELECT * FROM " . self::$tblMedidas . " ORDER BY fecha LIMIT 50");
		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}

	}

	public static function contarDispositivos() {

		$result = BD::consultar("SELECT COUNT(*) FROM " . $tblDispositivos . "");

		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}

	}

	public static function contarNuevasMedidas() {

		$result = BD::consultar("SELECT COUNT(*) FROM " . $tblMedidas . " WHERE vista='0'");

		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}

	}

	public static function ponerMedidasA1() {

		$result = BD::consultar("UPDATE " . $tblMedidas . "SET vista='1'  WHERE vista='0'");

		if ($result) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

			mysqli_free_result($result);
			return empty($data) ? 0 : $data;
		} else {
			return 0;
		}
	}

	public static function insertarDispositivo($param) {

		if (empty($param['ubicacion'])) {
			$param['ubicacion'] = '';
		}

		if (empty($param['descripcion'])) {
			$param['descripcion'] = '';
		}

		if (empty($param['coordKML'])) {
			$param['coordKML'] = '';
		}

		if (empty($param['active'])) {
			$param['active'] = '';
		}

		$sql = "INSERT INTO " . self::$tblDispositivos . " SET ubicacion = '" . $param['ubicacion'] . "', descripcion = '" . $param['descripcion'] . "', coordKML='" . $param['coordKML'] . "', active='" . $param['active'] . "'";

		$result = BD::consultar($sql);

		if ($result) {
			echo $result;
			return 1;
		} else {
			return 0;
		}

	}

	public static function insertarMedida($param) {

		if ($param['temp_hum'] == "temp") {
			$temp = $param['valor'];
			$hum = "";
		} elseif ($param['temp_hum'] == "hum") {
			$hum = $param['valor'];
			$temp = "";
		}

		if ($param['fecha'] == "" || empty($param['fecha'])) {
			$param['fecha'] = "";
		}

		$sql = "INSERT INTO " . self::$tblMedidas . " SET temperatura='" . $temp . "', humedad='" . $hum . "', id_interfaz='" . $param['id'] . "', fecha='" . $param['fecha'] . "', vista='0'";

		$result = BD::consultar($sql);

		if ($result) {
			echo $result;
			return 1;
		} else {
			return 0;
		}

	}

	public static function comprobarActualizacion($nombre, $ruta) {

		// comprobamos si lo que nos pasan es un direcotrio
		$flag = false;
		if (is_dir($ruta)) {
			// Abrimos el directorio y comprobamos que
			if ($aux = opendir($ruta)) {
				while (($archivo = readdir($aux)) !== false) {
					if ($archivo != "." && $archivo != "..") {
						$ruta_completa = $ruta . '/' . $archivo;

						if (is_dir($ruta_completa)) {
							comprobarActualizacion($nombre, $ruta_completa . "/");
						} else {
							if ($ruta_completa > $nombre) {

								$nombre = $ruta_completa;
								$nombre_fichero = $archivo;
								$flag = true;

							}
						}
					}
				}

				closedir($aux);
				if ($flag) {
					self::descargar($nombre, $nombre_fichero);
				}

			}
		} else {
			echo $ruta;
			echo "<br />No es ruta valida";
		}
	}

	public static function descargar($file, $name) {
		if (empty($file) || !isset($file)) {
			exit();
		}
		$root = "/var/www/html/web/php/";
		$path = $root . $file;
		$type = '';

		if (is_file($path)) {
			$size = filesize($path);
			if (function_exists('mime_content_type')) {
				$type = mime_content_type($path);
			} else if (function_exists('finfo_file')) {
				$info = finfo_open(FILEINFO_MIME);
				$type = finfo_file($info, $path);
				finfo_close($info);
			}
			if ($type == '') {
				$type = "application/force-download";
			}
			// Definir headers
			header("Content-Type: $type");
			header("Content-Disposition: attachment; filename=$name");
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: " . $size);
			// Descargar archivo
			readfile($path);
		} else {
			echo $path;
			die("El archivo no existe.");
		}
	}
}

?>