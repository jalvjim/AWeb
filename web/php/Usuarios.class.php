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
		
		for ($i=0; $i < $long_password; $i++)
			$password .= $diccionario[rand(0, $long_diccionario)];
			
		return $password;
	}
	
	
	
	public static function encontrar_usuario($param) {
		$param["usuario"] = strtolower(trim($param["usuario"]));
		$param["password"] = trim(strtolower($param["password"]));
		
		$sql = "SELECT * FROM ". self::$tbl_usuarios . "
					WHERE email = '{$param['usuario']}' 
					AND password = MD5('{$param['password']}')";
			
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
		if (!$param["email"] || !$param["password"])
			$error = 1;
		else {		
			$usuario = self::encontrar_usuario($param);
			
			if (!$usuario)
				$error = 2;  
			
			if ($usuario["bloqueado"]=='1') $error = 3;
			
			if ($error==0) { //acceso ok
				$_SESSION["usuario_id"] = isset($usuario['id']) ? $usuario["id"] : 0;
				$_SESSION["usuario_nick"]= isset($usuario['usuario']) ? $usuario["usuario"] : '';
				$_SESSION["usuario_nombre"]=isset($usuario['nombre']) ? $usuario["nombre"] : '';
				$expire = time () + (60 * 60 * 24);
				$_SESSION["expire"] = $expire;				
				
				$sql = "Insert into ". self::$tbl_accesos . " (entrada,usuario_id,ip) 
						values (NOW(),'".$_SESSION['usuario_id']."','".$_SERVER['REMOTE_ADDR']."')";
			
				BD::consultar($sql);
				
				//actualizamos ultimo acceso
				$sql = "UPDATE ". self::$tbl_usuarios . "
						SET fecha_ultimoacceso = NOW()
						WHERE id='{$usuario['id']}'";
				
				BD::consultar($sql);
			}
		
			
		}
		
		return $error;
	}
	
	/*
	public static function nuevo_usuario($param) {
		$error = 0;
		
		if (!$param["email"] || !$param["password"])
			$error = 1; // Faltan datos.
		elseif (self::existe($param['email']) > 0)			// Comprobamos que no exista previamente.
			$error = 2;	// Usuario ya existe.
		else {
			
			$param['nombre'] = ucfirst($param['nombre']);
			
			// Pasamos los datos a minúsculas.
			$param['email'] = strtolower($param['email']);
			$param['password'] = strtolower($param['password']);

			if(empty($param['telefono']))
				$param['telefono'] = '';
			if(empty($param['tipo']))
				$param['tipo'] = '';			
			
			// Insertar el registro.
			$sql = "INSERT INTO ". self::$tbl_usuarios . " SET nombre = '{$param['nombre']}', email = '{$param['email']}', password=MD5('{$param['password']}'), telefono = '{$param['telefono']}', tipo = '{$param['tipo']}', fecha_alta = NOW()";
	//		echo $sql;
			BD::consultar($sql);

		
		return $error;
	}*/
	
	public static function existe($usuario) {
		$sql = "SELECT COUNT(*) FROM ". self::$tbl_usuarios . " WHERE usuario = '$usuario'";
		$result = BD::consultar($sql);
		if ($result) {
			$row = mysqli_fetch_row($result);
			mysqli_free_result($result);
			return !empty($row[0]) ? $row[0] : 0;
		} else return 0;
	}
	
	public static function recuperar_password($usuario) {
		
		$error = 0;
		$usuario = strtolower(trim($usuario));
		
		$sql = "SELECT id, nombre FROM " . self::$tbl_usuarios . "
				WHERE usuario = '$usuario'";
			
		$result = BD::consultar($sql);
		$row = mysqli_fetch_array($result);
		mysqli_free_result($result);
		
		if (!$row) {
			$error = 4;
		}
		
		if ($error==0) {				
			$nuevo_password = self::generar_password();
			
			$sql = "UPDATE " . self::$tbl_usuarios . "
						SET password = MD5('{$nuevo_password}')
						WHERE id = '{$row['id']}' LIMIT 1";
			BD::consultar($sql);
			
		
		return $error;
	}

}
?>
