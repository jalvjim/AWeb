<?
	include('../../../php/Area_personal.class.php') ;
		
	include('../../../php/BD.class.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Area Persona | Gran Manzana</title>
    
    <?php require_once('../../head.php'); ?>
  
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php require_once('../../header.php'); ?>
        <?php require_once('../../left-column.php'); ?>

        <div class="content-wrapper">

            <section class="content-header">
              <h1>
                Notificaciones
                <small>Control de Notificaciones</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="http://pruebas.granmanzana.es/areapersonal/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Notificaciones</li>
              </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Esta es la información que quieres recibir de granmanzana.es a través de tu e-mail</h3>
                            </div><!-- /.box-header -->

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                          <input type="checkbox">
                                          Recibir alertas
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                            Recibir estadísticas de tus anuncios
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                            Recibir boletines y promociones
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /. box -->
                    </div><!-- /.col -->
                </div>
            </section><!-- /.content -->
        </div>


        <?php require_once('../../footer.php'); ?>

    </div> <!-- end wrapper  -->

    <!-- jQuery 2.1.4 -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);



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
  </html>