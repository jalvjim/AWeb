<?php
include('../BD.class.php');
include("../GM_general.class.php");

$p1 = array();
$p2 = array();
list($p1['lat'], $p1['lon'], $p2['lat'], $p2['lon']) = explode(",", $_GET["zona"]);

$categoria_padre = filter_input(INPUT_GET,'categoria-padre', FILTER_SANITIZE_STRING);
$categoria_actual = filter_input(INPUT_GET,'categoria-actual', FILTER_SANITIZE_NUMBER_INT);
$pagina = filter_input(INPUT_GET,'pag_map', FILTER_SANITIZE_NUMBER_INT);
$an_pg = filter_input(INPUT_GET,'pg-size', FILTER_SANITIZE_NUMBER_INT);
if(isset($_GET['f-rel'])) $f_rel = filter_input(INPUT_GET,'f-rel', FILTER_SANITIZE_NUMBER_INT);

if ($categoria_padre == 'inmobiliaria') {

	include('../GM_busquedas_inmo.class.php');

	$sql_cab = "SELECT id, titulo, habitaciones, precio, tipo_inmueble, latitud, longitud, descripcion, banios, superficie FROM anuncios_inmobiliaria ";
				
	if ($_GET['accion'] == 'destacados') {
		BD::conectar();
		$result = BD::consultar("SELECT hijos FROM categorias WHERE id = '{$categoria_actual}'");

		$row = mysqli_fetch_row($result);
		mysqli_free_result($result);

		if($pagina > 1){
			$limit = ( ($pagina-1)*($an_pg) ).', '.$an_pg;
			// $limit = "10, 10";//.($pagina*$an_pg);
		}
		else{
			$limit = $an_pg;
		}

		$sql = empty(trim($row[0])) ? $sql_cab."WHERE categoria_id = '{$_GET['categoria-actual']}'" : $sql_cab."WHERE categoria_id IN ({$row[0]})";
		$sql .= "AND (latitud BETWEEN {$p1['lat']} AND {$p2['lat']}) AND (longitud BETWEEN {$p1['lon']} AND {$p2['lon']}) ";
		$sql .= "LIMIT ".$limit;//$sql .= "LIMIT 10";
		
		$result = BD::consultar($sql);
		if ($result) {
			$data = array();
			while($row = mysqli_fetch_assoc($result))
				$data[] = $row;
			mysqli_free_result($result);

			foreach ($data as &$anuncio)
				$anuncio['imagenes'] = GM_busquedas_inmo::obtener_fotos_anuncio($anuncio["id"]);
			
			echo json_encode($data);

			BD::desconectar();
		} else echo 0;
	} else if ($_GET['accion'] == 'todos') {
		BD::conectar();
		$result = BD::consultar("SELECT hijos FROM categorias WHERE id = '{$_GET['categoria-actual']}'");

		$row = mysqli_fetch_row($result);
		mysqli_free_result($result);

		$sql = empty(trim($row[0])) ? $sql_cab."WHERE categoria_id = '{$_GET['categoria-actual']}'" : $sql_cab."WHERE categoria_id IN ({$row[0]})";
		$sql .= " AND (latitud BETWEEN {$p1['lat']} AND {$p2['lat']}) AND (longitud BETWEEN {$p1['lon']} AND {$p2['lon']}) ";

		$limit_fin = 'LIMIT '.($pagina*$an_pg).', 999999';

		if($pagina > 1){
			$limit_ini = 'LIMIT '.(($pagina-1)*($an_pg));	
			
			$sql1 = $sql;

			$sql = '('.$sql.$limit_ini.')';
			$sql1 = '('.$sql1.$limit_fin.')';
			$sql = $sql.' UNION '.$sql1;

		}//finsi pg>1
		else{
			$sql .= $limit_fin;
		}
		
		$result = BD::consultar($sql);
		if ($result) {
			$data = array();
			while($row = mysqli_fetch_assoc($result))
				$data[] = $row;
			mysqli_free_result($result);

			echo json_encode($data);
			BD::desconectar();
		} else echo 0;
	}
} else if ($categoria_padre == 'motor') {
	include('../GM_busquedas_motor.class.php');		

	$tabla = $categoria_actual == '219' ? 'f' : 'm';

	$sql_opciones = '';

	if(isset($_GET['precio_desde']) || isset($_GET['precio_hasta'])){
		if(isset($_GET['precio_desde'],$_GET['precio_hasta'])){
			$precio_desde = filter_input(INPUT_GET,'precio_desde', FILTER_SANITIZE_NUMBER_INT);			
			$precio_hasta = filter_input(INPUT_GET,'precio_hasta', FILTER_SANITIZE_NUMBER_INT);
			$sql_opciones .= 'AND (a.precio BETWEEN '.$precio_desde.' AND '.$precio_hasta.') ';
		}
		elseif(isset($_GET['precio_desde'])){
			$precio_desde = filter_input(INPUT_GET,'precio_desde', FILTER_SANITIZE_NUMBER_INT);
			$sql_opciones .= 'AND (a.precio >= '.$precio_desde.') ';							
		}
		elseif(isset($_GET['precio_hasta'])){
			$precio_hasta = filter_input(INPUT_GET,'precio_hasta', FILTER_SANITIZE_NUMBER_INT);
			$sql_opciones .= 'AND (a.precio <= '.$precio_hasta.') ';			
		}			
	}

	if(isset($_GET['no_kms'])){
		$sql_opciones .= 'AND (m.kilometros = 0) ';
	}
	elseif(isset($_GET['kilometros_desde']) || isset($_GET['kilometros_hasta'])){
		if(isset($_GET['kilometros_desde'],$_GET['kilometros_hasta'])){
			$kilometros_desde = filter_input(INPUT_GET,'kilometros_desde', FILTER_SANITIZE_NUMBER_INT);
			$kilometros_hasta = filter_input(INPUT_GET,'kilometros_hasta', FILTER_SANITIZE_NUMBER_INT);
			$sql_opciones .= 'AND (m.kilometros BETWEEN '.$kilometros_desde.' AND '.$kilometros_hasta.') ';
		}	
		elseif(isset($_GET['kilometros_desde'])) {
			$kilometros_desde = filter_input(INPUT_GET,'kilometros_desde', FILTER_SANITIZE_NUMBER_INT);
			$sql_opciones .= 'AND (m.kilometros >= '.$kilometros_desde.') ';							
		}
		elseif(isset($_GET['kilometros_hasta'])){
			$kilometros_hasta = filter_input(INPUT_GET,'kilometros_hasta', FILTER_SANITIZE_NUMBER_INT);		
			$sql_opciones .= 'AND (m.kilometros < '.$kilometros_hasta.') ';				
		}
	}			

	if(isset($_GET['no_cv'])){
		$sql_opciones .= 'AND ('.$tabla.'.cv = 0) ';
	}
	elseif(isset($_GET['cv_desde']) || isset($_GET['cv_hasta'])){
		if(isset($_GET['cv_desde'],$_GET['cv_hasta'])){
			$cv_desde = filter_input(INPUT_GET,'cv_desde', FILTER_SANITIZE_NUMBER_INT);
			$cv_hasta = filter_input(INPUT_GET,'cv_hasta', FILTER_SANITIZE_NUMBER_INT);
			$sql_opciones .= 'AND ('.$tabla.'.cv BETWEEN '.$cv_desde.' AND '.$cv_hasta.') ';			
		}
		elseif(isset($_GET['cv_desde'])) {
			$cv_desde = filter_input(INPUT_GET,'cv_desde', FILTER_SANITIZE_NUMBER_INT);			
			$sql_opciones .= 'AND ('.$tabla.'.cv >= '.$cv_desde.') ';						
		}		
		elseif(isset($_GET['cv_hasta'])) {
			$cv_hasta = filter_input(INPUT_GET,'cv_hasta', FILTER_SANITIZE_NUMBER_INT);			
			$sql_opciones .= 'AND ('.$tabla.'.cv > 0 AND '.$tabla.'.cv <= '.$cv_hasta.') ';						
		}								
	}

	if(isset($_GET['no_cc'])){
		$sql_opciones .= 'AND ('.$tabla.'.cc = 0) ';
	}
	elseif (isset($_GET['cc_desde']) || isset($_GET['cc_hasta'])) {
		
		if(isset($_GET['cc_desde'],$_GET['cc_hasta'])){
			$cc_desde = filter_input(INPUT_GET,'cc_desde', FILTER_SANITIZE_NUMBER_INT);
			$cc_hasta = filter_input(INPUT_GET,'cc_hasta', FILTER_SANITIZE_NUMBER_INT);
			$sql_opciones .= 'AND ('.$tabla.'.cc BETWEEN '.$cc_desde.' AND '.$cc_hasta.') ';	
		}
		elseif(isset($_GET['cc_desde'])) {
			$cc_desde = filter_input(INPUT_GET,'cc_desde', FILTER_SANITIZE_NUMBER_INT);			
			$sql_opciones .= 'AND ('.$tabla.'.cc >= '.$cc_desde.') ';						
		}				
		elseif(isset($_GET['cc_hasta'])) {
			$cc_hasta = filter_input(INPUT_GET,'cc_hasta', FILTER_SANITIZE_NUMBER_INT);			
			$sql_opciones .= 'AND ('.$tabla.'.cc > 0 AND '.$tabla.'.cc <= '.$cc_hasta.') ';						
		}										
	}	

	if(isset($_GET['no_anios'])){
		$sql_opciones .= 'AND (m.ano = 0) ';	
	}
	elseif(isset($_GET['anio_desde']) || isset($_GET['anio_hasta'])){
		if(isset($_GET['anio_desde'],$_GET['anio_hasta'])){
			$anio_desde = filter_input(INPUT_GET,'anio_desde', FILTER_SANITIZE_NUMBER_INT);
			$anio_hasta = filter_input(INPUT_GET,'anio_hasta', FILTER_SANITIZE_NUMBER_INT);
			$sql_opciones .= 'AND (m.ano != 0 AND m.ano BETWEEN '.$anio_desde.' AND '.$anio_hasta.') ';
		}
		elseif(isset($_GET['anio_desde'])) {
			$anio_desde = filter_input(INPUT_GET,'anio_desde', FILTER_SANITIZE_NUMBER_INT);			
			$sql_opciones .= 'AND (m.ano > 0 AND m.ano >= '.$anio_desde.') ';	
		}				
		elseif(isset($_GET['anio_hasta'])) {
			$anio_hasta = filter_input(INPUT_GET,'$anio_hasta', FILTER_SANITIZE_NUMBER_INT);			
			$sql_opciones .= 'AND (m.ano > 0 AND m.ano <= '.$anio_hasta.') ';
		}	
	}

/*	if(isset($_GET['tipo'])){
		$carrocerias = filter_input_array(INPUT_GET,'tipo', FILTER_SANITIZE_STRING);
		$lcarr = count($carrocerias);		

		$tab_carr = $categoria_actual == '219' ? 'f.carroceria_gm' : 'm.carroceria';

		if($lcarr > 0){
			$cadena_carr .= "+ (".implode(' ', $carrocerias).") ";
			$cadena_carr = trim ($cadena_carr);		
			$sql_opciones .= " AND MATCH({$tab_carr}) AGAINST('{$cadena_carr}' IN BOOLEAN MODE) ";
		}		
	}*/
	if(isset($_GET['tipo'])){
		$carr = filter_input(INPUT_GET,'tipo', FILTER_SANITIZE_STRING);		
		$carrocerias = explode(',',$carr);
		$tab_carr = $categoria_actual == '219' ? 'f.carroceria_gm' : 'm.carroceria';
		$lcarr = count($carrocerias);		
		if($lcarr > 0){
			$cadena_carr .= "+ (".implode(' ', $carrocerias).") ";
			$cadena_carr = trim ($cadena_carr);		
			$sql_opciones .= " AND MATCH({$tab_carr}) AGAINST('{$cadena_carr}' IN BOOLEAN MODE) ";
		}		
	}	
/*	if(isset($_GET['marca'])){
		$marcas   = filter_input_array(INPUT_GET,'marca', FILTER_SANITIZE_STRING);
		$lcmarc = count($marcas);
		if($lcmarc > 0){
			$cadena_marcas .= "+ (".implode(' ', $marcas).") ";
			$cadena_marcas = trim ($cadena_marcas);
			$sql_opciones .= " AND MATCH(m.marca) AGAINST('{$cadena_marcas}' IN BOOLEAN MODE) ";
		}
	}*/
	if(isset($_GET['marca'])){
		$marc   = filter_input(INPUT_GET,'marca', FILTER_SANITIZE_STRING);
		$marcas = explode(',',$marc);
		$lcmarc = count($marcas);
		if($lcmarc > 0){
			$cadena_marcas .= "+ (".implode(' ', $marcas).") ";
			$cadena_marcas = trim ($cadena_marcas);
			$sql_opciones .= " AND MATCH(m.marca) AGAINST('{$cadena_marcas}' IN BOOLEAN MODE) ";
		}
	}


			
	if ($_GET['accion'] == 'destacados') {
	
		switch($categoria_actual){
			case '219': 
					$sql_cab = 
					'SELECT a.id, a.titulo, a.precio, a.descripcion, a.latitud, a.longitud, m.kilometros, m.ano, f.consumo_medio, f.cc, f.cv, f.cambio 
					FROM anuncios AS a JOIN motor AS m ON m.anuncio_id = a.id JOIN fichas_tecnicas_coches AS f ON f.id = m.ficha_t ';
					break;
			case '305':					
					$sql_cab = 
					'SELECT a.id, a.titulo, a.precio, a.descripcion, a.latitud, a.longitud, m.kilometros, m.ano, m.cc, m.cv, m.carroceria 
					FROM anuncios AS a JOIN motor AS m ON m.anuncio_id = a.id ';
					break;
		}
					
		BD::conectar();
		$result = BD::consultar("SELECT hijos FROM categorias WHERE id = '{$categoria_actual}'");

		$row = mysqli_fetch_row($result);
		mysqli_free_result($result);

		$sql = empty(trim($row[0])) ? $sql_cab."WHERE a.categoria_id2 = '{$_GET['categoria-actual']}'" : $sql_cab."WHERE a.categoria_id2 IN ({$row[0]}) ";

			if($pagina > 1)
				$limit = ( ($pagina-1)*($an_pg) ).', '.$an_pg;
			else
				$limit = $an_pg;


			$sql .= "AND (a.latitud BETWEEN {$p1['lat']} AND {$p2['lat']}) AND (a.longitud BETWEEN {$p1['lon']} AND {$p2['lon']}) ";
			$sql .= $sql_opciones == '' ? 'LIMIT '.$limit : $sql_opciones . 'LIMIT '.$limit;
		
		$result = BD::consultar($sql);
		if ($result) {
			$data = array();
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
			mysqli_free_result($result);

			foreach ($data as &$anuncio){
				$anuncio['fch'] = GM_general::slugify($anuncio['titulo']) . '-gmm' . $anuncio['id'];
				$anuncio['imagenes'] = GM_busquedas_motor::obtener_fotos_anuncio($anuncio['id']);
			}
			// echo ($sql);
			echo json_encode($data);
			BD::desconectar();
		} else echo 0;
	}else if ($_GET['accion'] == 'todos') {
	
		$sql_cab = 'SELECT a.id, a.titulo, a.precio, a.latitud, a.longitud FROM anuncios AS a ';
					
		BD::conectar();
		$result = BD::consultar("SELECT hijos FROM categorias WHERE id = '{$categoria_actual}'");

		$row = mysqli_fetch_row($result);
		mysqli_free_result($result);

		$sql_tab_motor = 'JOIN motor AS m ON m.anuncio_id = a.id ';
		$sql_ficha = 'JOIN fichas_tecnicas_coches AS f ON f.id = m.ficha_t ' ;


		if( isset($_GET['no-kms']) || isset($_GET['kilometros_desde']) || isset($_GET['kilometros_hasta']) ||
			isset($_GET['no-anios']) || isset($_GET['anio_desde']) || isset($_GET['anio_hasta']) || 
			isset($_GET['marca']) || isset($_GET['tipo']) )
		{
			$sql_cab .= $sql_tab_motor;
		}

		if( (isset($_GET['no-cv']) || isset($_GET['cv_desde']) || isset($_GET['cv_hasta']) || 
			isset($_GET['tipo']) ) && $categoria_actual == '219')
		{
			$sql_cab .= $sql_ficha;
		}


		$sql = empty(trim($row[0])) ? $sql_cab."WHERE categoria_id2 = '{$_GET['categoria-actual']}'" : $sql_cab."WHERE categoria_id2 IN ({$row[0]})";

		if(isset($f_rel)){
			echo $_f_rel;
			$sql .= ' AND a.id=' . $f_rel;  
		}
		else{
			$sql .= " AND (latitud BETWEEN {$p1['lat']} AND {$p2['lat']}) AND (longitud BETWEEN {$p1['lon']} AND {$p2['lon']}) ";


			if($sql_opciones != '')
				$sql .= $sql_opciones;

			// echo '('.$pagina.','.$an_pg.')';

			$limit_fin = 'LIMIT '.$pagina * $an_pg.', 999999';

			if($pagina > 1){
				$limit_ini = 'LIMIT '.(($pagina-1)*($an_pg));	
				
				$sql1 = $sql;

				$sql = "(".$sql.$limit_ini.")";
				$sql1 = "(".$sql1.$limit_fin.")";
				$sql = $sql.' UNION ALL '.$sql1;

				// echo $sql;
			
			}//finsi pg>1
			else{
				$sql .= $limit_fin;
			}
		}
		// echo $sql;
		$result = BD::consultar($sql);
		if ($result) {
			$data = array();
			while($row = mysqli_fetch_assoc($result))
				$data[] = $row;
			mysqli_free_result($result);

			echo json_encode($data);
			BD::desconectar();
		} else echo 0;
	}else if($_GET['accion'] == 'ficha'){
		switch($categoria_actual){
			case '219': 
					$sql_cab = 
					'SELECT a.id, a.titulo, a.precio, a.descripcion, a.latitud, a.longitud, m.kilometros, m.ano, f.consumo_medio, f.cc, f.cv, f.cambio 
					FROM anuncios AS a JOIN motor AS m ON m.anuncio_id = a.id JOIN fichas_tecnicas_coches AS f ON f.id = m.ficha_t ';
					break;
			case '305':					
					$sql_cab = 
					'SELECT a.id, a.titulo, a.precio, a.descripcion, a.latitud, a.longitud, m.kilometros, m.ano, m.cc, m.cv, m.carroceria 
					FROM anuncios AS a JOIN motor AS m ON m.anuncio_id = a.id ';
					break;

		}
		BD::conectar();
		$result = BD::consultar("SELECT hijos FROM categorias WHERE id = '{$categoria_actual}'");

		$row = mysqli_fetch_row($result);
		mysqli_free_result($result);

		$sql = empty(trim($row[0])) ? $sql_cab."WHERE a.categoria_id2 = '{$_GET['categoria-actual']}'" : $sql_cab."WHERE a.categoria_id2 IN ({$row[0]}) ";		
		$sql .= ' AND a.id=' . $f_rel . ' ';
		$result = BD::consultar($sql);
		if ($result) {
			$data = array();
			while($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
			mysqli_free_result($result);

			foreach ($data as &$anuncio){
				$anuncio['fch'] = GM_general::slugify($anuncio['titulo']) . '-gmm' . $anuncio['id'];
				$anuncio['imagenes'] = GM_busquedas_motor::obtener_fotos_anuncio($anuncio['id']);
			}
			// echo ($sql);			
			echo json_encode($data);
			BD::desconectar();
		} else echo 0;
	}
}

?>