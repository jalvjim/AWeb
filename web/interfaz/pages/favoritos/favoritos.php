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
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="http://pruebas.granmanzana.es/areapersonal/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php require_once('../../header.php'); ?>
        <?php require_once('../../left-column.php'); ?>

        <div class="content-wrapper">

            <section class="content-header">
              <h1>
                Favoritos
                <small>Control de Favoritos</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="http://pruebas.granmanzana.es/areapersonal/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Favoritos</li>
              </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row">
            
                <div class="col-md-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Favoritos</h3>
                      <div class="box-tools pull-right">
                        <div class="has-feedback">
                          <input type="text" class="form-control input-sm" placeholder="Buscar Mensaje">
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
                          1-3/3
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
                              <td class="mailbox-name"><a href="http://pruebas.granmanzana.es/coches/mazda-mazda6-2-2-de-175cv-luxury-gmm30791.htm" target="_blank">MAZDA Mazda6 2.2 DE 175cv Luxury</a></td>
                              <td class="mailbox-subject">MAZDA Mazda6, Diesel, año 2015, 6800 kilómetros, ...</td>
                              <td class="mailbox-attachment"></td>
                              <td><a href="http://pruebas.granmanzana.es/coches/mazda-mazda6-2-2-de-175cv-luxury-gmm30791.htm" target="_blank"> <i class="fa fa-fw fa-eye"></i></a></td>
                              <td class="mailbox-date">5 mins ago</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="http://pruebas.granmanzana.es/coches/toyota-urban-cruiser-1-4-d4d-active-gmm30789.htm" target="_blank">TOYOTA Urban Cruiser 1.4 D4D Active</a></td>
                              <td class="mailbox-subject">TOYOTA Urban Cruiser, Diesel, año 2010, 27000 kilómetros, ...</td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td><a href="http://pruebas.granmanzana.es/coches/toyota-urban-cruiser-1-4-d4d-active-gmm30789.htm" target="_blank"><i class="fa fa-fw fa-eye"></i></a></td>
                              <td class="mailbox-date">28 mins ago</td>
                            </tr>
                            
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td class="mailbox-name"><a href="http://pruebas.granmanzana.es/coches/nissan-juke-1-6-tekna-premium-17-4x2-gmm18525.htm" target="_blank">NISSAN JUKE 1.6 TEKNA PREMIUM 4X2</a></td>
                              <td class="mailbox-subject">NISSAN JUKE, Gasolina, año 2011, 70000 kilómetros,...</td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td><a href="http://pruebas.granmanzana.es/coches/nissan-juke-1-6-tekna-premium-17-4x2-gmm18525.htm" target="_blank"><i class="fa fa-fw fa-eye"></i></a></td>
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
                          1-3/3
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