<?
	include('../../../php/Principal.class.php') ;

	include('../../../php/BD.class.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sensorAdmin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php require_once '../../head.php';?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php require_once '../../left-column.php';?>

        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Dispositivos
                <small>Control de Dispositivos</small>
              </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                <div class="col-md-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Dispositivos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                          <tbody>
                              <?
                              $dispositivos = Principal::obtenerDispositivos();
                              print_r($dispositivos);
                              $i = 0;
                              while ($i < count($dispositivos)) {?>
	                          <tr>
                              <td class="mailbox-name"><a href="edit-dispositivo.php?id=<?$dispositivos[$i]['id'] ?>"> <? $dispositivos[$i]['id'] ?></a></td>
                              <td class="mailbox-subject"> <? $dispositivos[$i]['descripcion'] ?> </td>
                              <td class="mailbox-date"> <? $dispositivos[$i]['ubicacion'] ?> </td>
                            </tr>
                            <?
                                $i++;
                              }
                              ?>

                          </tbody>
                        </table><!-- /.table -->
                      </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                  </div><!-- /. box -->
                </div><!-- /.col -->

                </div>
            </section><!-- /.content -->

        </div>


        <?php require_once '../../footer.php';?>
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
  </html>