<?php

class Usuarios {

	private static $tblInterfaces = 'Interfaces';
	private static $tblMedidas = 'Medidas';
	private static $tblDispositivos = 'Dispositivos';
	private static $tblUsuarios = 'Usuarios';

	public static function leer_json($archivo) {
		$string = file_get_contents("json/{$archivo}.json");
		return json_decode($string);
	}

	private static function generar_password() {
		$long_password = 5;
		$password = "";
		$diccionario = "abcdefghijklmnopqrstuvwxyz0123456789";
		$long_diccionario = strlen($diccionario) - 1;

		for ($i = 0; $i < $long_password; $i++) {
			$password .= $diccionario[rand(0, $long_diccionario)];
		}

		return $password;
	}

	public static function encontrar_usuario($param) {
		$param['usuario'] = strtolower(trim($param['usuario']));
		$param['password'] = trim(strtolower($param['password']));

		$sql = "SELECT * FROM " . self::$tblUsuarios . "
					WHERE usuario='" . $param['usuario'] . "'
					AND password='" . MD5($param['password']) . "'";

		$result = BD::consultar($sql);

		$row = mysqli_fetch_array($result);

		mysqli_free_result($result);

		return $row;
	}

	public static function login_usuarios($param) {
		/*
			Fecha de Creación: 29/12/2015
			Autor: Jaime

			Busca a un usuario en el sistema y activa la sesión si lo encuentra o bien retorna error
			Parámetros de entrada:
				$param: vector asociativo con los datos de email y password del usuario que quiere hacer log en el sistema
			Modifica:
				$_SESSION con los datos del usuario
				Tabla Accesos de la BD con los datos del usuario que hace login
				Tabla Usuario de la BD con la fecha del ultimo acceso.
				Tabla Errores de ls BD si se localiza un fallo durante el proceso
			Retorna:
				$error: 0 si no hay fallo, (int) si hay error.
			Códigos de error devueltos:
				0 : exito.
				1 : Falta email o password.
				2 : Login incorrecto.
				3 : Usuario bloqueado.
		*/

		$error = 0;
		if (!$param['usuario'] || !$param['password']) {
			$error = 1;
		} else {
			$usuario = self::encontrar_usuario($param);

			if (!$usuario) {
				$error = 2;
			}

			if ($error == 0) {
				//acceso ok
				$_SESSION['usuario_id'] = isset($usuario['id']) ? $usuario['id'] : 0;
				$_SESSION['usuario_nick'] = isset($usuario['usuario']) ? $usuario['usuario'] : '';
				$_SESSION['usuario_nombre'] = isset($usuario['nombre']) ? $usuario['nombre'] : '';
				$expire = time() + (60 * 60 * 24);
				$_SESSION['expire'] = $expire;

			}

		}

		return $error;
	}

	public static function nuevo_usuario($param) {
		$error = 0;

		if (!$param['usuario'] || !$param['password']) {
			$error = 1;
		}
		// Faltan datos.
		elseif (self::existe($param['usuario']) > 0) // Comprobamos que no exista previamente.
		{
			$error = 2;
		}
		// Usuario ya existe.
		else {

			$param['nombre'] = ucfirst($param['nombre']);

			// Pasamos los datos a minúsculas.
			$param['usuario'] = strtolower($param['usuario']);
			$param['password'] = strtolower($param['password']);

			if (empty($param['apellidos'])) {
				$param['apellidos'] = '';
			} else {
				$param['apellidos'] = ucfirst($param['apellidos']);
			}

			// Insertar el registro.
			$sql = "INSERT INTO " . self::$tblUsuarios . " SET nombre = '" . $param['nombre'] . "', apellidos = '" . $param['apellidos'] . "', password='" . MD5($param['password']) . "', usuario='" . $param['usuario'] . "'";
			//		echo $sql;
			BD::consultar($sql);
		}

		return $error;
	}

	private static function existe($usuario) {
		$sql = "SELECT COUNT(*) FROM " . self::$tblUsuarios . " WHERE usuario='" . $usuario . "'";
		$result = BD::consultar($sql);
		if ($result) {
			$row = mysqli_fetch_row($result);
			mysqli_free_result($result);
			return !empty($row[0]) ? $row[0] : 0;
		} else {
			return 0;
		}

	}

}

include 'BD.class.php';
BD::conectar();
$param['usuario'] = "jaimeal";
$param['nombre'] = "Jaime";
$param['password'] = "asdfg";

Usuarios::nuevo_usuario($param);
BD::desconectar();
?>
