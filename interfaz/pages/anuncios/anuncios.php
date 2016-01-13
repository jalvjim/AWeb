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
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php require_once('../../head.php'); ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php require_once('../../header.php'); ?>
        <?php require_once('../../left-column.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Anuncios
                <small>Control de Anuncios</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="http://pruebas.granmanzana.es/areapersonal/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Anuncios</li>
              </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row">
            
                <div class="col-md-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Anuncios</h3>
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" class="form-control input-sm" placeholder="Search Mail">
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                        <div class="btn-group">
                          <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                          <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                          <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div><!-- /.btn-group -->
                        <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                          1-4/4
                          <div class="btn-group">
                            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                          </div><!-- /.btn-group -->
                        </div><!-- /.pull-right -->
                      </div>
                      <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                          <tbody>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="edit-anuncio.php">KAWASAKI ZX 10R</a></td>
                              <td class="mailbox-subject">KAWASAKI ZX 10R, Gasolina, año 2012, color ...</td>
                              <td class="mailbox-attachment"></td>
                              <td class="mailbox-date"><a href="http://pruebas.granmanzana.es/motos/kawasaki-zx-10r-gmm79097.htm" target="_blank"><i class="fa fa-fw fa-eye"></i></a></td>
                              <td class="mailbox-date">5 mins ago</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="edit-anuncio.php">HARLEY DAVIDSON VRSC V-Rod 10º Aniversario</a></td>
                              <td class="mailbox-subject">HARLEY DAVIDSON VRSC V-Rod 10º Aniversario, Gasolina, año ...</td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date"><a href="http://pruebas.granmanzana.es/motos/harley-davidson-vrsc-v-rod-10-aniversario-gmm79172.htm" target="_blank"><i class="fa fa-fw fa-eye"></i></a></td>
                              <td class="mailbox-date">28 mins ago</td>
                            </tr>
                            
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="edit-anuncio.php">APRILIA RS4 125</a></td>
                              <td class="mailbox-subject">APRILIA RS4 125, Gasolina, año 2014, precio,...</td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date"><a href="http://pruebas.granmanzana.es/motos/aprilia-rs4-125-gmm106271.htm" target="_blank"><i class="fa fa-fw fa-eye"></i></a></td>
                              <td class="mailbox-date">15 days ago</td>
                            </tr>
                              <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="edit-anuncio.php">SMART roadster 61CV</a></td>
                              <td class="mailbox-subject">SMART roadster, Gasolina, año 2003, 72068 kilómetros,...</td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date"><a href="http://pruebas.granmanzana.es/coches/smart-roadster-61cv-gmm30754.htm" target="_blank"><i class="fa fa-fw fa-eye"></i></a></td>
                              <td class="mailbox-date">15 days ago</td>
                            </tr>
                          </tbody>
                        </table><!-- /.table -->
                      </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer no-padding">
                      <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                        <div class="btn-group">
                          <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                          <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                          <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                        </div><!-- /.btn-group -->
                        <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        <div class="pull-right">
                          1-4/4
                          <div class="btn-group">
                            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                          </div><!-- /.btn-group -->
                        </div><!-- /.pull-right -->
                      </div>
                    </div>
                  </div><!-- /. box -->
                </div><!-- /.col -->

                </div>
            </section><!-- /.content -->

        </div>


        <?php require_once('../../footer.php'); ?>
    </div> <!-- end wrapper  -->



    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
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