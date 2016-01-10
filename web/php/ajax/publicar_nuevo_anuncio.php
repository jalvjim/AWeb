<?php

/*    error_reporting(E_ALL & ~E_STRICT);
    ini_set('display_errors', 1);*/

	session_start();

	require_once '../BD.class.php';
	require_once '../GM_anuncio.class.php';	
	require_once '../GM_general.class.php';	
	require_once '../GM_usuarios.class.php';
	require_once '../Cookies.class.php';

$log = array('status' => 1, 'type' => 0, 'refad' => 0, 'urlad' => '');

/*
LOG:
	0 : ok,
	1 : error al insertar anuncio 
	10 : no existe sesión['nuevo usuario'] o $_POST incorrecto
	20 : fallo tipo_usuario vacío
		21 : fallo en la inserción del usuario
		22 : email no válido
		23 : password vacío
		24 : tipo_usuario no permitido
		25 : usuario_empresa no registrado
	30 : fallo al loguearse
		31: "INICIO SESIÓN - FALTAN DATOS";	
		32: "INICIO SESIÓN - LOGIN INCORRECTO";	
		33: "INICIO SESIÓN - USUARIO BLOQUEADO";
		34: "RECUPERACIÓN PASSWORD - USUARIO NO EXISTE";
		35: "RECUPERACION PASSWORD - FALLO ENVIO EMAIL";		
		36: "EMAIL DE BIENVENIDA - FALLO ENVIO EMAIL";


LOG:

	idcategoria.1: fallo ficha incorrecta
	idcategoria.2: campo obligatorio vacío 
*/



