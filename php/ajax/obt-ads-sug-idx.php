<?php

    error_reporting(E_ALL & ~E_STRICT);
    ini_set('display_errors', 1);

session_start();

require_once "../BD.class.php";
require_once "../GM_general.class.php";

if(isset($_POST['upad'],$_POST['categoria'],$_POST['blq']) && in_array($_POST['upad'],array('lad','act'))){
	$opcion = $_POST['upad'];
	define("N_ADS",10);
	$categoria = $_POST['categoria'];

	if($_POST['lat'] !== '' && $_POST['lon'] !== ''){
		$_SESSION['geoposicion']['latitud'] = $_POST['lat'];
		$_SESSION['geoposicion']['longitud'] = $_POST['lon'];
	}

	BD::conectar();

	$cat_hj = array();
	$cat_hj = GM_general::obtener_categorias_buscador_principal($categoria);
	$cat_hj = array_merge(GM_general::arrayColumn($cat_hj,'id'),array_filter(GM_general::arrayColumn($cat_hj,'hijos')));

	switch($categoria){
		case -2:
			require_once "../GM_busquedas_motor.class.php";
			$cat = 'categoria_id2';
			$prefijo = 'm';
			$tbl = 'anuncios';
		break;
		case -3:
			require_once "../GM_busquedas_inmo.class.php";
			$cat = 'categoria_id';
			$prefijo = 'i';
			$tbl = 'anuncios_inmobiliaria';
		break;
		default:
			require_once "../GM_busquedas_motor.class.php";
		break; 
	}

	$id = $cat.' IN('.implode(',',$cat_hj).')';

	switch($_POST['blq']){
		case 'ce':
			$sql = "SELECT titulo,id,precio,".$cat.",localidad_id,provincia_id,latitud,longitud,
					(((acos(sin(('{$_SESSION['geoposicion']['latitud']}'*pi()/180)) * sin((latitud*pi()/180))+cos(('{$_SESSION['geoposicion']['latitud']}'*pi()/180)) * cos((latitud*pi()/180)) * cos((('{$_SESSION['geoposicion']['longitud']}' - longitud)*pi()/180))))*180/pi())*60*1.1515) AS distancia
					FROM ".$tbl." WHERE ".$id." ORDER BY distancia ASC LIMIT ".N_ADS; 		
		break;		
		case 'au':
			$sql = "SELECT titulo,id,precio,".$cat.",localidad_id,provincia_id FROM ".$tbl." WHERE ".$id." ORDER BY fecha_creacion DESC LIMIT ".N_ADS; 
		break;
	}

	$result = BD::consultar($sql);
	$str = '';

	if($opcion == 'lad'){
		$str .= '
	    <div class="blqsug anunciosCerca ac">
	          
	        <div class="selectsTop stac">
	            
	            <div class="izTp">
	                <span href="#">Anuncios cerca de tí</span>
	                <select class="slTpIzq slac">
	                    <option value="-2">Motor</option>
	                    <option value="-3">Inmobiliaria</option>
	                    <option>Trabajo</option>
	                    <option>Etc.</option>
	                </select>
	            </div><!--
	            
	            --><div class="drTp">
	                <a href="#" class="vrTp">Ver todos <i class="fa fa-angle-double-right"></i></a>
	                <!--<a href="#" class="navTp desNav iz"><i class="fa fa-chevron-left"></i></a>
	                <a href="#" class="navTp de"><i class="fa fa-chevron-right"></i></a>-->
	            </div>
	            
	        </div>
	        
	        <div class="formaFichas">
	            
	            <div class="grupoFichasTop gftac">';		
	}

	if ($result) {
		while($row = mysqli_fetch_assoc($result)){
			$str .=
                '<div class="fichaInfo">
                    <div class="listaFichaIzq">';	

			$ficha = '/' . GM_general::obtener_nombre_rr_categoria($row[$cat]) . '/' . GM_general::slugify($row['titulo']) . '-gm' . $prefijo . $row['id'].'.htm';			
			switch($categoria){
				case -2:
					$img_arr = GM_busquedas_motor::obtener_fotos_anuncio($row['id']);
				break;
				case -3:
					$img_arr = GM_busquedas_inmo::obtener_fotos_anuncio($row['id']);
				break;
				default:
					$img_arr = GM_busquedas_motor::obtener_fotos_anuncio($row['id']);
				break;
			}
			
			if(empty($img_arr))
				$img = '/img/templates/no-foto.gif';
			else
				$img = "/img/img_anuncios/".$img_arr[0]['url'];

			$precio = number_format($row['precio'],0,',','.');

			if($_POST['blq'] == 'ce'){
				if ($row['latitud'] != 0 && $row['longitud'] != 0) {
					if ($row['distancia'] > 1)
						$distancia = number_format($row['distancia'], 0, ",", ".") . " Kms.";
					else if ($row['distancia'] > 0)
						$distancia = number_format($row['distancia']*1000, 0, ",", ".") . " m";
				}
				else
					$distancia = 'No disponible';				
				$localidad = GM_general::obtener_nombre_localidad($row['localidad_id']);
				$localidad = str_replace(' Capital','',$localidad) . ' ';
				
				$nombre_provincia = GM_general::obtener_nombre_provincia($row['provincia_id']);
				// $localizacion = $localidad . '(' . $nombre_provincia['nombre'] . ') '. $distancia;
				$localizacion = $localidad . ' a '. $distancia; 
			}
			else{
				$localidad = GM_general::obtener_nombre_localidad($row['localidad_id']);
				if($localidad === 0)
					$localidad = '';
				else
					$localidad = str_replace(' Capital','',$localidad) . ' ';
				
				$nombre_provincia = GM_general::obtener_nombre_provincia($row['provincia_id']);
				$localizacion = $localidad . '(' . $nombre_provincia['nombre'] . ') ';
			}

		$str .=
                        '<div class="fotoGrande">            
                            <a href="'.$ficha.'">
                                <img src="'.$img.'" alt="'.$row['titulo'].'">   
                                <div class="precioVisual">
                                    <span class="precioDer">'.$precio.'&euro;</span>
                                </div>
                            </a>
                        </div>
                        <h2><a href="'.$ficha.'">'.$row['titulo'].'</a></h2> 
                    </div><!--
         		--><div class="listaFichaDer">
         		        <div class="datoMas">
                            <span class="datoAdd">-- A definir --</span>                                    
                        </div>

                        <div class="localizador">

                            <i class="fa fa-map-marker"></i> '.$localizacion.'

                        </div>

                    </div>

                </div>';
		}		
		mysqli_free_result($result);
	} 	

	if($opcion == 'lad'){
		$str .=
	            '</div>
	        
	        </div>
	         
	    </div>';
    }
    BD::desconectar();
    echo $str; 

}


?>