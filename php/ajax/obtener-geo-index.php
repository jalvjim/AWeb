<?php 

session_start();

require_once "../BD.class.php";
require_once "../GM_general.class.php";


if(isset($_POST['ac']) && $_POST['ac'] == 'inslnk'){

	BD::conectar();

	$provincia = isset($_POST['lc']) ? $_POST['lc'] : 'Madrid';
	
	if(isset($_POST['lat'],$_POST['lon'])){
		$_SESSION['geoposicion']['latitud'] = $_POST['lat'];
		$_SESSION['geoposicion']['longitud'] = $_POST['lon'];
	}

	$sql = "SELECT id, nombre_rr, nombre FROM provincias WHERE nombre_rr = '$provincia'";
	// echo $sql;
	$result = BD::consultar($sql);
	$row = mysqli_fetch_assoc($result);
	$id_provincia = $row['id'];
	$prv_rr = $row['nombre_rr'];
	$provincia = $row['nombre'];

	mysqli_free_result($result);

	$arr = array(
		array('id' => 219),
		array('id' => -3),
		array('id' => 305)
	); //coches, inmobiliaria, motos

	foreach ($arr as &$c) {

		$sql = "SELECT nombre, nombre_rr FROM categorias WHERE id = {$c['id']}";
		$result = BD::consultar($sql);
		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$nombre_rr = $row['nombre_rr'];
			$nombre = $row['nombre'];
			
			mysqli_free_result($result);

			$tbl = 'anuncios';
			$categoria = 'categoria_id2';
			$id = $categoria.'='.$c['id'];

			switch($c['id']){
				case 219:
				case 305:				
					$prefijo = 'm';	
					$c['ads'] = array();
					$c['ads'][] = array('t' => 'Venta de '. $nombre .' en '.$provincia, 'l' => $nombre_rr.'-en-'.$prv_rr.'/');														
				break;
				case -3:
					$tbl = 'anuncios_inmobiliaria';
					$categoria = 'categoria_id';
					$data = array();
					$data = GM_general::obtener_categorias_buscador_principal($c['id']);
					$data = array_merge(GM_general::arrayColumn($data,'id'),array_filter(GM_general::arrayColumn($data,'hijos')));
					$id = $categoria.' IN('.implode(',',$data).')';
					$prefijo = 'i';
					$c['ads'] = array();
					$c['ads'][] = array('t' => 'Venta de Viviendas en '.$provincia, 'l' => 'venta-viviendas-en-'.$prv_rr.'/');
				break;
				default:
				break;
			}
		}

		$sql = "SELECT titulo,id,".$categoria." FROM ".$tbl." WHERE provincia_id = ".$id_provincia." AND ".$id." ORDER BY fecha_creacion DESC LIMIT 3"; 

		$result = BD::consultar($sql);

		if ($result) {
			while($row = mysqli_fetch_assoc($result)){
				$lnk = '/' . GM_general::obtener_nombre_rr_categoria($row[$categoria]) . '/' . GM_general::slugify($row['titulo']) . '-gm' . $prefijo . $row['id'].'.htm';
				$c['ads'][] = array('t' => $row['titulo'], 'l' => $lnk);
			}		
			mysqli_free_result($result);

		} 
		unset($c['id']);				
	}
	BD::desconectar();
	echo json_encode($arr);
}




/*
if(isset($_POST['loca'])){
	
	BD::conectar();

	$loca = $_POST['loca'];

	$tb_anuncios= "anuncios";
	$tb_anuncios_inmobiliaria="anuncios_inmobiliaria";

	$provincia = GM_general::obtener_id_provincia($loca);

	//COCHES
	$categoria="= '219' ";
	$categoria_rr="coches"; 		
	$categoria_id_tb="categoria_id2";
	$pref='m';

	$arr = obtener_enlaces_index($tb_anuncios,$provincia, $categoria, $categoria_id_tb);

	echo "<ul>";
		echo "<li><a href='/coches-en-madrid/' title='Venta de coches en ".$geolocalizacion."'>Venta de coches en ".$geolocalizacion."</a></li>";
		mostrar_enlaces_index($arr,$categoria_rr,$pref);
	echo "</ul>";

	//MOTOS
	$categoria="= '305'";
	$categoria_rr="motos";	


	$arr = obtener_enlaces_index($tb_anuncios,$provincia, $categoria, $categoria_id_tb);

	echo "<ul>";
		echo "<li><a href='/coches-en-madrid/' title='Venta de coches en ".$geolocalizacion."'>Venta de coches en ".$geolocalizacion."</a></li>";
		mostrar_enlaces_index($arr,$categoria_rr,$pref);
	echo "</ul>";



	//INMOBILIARIA
	$categoria="IN(210,2090,2091,2080,2081,2111,2112,2110,2070,2071,212,213,214)"; //Inmo	
	$categoria_rr="inmobiliaria";
	$categoria_id_tb="categoria_id";
	$pref="i";

	$arr = obtener_enlaces_index($tb_anuncios_inmobiliaria,$provincia, $categoria, $categoria_id_tb);

	echo "<ul>";
		echo "<li><a href='/coches-en-madrid/' title='Venta de coches en ".$geolocalizacion."'>Venta de coches en ".$geolocalizacion."</a></li>";
		mostrar_enlaces_index($arr,$categoria_rr,$pref);
	echo "</ul>";


	
	BD::desconectar();
}

		 
*/





