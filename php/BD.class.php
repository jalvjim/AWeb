<?php

class BD {
	private static $link = null;
	private static $basedatos = "Proyecto";
	private static $user = "root";
	private static $password = "ubuntu";

	public static function conectar() {
		self::$link = mysqli_connect("localhost", self::$user, self::$password, self::$basedatos) or die(mysqli_connect_error());
		mysqli_query(self::$link, "SET NAMES utf8");
	}

	public static function get_link() {return self::$link;}

	public static function consultar($sql) {

		if (isset($_GET["sql"])) {
			echo "<p>$sql</p>";
		}

		$result = mysqli_query(self::$link, $sql) or die("Fallo en la consulta: " . $sql);
		unset($sql);
		return $result;
	}

	public static function backup($tables = '*') {
		ini_set('memory_limit', '2048M');
		set_time_limit(0);
		$folder = dirname(__FILE__) . "/../backup";
		$file = 'backup' . date("Ymd");

		if (!file_exists("$folder/$file")) {
			echo "creando $folder/$file";
			$old_mask = umask(0);
			mkdir("$folder/$file", 0757);
			umask($old_mask);
		}

		if ($tables == '*') {
			$tables = array();
			$result = self::consultar('SHOW TABLES FROM Proyecto');
			while ($row = mysqli_fetch_row($result)) {
				$tables[] = $row[0];
			}

		} else {
			$tables = is_array($tables) ? $tables : explode(',', $tables);
		}

		foreach ($tables as $table) {
			$return = '';
			$result = self::consultar('SELECT * FROM ' . $table);
			$num_fields = mysqli_num_fields($result);
			$row2 = mysqli_fetch_row(self::consultar('SHOW CREATE TABLE ' . $table));
			$return .= "\n\n" . $row2[1] . ";\n\n";

			for ($i = 0; $i < $num_fields; $i++) {
				while ($row = mysqli_fetch_row($result)) {

					$return .= 'INSERT INTO ' . $table . ' VALUES(';
					for ($j = 0; $j < $num_fields; $j++) {
						$row[$j] = addslashes($row[$j]);
						$row[$j] = preg_replace("/\n/", "\\n", $row[$j]);
						if (isset($row[$j])) {$return .= '"' . $row[$j] . '"';} else { $return .= '""';}
						if ($j < ($num_fields - 1)) {$return .= ',';}
					}
					$return .= ");\n";
				}
			}
			$return .= "\n\n\n";
			//save file
			$handle = fopen("$folder/$file/$table.sql", 'w+');
			if (fwrite($handle, $return)) {
				echo "Tabla: $table guardada correctamente en $folder/$table.sql.";
			} else {
				echo "No se pudo hacer la copia para la tabla $table";
			}

		}
		fclose($handle);
		return $file;
	}

	public static function zip($file, $remove_source = 0) {
		include_once 'pclzip.lib.php';
		$folder = dirname(__FILE__) . "/../backup";
		$zipname = "$file.zip";
		$archivo_zip = new PclZip("$folder/$zipname");

		$comprimido = $archivo_zip->create($folder);

		if ($comprimido == 0) {
			echo "\nOcurri&oacute; un error al generar el archivo $zipname";
		} else {
			echo "\nArchivo $zipname creado correctamente";
		}

		if ($remove_source == 1) {
			if (rmdir($folder . '/' . $file)) {
				echo "\nSe ha eliminado $folder/$file";
			} else {
				echo "\nError al eliminar $folder/$file";
			}

		}
		//$this -> saveLog(0, "<a href='$zipname'>Descargar copia de seguridad</a>");
		// Forzar la descarga del archivo comprimido
		/*
		$tam = filesize($zipname);
		header('Content-type: application/zip');
		header('Content-Length: ' . $tam);
		header('Content-Disposition: attachment; filename='.($zipname));
		readfile($zipname);

		if (file_exists($zipname) && is_writable($zipname))
			unlink($zipname);
		*/
	}

	public static function ultimo_id() {
		return mysqli_insert_id(self::$link);
	}

	public static function desconectar() {
		mysqli_close(self::$link);
	}
}
?>
