<?php
require_once "../BD.class.php";
require_once "../GM_general.class.php";

/*    error_reporting(E_ALL & ~E_STRICT);
    ini_set('display_errors', 1);*/


if(isset($_GET['search'])){
	$search = filter_input(INPUT_POST,'search', FILTER_SANITIZE_STRING);
	search($search);
}
else
if(isset($_GET['load_category'])){
	$categoria = $_GET['load_category'];
	$cat = array();

	BD::conectar();
	$cat['chd'] = GM_general::obtener_categorias_buscador_principal($categoria);

	$cat['pat'] = array();
	$parr = $cat['chd'][0]['nombre_rr'];
		
	do {
		$categoria_padre = GM_general::obtener_padre_categoria($parr);
		if (!empty($categoria_padre['nombre_rr'])) {
			$cat['pat'][] = $categoria_padre;
			$parr = $categoria_padre['nombre_rr'];
		}
	} while (!empty($categoria_padre['nombre_rr']));

	$cat['pat'] = array_reverse($cat['pat']);

	BD::desconectar();
	foreach($cat['chd'] as &$c) 
		$c['hijos'] = empty($c['hijos']) ? 'no' : 'si';

	echo json_encode($cat);

}
else
if(isset($_POST['keyword'], $_POST['ctg'])){ //Obtenemos la palabra a buscar 

	$keyword = filter_input(INPUT_POST,'keyword', FILTER_SANITIZE_STRING);
	$categoria = filter_input(INPUT_POST,'ctg', FILTER_SANITIZE_NUMBER_INT);

	$datos = array("k" => $keyword, "e" => 0);
	 
	BD::conectar();
	$datos['sugerencias'] = obtener_sugerencias_diccionario($keyword);

	// print_r($arr);

	if(!empty($datos['sugerencias'])){
		foreach ($datos['sugerencias'] as $k => &$s) {
			$sql = "SELECT nombre, nombre_rr, padre, id, hijos FROM categorias WHERE id IN(".$s['categorias_relevantes'].") ORDER BY FIELD(id,".$s['categorias_relevantes'].")"; 
			$result = BD::consultar($sql);
	 		// echo $sql;
	 		$data = array();
			if ($result) {
				while($row = mysqli_fetch_assoc($result)){
					$padre = GM_general::obtener_padre_categoria($row['nombre_rr']);
					$row['pa_nombre_rr'] = $padre['nombre_rr'];
					$row['pa_nombre'] = $padre['nombre'];
					$data[] = $row;
				}
				
				mysqli_free_result($result);
			} 

			if(!empty($data)){			
				$s['data-cat'] = $data;
				$datos['e'] = 1;
				// print_r($arr);	
				// ins_sugerencias($data,$keyword,$datos['sugerencias'][0]['palabra']);
			}
		}

		
	}
		
	BD::desconectar();	
	echo json_encode($datos);

}


function obtener_sugerencias_diccionario($keyword){
	$data = array();

	 	$sql = "SELECT * FROM diccionario_sugerencias WHERE palabra LIKE '$keyword%' ORDER BY relevancia DESC LIMIT 5"; 

	 	// echo $sql;
		$result = BD::consultar($sql);
 
		if ($result) {
			while($row = mysqli_fetch_assoc($result))
				$data[] = $row;
			
			mysqli_free_result($result);
			return $data;
		} 				

	return $data;
}

/* Marcas
	===================================================== */
function obtener_marca_sugerencia($keyword) {
	 
		$data = array();
	 	$sql = "SELECT nombre, nombre_rr, id, categorias FROM motor_marcas WHERE nombre LIKE '$keyword%' ORDER BY nombre ASC"; 
		
		$result = BD::consultar($sql);
 		 
		if ($result) {
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
			
			mysqli_free_result($result);
			return $data;
		} else return 0; 
}


function ins_sugerencias($array,$keyword,$palabra){ 
	
	echo "<li>";
		echo "<span class='titu_suge'>Categorias</span>";
	echo "</li>";	 
	
		foreach ($array as $key => $value) 
		{

			echo "<li>";
				echo "<span class='color-key'>".strtolower($keyword)."</span>";

				$pos = strpos(strtolower($palabra),$keyword);
				if ($pos !== false) {
				    $termi = substr_replace(strtolower($palabra),'',$pos,strlen($keyword));
				}
			
				echo "<span class='color-substring'>".$termi."</span>";
				 
				$cat = GM_general::obtener_padre_categoria($value['nombre_rr']);

				if($cat['nombre']!=''){
					$cat_id_padre = GM_general::obtener_id_categoria($value['nombre_rr']);
					echo "<span class='inCat' data-cat='".$value['nombre']."' data-cat-rr='".$value['nombre_rr']."' data-cat-id='".$cat_id_padre."'>en ".$value['nombre']." </span>";
				}

			echo "</li>";		 		 
		}

}


/* Devuelve un string HTML con las sugerencias
===================================================== */
function search_for_keyword_cat($array,$keyword){ 
	
	echo "<li>";
		echo "<span class='titu_suge'>Categorias</span>";
	echo "</li>";	 
	


 
	// if ($array) {
		foreach ($array as $key => $value) 
		{

			echo "<li>";
				echo "<span class='color-key'>".strtolower($keyword)."</span>";
				// $termi=ltrim(strtolower($value['nombre']), strtolower($keyword));
				$part = explode(' ',strtolower($value['nombre']));
				$e = array_shift($part);

				$termi = str_replace(strtolower($keyword),'',$e) .' '. implode(' ', $part);
			
				echo "<span class='color-substring'>".$termi."</span>";
				 
				$cat = GM_general::obtener_padre_categoria($value['nombre_rr']);

				if($cat['nombre']!=''){
					$cat_id_padre = GM_general::obtener_id_categoria($value['nombre_rr']);
					echo "<span class='inCat' data-cat='".$value['nombre']."' data-cat-rr='".$value['nombre_rr']."' data-cat-id='".$cat_id_padre."'>en ".$cat['nombre']." </span>";
				}

			echo "</li>";		 		 
		}
	// }
	// else
		// $dato='';
	 
	// return $dato;
}

/* Devuelve un string HTML con las sugerencias
===================================================== */
function search_for_keyword_mar($array2,$keyword){ 
 
	echo "<li>";
		echo "<span class='titu_suge'>Marcas</span>";
	echo "</li>";	

	foreach ($array2 as $key => $value) 
	{
		echo "<li>";
			echo "<span class='color-key'>".strtolower($keyword)."</span>";
			$termi=ltrim(strtolower($value['nombre']), strtolower($keyword));
			//$termi=str_replace ( strtolower($keyword) ,$keyword,strtolower($value['nombre']));
			echo "<span class='color-substring'>".$termi."</span>";
 			
			echo "<span class='inCat' data-cat='".$value['categorias']."' data-cat-id='".$cat_id_padre."'>en ".$cat['nombre']." </span>";
		echo "</li>";		 	
	}
 
	return $dato;
}

/* 
function obtener_nombre_categoria($id){

	$sql = "SELECT nombre FROM categorias WHERE categorias = '$padre' ORDER BY $order_by";
		$result = BD::consultar($sql);
		
		if ($result) {
			while($row = mysqli_fetch_assoc($result))
				$data[] = $row;
			
			mysqli_free_result($result);
			return $data;
		} else return 0;


}
*/





function search($value){
//select de categorias

//obtener anuncios

}
?>