/*


function enlaces_default(){
	$cadena='';

	//tablas
	$tb_anuncios= "anuncios";
	$tb_anuncios_inmobiliaria="anuncios_inmobiliaria";
	$geolocalizacion='Madrid';
	$provincia="29"; // Madrid

	//COCHES
	$categoria="= '219' ";
	$categoria_rr="coches"; 		
	$categoria_id_tb="categoria_id2";
	$pref='m';

	$arr = obtener_enlaces_index($tb_anuncios,$provincia, $categoria, $categoria_id_tb);
	$cadena.= "<ul>";
		//echo "<li><a href='/coches-en-madrid/' title='Venta de coches en ".$geolocalizacion."'>Venta de coches en ".$geolocalizacion."</a></li>";
		//mostrar_enlaces_index($arr,$categoria_rr,$pref);
	$cadena.= "</ul>";
	
	//MOTOS
	$categoria="= '305'";
	$categoria_rr="motos";	
	$arr = obtener_enlaces_index($tb_anuncios,$provincia, $categoria, $categoria_id_tb);
	$cadena.= "<ul>";
		//echo "<li><a href='/motos-en-madrid/' title='Venta de motos en ".$geolocalizacion."'>Venta de motos en ".$geolocalizacion."</a></li>";
		//mostrar_enlaces_index($arr,$categoria_rr,$pref);
	$cadena.= "</ul>";

	//INMOBILIARIA
	$categoria="IN(210,2090,2091,2080,2081,2111,2112,2110,2070,2071,212,213,214)"; //Inmo	
	$categoria_rr="inmobiliaria";
	$categoria_id_tb="categoria_id";
	$pref="i";
	$arr = obtener_enlaces_index($tb_anuncios_inmobiliaria,$provincia, $categoria, $categoria_id_tb);
	$cadena.= "<ul>";
		//echo "<li><a href='/viviendas-en-madrid/' title='Venta de inmuebles en ".$geolocalizacion."'>Venta de inmuebles en ".$geolocalizacion."</a></li>";
		//mostrar_enlaces_index($arr,$categoria_rr,$pref);
	$cadena.= "</ul>";

	//$('#div1').innerHTML($cadena);
	
}
function obtener_enlaces_index($tabla,$provincia, $categoria, $categoria_id_tb) {
	 
	$data = array();
	$sql = "SELECT titulo,id,".$categoria_id_tb." FROM ".$tabla." WHERE provincia_id = ".$provincia." and ".$categoria_id_tb." ".$categoria." ORDER BY fecha_creacion DESC LIMIT 3"; 

	$result = BD::consultar($sql);

	if ($result) {
		while($row = mysqli_fetch_assoc($result))
			$data[] = $row;
		
		mysqli_free_result($result);
		return $data;
	} 				

}

function mostrar_enlaces_index($arr,$categoria_rr,$pref){

	foreach ($arr as $key => $value) 
	{
		if($pref=='i')
			$categoria_rr = GM_general::obtener_nombre_rr_categoria($arr[$key]['categoria_id']);
		
		echo "<li><a href='/". $categoria_rr ."/".GM_general::slugify($arr[$key]['titulo'])."-gm".$pref.''.$arr[$key]['id'].".htm' title='".$arr[$key]['titulo']."'>".$arr[$key]['titulo']."</a></li>";
	}
}*/
?>