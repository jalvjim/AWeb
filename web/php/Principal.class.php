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

	public static function obtenerInterfaces($idDispositivo) {
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

	public static function obtenerMedidas($idDispositivo) {
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
		$result = BD::consultar("SELECT id FROM " . self::$tblMedidas);
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
		$result = BD::consultar("SELECT id FROM " . self::$tblMedidas . " ORDER BY fecha LIMIT 50");
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

	public static function obtenerIdLocalidad($nombre, $id_provincia) {
		$result = BD::consultar("SELECT id FROM " . self::$tblLocalidades . " WHERE nombre='" . $nombre . "' AND id_provincia='" . $id_provincia . "'");
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

		$result = BD::consultar("SELECT COUNT(*) FROM " . $tblMedidas . " WHERE nuevo='1'");

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

	public static function ponerMedidasA0() {

		$result = BD::consultar("UPDATE " . $tblMedidas . "SET nuevo='0'  WHERE nuevo='1'");

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

}

?>