<?php	
	include('../../../php/Area_personal.class.php') ;
		
	include('../../../php/BD.class.php');
	
	BD::conectar();
	
	$provincias = Area_personal::obtenerProvincias();
	
	
	
	echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Area Persona | Gran Manzana</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>
	function getState(val) {
		$.ajax({
		type: "POST",
		url: "procesar.php",
		data:\'provincia_id=\'+val,
		success: function(data){
			$("#localidad").html(data);
		}
		});
	}
	</script>
	
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">';

        require_once('../../header.php'); 
        require_once('../../left-column.php');

echo'        <div class="content-wrapper">
            
            <section class="content-header">
              <h1>
                Perfil de Usuario
                <small>Control de datos</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="http://pruebas.granmanzana.es/areapersonal/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Datos</li>
              </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Datos de Usuario</h3>
                            </div>

                            <form role="form" method="post"  action="">
                                <div class="box-body">
                                    <!-- Nombre -->
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Nombre</label>
                                      <input type="nombre" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
                                    </div>
                                    <!-- Apellidos -->
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Apellidos</label>
                                      <input type="nombre" name="apellidos" class="form-control" id="exampleInputEmail1" placeholder="Apellidos">
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" name="email" class="form-control" id="Email" placeholder="Email">
                                    </div>
                                    <!-- Telefono -->
                                    <div class="form-group">
                                        <label for="telefono1">Telefono 1</label>
                                        <input type="text" name="telefono1" class="form-control" id="telefono1" placeholder="Teléfono 1">
                                    </div>

                                    <!-- Telefono -->
                                    <div class="form-group">
                                        <label for="telefono2">Telefono 2</label>
                                        <input type="text" name="telefono2" class="form-control" id="telefono2" placeholder="Teléfono 2">
                                    </div>
                                    <h2 class="text-light-blue">Localización</h2>
                                    <!-- Provincia -->
                                    <span class="text-red">Opcion 1</span>
                                    <div class="form-group">
                                        <label>Provincia</label>
                                        <select class="form-control" name="provincia" id="provincia" onChange="getState(this.value);">
										<option value="0">Seleccione provincia</option>';										
										foreach($provincias as $p){
											echo'<option value="' . $p['id'] . '">' . $p['nombre'] . '</option>';
										}
											
										echo '</select>
                                    </div>
                                    <!-- Población -->
                                    <div class="form-group">
                                        <label>Población</label>
                                        <select class="form-control" name="localidad" id="localidad">
										<option value="0">Seleccione localidad </option>';
	
										echo'</select>
                                    </div>
                                    
                                    <h4 class="text-light-blue">Datos para Profesionales</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label>Web</label>
                                        <input type="text" name="web" class="form-control" placeholder="www ...">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Otros datos</label>
                                        <input type="text" name="datos" class="form-control" placeholder="...">
                                    </div>


                                </div><!-- /.box-body -->

                              <div class="box-footer">
                                <button type="submit" name="submit" value="datos" class="btn btn-primary">Guardar</button>
                              </div>
                            </form>
 
                        </div>
                    </div>

                    <!-- Cambiar contraseña -->
                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border"><h3 class="box-title">Contraseña</h3></div><!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post">
                              <div class="box-body">
                                <div class="form-group">  
                                  <div class="col-sm-10">
                                    <input type="password" name="old" class="form-control" id="inputPassword1" placeholder="Contraseña">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <input type="password" name="newpass"class="form-control" id="inputPassword2" placeholder="Nueva contraseña">
                                  </div>
                                </div>

                                <div class="form-group">      
                                  <div class="col-sm-10">
                                    <input type="password" name="confirpass" class="form-control" id="inputPassword2" placeholder="Confirmar contraseña">
                                  </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-default">Cancel</button>
                                    <button type="submit" name="submit" value="password" class="btn btn-info pull-right">Guardar</button>
                                </div><!-- /.box-footer -->    
                              </div>
                            </form>
                        </div>
                    </div>  
 
                    <!-- Cambiar contraseña -->
                    <div class="col-md-6">

                        <div class="panel box box-danger">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                DAR DE BAJA MI ÁREA PERSONAL
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                                <p class="lead">¿Seguro que quieres dar de baja tu cuenta?</p>
                                <p class="text-muted">Al darte de baja se borraran tus anuncios activos y dejaras de recibir todas las comunicaciones de GranManzana.es</p>    
                                <button class="btn btn-danger pull-right">Dar de baja</button>
                            </div>
                          </div>
                        </div>
 
                    </div> 

                </div>
            </section>

        </div>';
	
							
 
	include('../../footer.php'); 
 
 

   echo '</div> <!-- end wrapper  -->

    <!-- jQuery 2.1.4 -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge(\'uibutton\', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://pruebas.granmanzana.es/areapersonal/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://pruebas.granmanzana.es/areapersonal/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="http://pruebas.granmanzana.es/areapersonal/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="http://pruebas.granmanzana.es/areapersonal/dist/js/demo.js"></script>
	</body>
  </html>';

	if(isset($_POST)){
		if($_POST['submit']=="datos"){
		
			$result=Area_personal::obtenerIdProvincia($_POST['provincia']);
			$id_provincia=$result[0]['id'];
			$result=Area_personal::obtenerIdLocalidad($_POST['localidad'], $id_provincia);
			$id_localidad=$result[0]['id'];
			Area_personal::actualizarDatosUsuario($_POST, $_SESSION['usuario_id'], $id_provincia, $id_localidad);
			$usuario = Area_personal::obtenerDatosUsuario($_SESSION['usuario_id']);
			echo $usuario;
		}
		elseif($_POST['submit']=="password"){
			Area_personal::actualizarPassword($_POST['old'], $_POST['newpass'], $_SESSION['usuario_id']);
			print_r("Cambio de contraseña hecho correctamente");
		}
		
	}

	BD::desconectar();
	
 
?> 

  
  
  