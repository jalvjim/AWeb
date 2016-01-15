<?php
include '../../../php/Principal.class.php';

include '../../../php/BD.class.php';

BD::conectar();

echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dispositivos | sensorAdmin </title>
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

require_once '../../left-column.php';

echo '        <div class="content-wrapper">

            <section class="content-header">
              <h1>
		Datos de dispositivo
                <small>Control de datos</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="http://localhost/web/interfaz/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dispositivos</li>
              </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Datos de Dispositivo</h3>
                            </div>

                            <form role="form" method="post"  action="">
                                <div class="box-body">
                                    <!-- Ubicacion -->
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Ubicacion</label>
                                      <input type="text" name="ubicacion" class="form-control" id="exampleInputEmail1" placeholder="Ubicacion">
                                    </div>
                                    <!-- Coordenadas -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Coordenadas KML</label>
                                        <input type="text" name="coord" class="form-control" id="coord" placeholder="Coordenadas">
                                    </div>
                                    <!-- Descripcion -->
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción">
                                    </div>
                                </div><!-- /.box-body -->

                              <div class="box-footer">
                                <button type="submit" name="submit" value="datos" class="btn btn-primary">Guardar</button>
                              </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>

        </div>';

include '../../footer.php';

echo '</div> <!-- end wrapper  -->

    <!-- jQuery 2.1.4 -->
    <script src="http://localhost/web/interfaz/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge(\'uibutton\', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/web/interfaz/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://localhost/web/interfaz/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="http://localhost/web/interfaz/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="http://localhost/web/interfaz/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://localhost/web/interfaz/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="http://localhost/web/interfaz/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="http://localhost/web/interfaz/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="http://localhost/web/interfaz/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="http://localhost/web/interfaz/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="http://localhost/web/interfaz/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/web/interfaz/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://localhost/web/interfaz/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="http://localhost/web/interfaz/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/web/interfaz/dist/js/demo.js"></script>
	</body>
  </html>';

if (isset($_POST)) {
	if ($_POST['submit'] == "datos") {

		Principal::insertarDispositivo($_POST);
		$disp = Area_personal::obtenerDispositivo($_POST['id']);
		echo $disp;
	}

}

BD::desconectar();

?>




