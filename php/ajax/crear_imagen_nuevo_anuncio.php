<?php

session_start();

    error_reporting(E_ALL & ~E_STRICT);
    ini_set('display_errors', 1);


require '../Imagen.class.php';

define ('PATH_IMG', '../../img/img_anuncios/tmp/');

if(isset($_POST['action'])){

	switch ($_POST['action']){
		case 'delete':
			if(isset($_POST['name'])){
				$name_path = $_POST['name'];
				$name_arr = explode('/',$name_path);
				$name = 'thumbs'.DIRECTORY_SEPARATOR.end($name_arr);
				$name_arr[count($name_arr)-1] = $name;

				$path = PATH_IMG.$name_path;
				$path_thumbs = PATH_IMG.implode('/',$name_arr);
				// echo $path;
				if(file_exists($path)){
					unlink($path);
					unlink($path_thumbs);

					//borrar la< imagen de la sesión
					foreach ($_SESSION['nuevo_anuncio']['img'] as $key => $i) {						
						if($i['nombre'] == $name_path){
							unset($_SESSION['nuevo_anuncio']['img'][$key]);
						    if(empty($_SESSION['nuevo_anuncio']['img']))
						    	unset($_SESSION['nuevo_anuncio']['img']);

						    $_SESSION['nuevo_anuncio']['img'] = array_values($_SESSION['nuevo_anuncio']['img']);
						    break;							
						}
					}
					return 1;
				}
				else{
					return 0;
				}
			}
		break;
		case 'upload':
			$data = 0;
			if(!isset($_SESSION['nuevo_anuncio']['img']))
				$_SESSION['nuevo_anuncio']['img'] = array();

			if(!empty($_FILES)){
				// print_r($_FILES);

				$files = $_FILES['file'];
				$n = count($files['name']);
				$time = date('Y/m/d').DIRECTORY_SEPARATOR;
				$path_aux = PATH_IMG.$time;
				// for ($i = 0; $i < $n; $i++) {
					// $tam = $files['size'][$i];
					// echo $files['name'][$i];

					// $nombre = explode('.',$files['name'][$i]);
					$tam = $files['size'];
					$nombre = explode('.',$files['name']);

					// $foto_name = $nombre[0] . '_'; 
					$tipo = end($nombre);
					// $foto_name .= $i+1 . '-' . rand(1000, 99999).'.'.$tipo;
					$foto_name = rand(1000, 99999).time().'.'.$tipo;
					// echo $foto_name;
					// $foto_tmp = $files['tmp_name'][$i];
					$foto_tmp = $files['tmp_name'];
					$path = $path_aux.$foto_name;
					$path_thumbs = $path_aux.'thumbs'.DIRECTORY_SEPARATOR.$foto_name;

					if (!file_exists($path_aux)) 
						if (!mkdir($path_aux, 0757, true)) 
							return $data;
							// echo "ERROR: No se pudo crear la carpeta '$path_aux'";					
										
					if (!file_exists($path_aux . 'thumbs')) 
						if (!mkdir($path_aux . 'thumbs', 0757))	
							return $data;
							// echo "ERROR: No se pudo crear la carpeta '$path_aux/thumbs'";
						// echo $path;
					if(move_uploaded_file($foto_tmp, $path)){
						// $nombre_archivo = $this -> slugify($anuncio -> titulo);
						// $nombre_archivo .= '_' . $i+1 . '-' . rand(1000, 99999) . '.jpg';
						// $sql = "INSERT INTO {$this -> tabla_imagenes_inmobiliaria} SET url = '$ruta_aux/" . $nombre_archivo ."', anuncio_id = 'id'";

						$_SESSION['nuevo_anuncio']['img'][] = array('nombre' => $time.$foto_name, 'size' => $tam);

						if(copy($path,$path_thumbs)){ //thumbs
							if(!Imagen::redimensionar($path_thumbs,MAX_WIDTH_THUMBS,MAX_HEIGHT_THUMBS)){						
								unlink($path);		
								return 0;
							}
						}

						Imagen::redimensionar($path,MAX_WIDTH,MAX_HEIGHT);
						Imagen::watermark($path);
						$data = $time.$foto_name;
						// echo $data;
					}
					else{
						unlink($path);	
						return 0;
					}
				// }
				echo $data;
			}
			else
				return 0;
		break;
		default: return 0; break;
	}

}
else
	return 0;


?>