if(isset($_SESSION['nuevo_anuncio']['categoria_padre']) && $_POST['action'] == 'publicar'){
	BD::conectar();
	//USUARIO
	if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['tipo_usuario']))
		$usu_tipo = $_SESSION['nuevo_anuncio']['otrosDatos']['tipo_usuario'];
	else{
		$usu_tipo = 'particular';
	}
	if(!isset($_SESSION['usuario_id'])){
	
		if(isset($_SESSION['nuevo_anuncio']['otrosDatos']['pw1']) && isset($_SESSION['nuevo_anuncio']['otrosDatos']['pw2'])){

			$email = trim(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['liame2'],FILTER_SANITIZE_EMAIL));

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$log['status'] = 0;
				$log['type'] = 22;
			    echo json_encode($log);
				exit;
			}

			$password = trim(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['pw2'],FILTER_SANITIZE_STRING));
			if(empty($password)){
				// $password = hash('md5',$password);		
				$log['status'] = 0;
				$log['type'] = 23;
			    echo json_encode($log);
				exit;
			}

			if($usu_tipo == 'profesional' || $usu_tipo == 'particular'){

				$tipo = $usu_tipo == 'profesional' ? 'empresa' : 'particular';

				$usuario = array(
					'nombre'	=>	trim(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['nombre'],FILTER_SANITIZE_STRING)),
					'email'		=>	$email,
					'telefono'	=>	trim(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['telefono'],FILTER_SANITIZE_NUMBER_INT)),
					'password'	=>	$password,
					'tipo'		=>	$tipo
				);
				// print_r($usuario)."<br><br>";

			
				if(GM_usuarios::nuevo_usuario($usuario) == 0){
					$usuario_id = BD::ultimo_id();
				}
				else{
					BD::desconectar();
					$log['status'] = 0;
					$log['type'] = 21;
					echo json_encode($log);
					exit;
				}

				if($usu_tipo == 'profesional'){
					$sql = "INSERT INTO usuario_empresas SET id_usuario = $usuario_id";
					if(!BD::consultar($sql)){
						$log['type'] = 25;
					}
				}
			}
			else{
				$log['status'] = 0;
				$log['type'] = 24;
				echo json_encode($log);
				exit;
			}
		}
		else{	
			$usuario = array(
				'nombre'	=>	$_SESSION['usuario_nombre'],
				'email'		=>	$_SESSION['nuevo_anuncio']['otrosDatos']['liame'],
				'password'	=>	$_SESSION['nuevo_anuncio']['otrosDatos']['pw3']
			);
		}
		//LOGIN
		$error = GM_usuarios::login_usuarios($usuario);
		if($error == 0){
			$usuario_id = $_SESSION['usuario_id'];
			GM_usuarios::copiar_cookies_a_favoritos($_SESSION["usuario_id"]);
		}
		else{
			$log['status'] = 0;
			$log['type'] = '3'.$error;
			echo json_encode($log);
			exit;
		}
	}
	else{
		$usuario_id = $_SESSION['usuario_id'];
		$usuario = array(
			'nombre'	=>	$_SESSION['usuario_nombre'],
			'email'		=>	$_SESSION['usuario_email']
		);		
	}

 	$opciones = array();
 	$opciones_motor = array();
 	$opciones_img = array();
 	$ficha = array();

 	$nombre_categoria = $_SESSION['nuevo_anuncio']['categoria'];
	$categoria_padre = $_SESSION['nuevo_anuncio']['categoria_padre'];
	$id_categoria = $_SESSION['nuevo_anuncio']['categoria_id'];

	//tabla motor
	switch($categoria_padre){
		case 'motor':
			require_once '../GM_busquedas_motor.class.php';
			require_once '../../res/modulos_buscadorAv/modulo_cuenta_motor.php';
			$pref = 'm';
			switch($id_categoria){
				case '219':
					
					
					$tipo_ficha = array();
					$tipo_ficha = array_values(array_intersect(array('ficha_t','id','manual'), array_keys($_SESSION['nuevo_anuncio'])));
				
					if(isset($tipo_ficha) && ($tipo_ficha[0] == 'ficha_t' || $tipo_ficha[0] == 'id')){
						$ficha = array();
						if($tipo_ficha[0] == 'ficha_t'){
							$id_ficha_tecnica_GM = $_SESSION['nuevo_anuncio']['ficha_t'];							
						}
						else{
							$id_ficha_tecnica_GM = $_SESSION['nuevo_anuncio']['id'];									
						}
						$ficha = GM_busquedas_motor::obtener_ficha_tecnica($id_ficha_tecnica_GM);

						$opciones_motor['ficha_t'] = $id_ficha_tecnica_GM;

						if(!empty($ficha['marca'])) {
							$opciones_motor['marca'] = $ficha['marca'];
						}
						if(!empty($ficha['modelo'])) {
							if($ficha['marca'] == 'Mercedes-Benz' || $ficha['marca'] == 'BMW')								
								$opciones_motor['modelo'] = $ficha['modelo'] . ' ' . $ficha['version'];
							else
								$opciones_motor['modelo'] = $ficha['modelo'];
						}
						if(!empty($ficha['combustible'])) {
							$opciones_motor['combustible'] = $ficha['combustible'];
							if($ficha['combustible'] == 'Híbrido')
								$ficha['combustible'] = 'Híbrido / Eléctrico';
						}
						if(!empty($ficha['plazas'])) {
							if($ficha['plazas'] == 2)
								$ficha['plazas'] = '2';
							elseif($ficha['plazas'] >= 3 && $ficha['plazas'] <= 5)
								$ficha['plazas'] = '3-5';
							elseif($ficha['plazas'] >= 6)
								$ficha['plazas'] = '6+';
							else
								$ficha['plazas'] = 'otras';
						}						
						if(!empty($ficha['puertas'])) {
							$opciones_motor['puertas'] = $ficha['puertas'];
						}						
						if(!empty($ficha['cambio'])) {
							$opciones_motor['tipo_cambio'] = $ficha['cambio'];
						}						
						if(!empty($ficha['cv'])) {
							$opciones_motor['cv'] = $ficha['cv'];
						}		
						if(!empty($ficha['cc'])) {
							$opciones_motor['cc'] = $ficha['cc'];
						}		
						if(!empty($ficha['traccion'])) {
							if($ficha['traccion'] == 'Delantera' || $ficha['traccion'] == 'Trasera'){
								$ficha['traccion'] = '4x2';
							}
							elseif($ficha['traccion'] == '-'){
								$ficha['traccion'] = 'Sin Datos';
							}
						}
						if(!empty($ficha['carroceria_gm'])) {
							$ficha['tipo'] = $ficha['carroceria_gm'];
						}
						// datos introducidos por el usuario
						if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['kilometros'])) {
							$opciones_motor['kilometros'] = trim(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['kilometros'],FILTER_SANITIZE_NUMBER_INT));	
							$ficha['kilometros'] = $opciones_motor['kilometros'];				
						}
						if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['colorCoche'])) {
							$opciones_motor['color'] = trim(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['colorCoche'],FILTER_SANITIZE_STRING));
							$ficha['color'] = $opciones_motor['color'];
						}						
						if(isset($_SESSION['nuevo_anuncio']['otrosDatos']['alta'])){
							$opciones_motor['dado_de_alta'] = $_SESSION['nuevo_anuncio']['otrosDatos']['alta'];
						}
						
						if(isset($_SESSION['nuevo_anuncio']['otrosDatos']['accidentado'])){
							if(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['accidentado'],FILTER_VALIDATE_BOOLEAN)) {
								if ($_SESSION['nuevo_anuncio']['otrosDatos']['accidentado'] == 1)
									$opciones_motor['carroceria'] = 'Accidentados';
							}
							$carrocerias = array();
							if (!empty($ficha['tipo'])) {
								$carrocerias = explode (',',$ficha['tipo']);
							}
							$carrocerias[] = 'Accidentados';
							$ficha['tipo'] = implode (',', $carrocerias);
						}	
						
						
						if(!empty($_SESSION['nuevo_anuncio']['anio'])) {
							$opciones_motor['ano'] = $_SESSION['nuevo_anuncio']['anio'];
							$ficha['anio'] = $opciones_motor['ano'];
							unset($ficha['anio_ini']);
						}
						
						//titulo
						$titulo = $ficha['marca'] . ' ' . $ficha['modelo'] . ' ' . $ficha['version'];
					}
					elseif($tipo_ficha[0] == 'manual'){
						$opciones = array();
						
						if(!isset($_SESSION['nuevo_anuncio']['manual']['marca'],$_SESSION['nuevo_anuncio']['manual']['modelo'],$_SESSION['nuevo_anuncio']['manual']['anio']) ){
							$log['status'] = 0;
							$log['type'] = $id_categoria.'2';
							echo json_encode($log);
							exit;							
						}

						$opciones['marca'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['marca'],FILTER_SANITIZE_STRING));
						$opciones['modelo'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['modelo'],FILTER_SANITIZE_STRING));								
						$opciones['anio'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['anio'],FILTER_SANITIZE_NUMBER_INT));
						
						if(!empty($_SESSION['nuevo_anuncio']['manual']['version'])){
							$opciones['version'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['version'],FILTER_SANITIZE_STRING));
						}
						if(!empty($_SESSION['nuevo_anuncio']['manual']['cc'])){
							$opciones['cc'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['cc'],FILTER_SANITIZE_STRING));
						}
						if(!empty($_SESSION['nuevo_anuncio']['manual']['cv'])){
							$opciones['cv'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['cv'],FILTER_SANITIZE_STRING));
						}
						if(!empty($_SESSION['nuevo_anuncio']['manual']['carroceria'])){
							$opciones['carroceria'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['carroceria'],FILTER_SANITIZE_STRING));
						}						
						if(!empty($_SESSION['nuevo_anuncio']['manual']['combustible'])){
							$opciones['combustible'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['combustible'],FILTER_SANITIZE_STRING));
						}		
						if(!empty($_SESSION['nuevo_anuncio']['manual']['plazas'])){
							$opciones['plazas'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['plazas'],FILTER_SANITIZE_STRING));
						}		
						if(!empty($_SESSION['nuevo_anuncio']['manual']['puertas'])){
							$opciones['puertas'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['puertas'],FILTER_SANITIZE_STRING));
						}	
						if(!empty($_SESSION['nuevo_anuncio']['manual']['cambio'])){
							$opciones['cambio'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['cambio'],FILTER_SANITIZE_STRING));
						}							
						if(!empty($_SESSION['nuevo_anuncio']['manual']['traccion'])){
							$opciones['traccion'] = trim(filter_var($_SESSION['nuevo_anuncio']['manual']['traccion'],FILTER_SANITIZE_STRING));
						}		
						if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['colorCoche'])) {
							$opciones['color'] = trim(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['colorCoche'],FILTER_SANITIZE_STRING));							 
						}
						if(isset($_SESSION['nuevo_anuncio']['otrosDatos']['accidentado'])) {
							$opciones['accidentado'] = trim(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['accidentado'],FILTER_VALIDATE_BOOLEAN));
						}
						if(isset($_SESSION['nuevo_anuncio']['otrosDatos']['alta'])) {
							$opciones['dado_de_alta'] = $_SESSION['nuevo_anuncio']['otrosDatos']['alta'];
						}							

						$revisar = 1;

					}
					else{
						$log['status'] = 0;
						$log['type'] = $id_categoria.'1';
						echo json_encode($log);
						exit;						
					}
				break;
				case '305':
				break;
				case '224':
				break;
				case '225':
				break;
			}
		break;
		case 'inmobiliaria':
			$pref = 'i';
		break;
		default:
			$pref = 'a';
		break;
	}

	//ANUNCIO
	if(isset($usuario_id)){
	//	echo $usuario_id;
		$opciones['usuario_id'] = $usuario_id;
		if(!isset($revisar)) $opciones['titulo'] = $titulo;
		$opciones['categoria_id2'] = $id_categoria;

		if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['precio'])){
			$opciones['precio'] = filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['precio'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_THOUSAND);
			if(!empty($ficha)){			
				$ficha['precio'] = $opciones['precio'];	
			} 
		}
		if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['consultarPrecio'])){
			if(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['consultarPrecio'],FILTER_VALIDATE_BOOLEAN))
				$opciones['precio_consultar'] = $_SESSION['nuevo_anuncio']['otrosDatos']['consultarPrecio'];
		}		
		if(isset($_SESSION['nuevo_anuncio']['otrosDatos']['urge'])){
			if(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['urge'],FILTER_VALIDATE_BOOLEAN))
				$opciones['urge'] = $_SESSION['nuevo_anuncio']['otrosDatos']['urge'];
		}			
		if(isset($_SESSION['nuevo_anuncio']['otrosDatos']['negociable'])){
			if(filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['negociable'],FILTER_VALIDATE_BOOLEAN))
				$opciones['precio_negociable'] = $_SESSION['nuevo_anuncio']['otrosDatos']['negociable'];
		}	
		if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['provincia'])){
			$opciones['provincia_id'] = filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['provincia'],FILTER_SANITIZE_NUMBER_INT);
		}
		if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['localidad'])){
			$opciones['localidad_id'] = filter_var($_SESSION['nuevo_anuncio']['otrosDatos']['localidad'],FILTER_SANITIZE_NUMBER_INT);
		}
		if(!empty($_SESSION['nuevo_anuncio']['descripcion'])){
			$opciones['descripcion'] = filter_var($_SESSION['nuevo_anuncio']['descripcion'],FILTER_SANITIZE_STRING);
		}
		if(!empty($_SESSION['nuevo_anuncio']['otrosDatos']['coords'])){
			list($lat,$lon) = explode(',',$_SESSION['nuevo_anuncio']['otrosDatos']['coords']);		
			$opciones['latitud'] = trim(filter_var($lat,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION));
			$opciones['longitud'] = trim(filter_var($lon,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION));	
		}

		//IMÁGENES DEL ANUNCIO
		if(!empty($_SESSION['nuevo_anuncio']['img'])){
			
			$portada = !empty($_SESSION['nuevo_anuncio']['portada']) ? $_SESSION['nuevo_anuncio']['portada'] : '';

			if(empty($portada))
				$opciones_img[] = $_SESSION['nuevo_anuncio']['img'][0]['nombre'];

			foreach ($_SESSION['nuevo_anuncio']['img'] as $img) {

				if($portada != $img['nombre']){
					$opciones_img[] = $img['nombre'];				
				}
				else{
					array_unshift($opciones_img,$img['nombre']);
				}
			}
		}

		/*	echo '<pre>' . print_r($opciones) . '</pre><br>';
			echo '<pre>' . print_r($opciones_motor) . '</pre><br>';
			echo '<pre>' . print_r($opciones_img) . '</pre>';
			echo '<pre>' . print_r($ficha) . '</pre>';
		*/	

		if(!isset($revisar))
			$res = Anuncio::insertar_anuncio($categoria_padre,$id_categoria,$ficha,$opciones,$opciones_img,$opciones_motor);
		else{
			$rev = Anuncio::insertar_temp_anuncio($categoria_padre,$id_categoria,$opciones,$opciones_img);
		}

		if(!isset($rev)){
			if(!$res){
				$log['status'] = 0;
				$log['type'] = 1;			
			}
			else{
				unset($_SESSION['nuevo_anuncio']);
				$log['refad'] = $pref.$res;
				$log['urlad'] = $nombre_categoria.'/'.GM_general::slugify($titulo) . '-gm'.$log['refad'];
					
			}
		}
		else{
			if(!$rev){
				$log['status'] = 0;
				$log['type'] = 1;	
			}
			else{
				$usuario['accion'] = 'revisar_anuncio';
				$gm = array(
					'accion'	=> 'aviso_revision',
					'email'		=> 'info@granmanzana.es',
					'id'		=> $rev,
					'usuario_id'=> $usuario_id,
					'usuario_email' => $usuario['email'],
					'tabla' 	=> 'temp_motor'
				);
				GM_usuarios::enviar_email($gm);
				GM_usuarios::enviar_email($usuario);
				$log['rev'] = 1;
				unset($_SESSION['nuevo_anuncio']);
			}
		}
	}
	BD::desconectar();
	$_SESSION['log_nuevo_anuncio'] = $log;
	echo json_encode($_SESSION['log_nuevo_anuncio']);
	exit;

}
else{
	$log['status'] = 0;
	$log['type'] = 10;
	echo json_encode($log);
	exit;
}

?>
