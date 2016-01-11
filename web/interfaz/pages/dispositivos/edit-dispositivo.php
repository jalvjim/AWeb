<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Anuncio | Gran Manzana</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php require_once('../../head.php'); ?>
    <style type="text/css">
      #mapCanvas {
        width: 100%; 
        height: 350px;
        border: 1px solid #ddd;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php require_once('../../header.php'); ?>
    <?php require_once('../../left-column.php'); ?>
    <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Formulario general
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://pruebas.granmanzana.es/areapersonal/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="http://pruebas.granmanzana.es/areapersonal/pages/anuncios/anuncios.php">Anuncios</a></li>
        <li class="active">Editar anuncio</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Ediar datos del anuncio</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
        
          <form role="form">
          <div class="col-md-6">
            <!-- Titulo -->
            <div class="form-group">
              <label>Título</label>
              <input type="text" class="form-control" placeholder="Título del anuncio">
            </div>

            <!-- Descripción -->
            <div class="form-group">
              <label>Descripción</label>
              <textarea class="form-control" rows="3" placeholder="Descripción del anuncio"></textarea>
            </div>

            
        
            <!-- Provincia -->
            <div class="form-group">
              <label>Provincia</label>
              <input type="text" class="form-control" placeholder="Provincia">
            </div>

            <!-- Población -->
            <div class="form-group">
              <label>Población</label>
              <input type="text" class="form-control" placeholder="Pblación">
            </div>

            <!-- Mapa -->
            <div class="form-group">
              <div class="info">Puede arrastrar la marca al lugar deseado para localizar el anuncio</div>
              <div id="mapCanvas"></div>
            </div>




            </div>
            <div class="col-md-6">
            <!-- Precio -->
            <div class="form-group">
              <label>Precio</label>
              <input type="text" class="form-control" placeholder="Enter ...">
            </div>
            <!-- Estado -->
            <div class="form-group">
              <label>Estado</label>
              <input type="text" class="form-control" placeholder="Enter ...">
            </div>
            <!-- Negociable -->
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Negociable 
                </label>
              </div>
            </div>  
            <!-- Urgente -->
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Urgente 
                </label>
              </div>
            </div>
            <!-- Imagenes -->
            <div class="form-group">
              
                <h2> Imágenes </h2>
                <div class="modal-content">
                <span class="glyphicon glyphicon-camera"></span>
                <span class="glyphicon glyphicon-camera"></span>
                <span class="glyphicon glyphicon-camera"></span>
                <span class="glyphicon glyphicon-camera"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
          </div>

          </form>
        
        </div><!-- /.box-body -->
      </div>
    </section> 
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

    <!-- MapsGoogle -->
    <script type="text/javascript">
      var geocoder, map, markers = [];
      function crearMarker(map, loc) {
    var marker = new google.maps.Marker();    
    marker.setMap(map);
    marker.setPosition(loc);
    marker.setDraggable(true);
    
    google.maps.event.addListener(marker, "dragend", function(event) { 
      $("#coords").val(event.latLng.toString().replace(/\(|\)/g, ''));
    });
    markers.push(marker);
    return marker;
  }
  
  function initialize() {                   
    geocoder = new google.maps.Geocoder();
      
    var mapOptions = {
      zoom: 8,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    
    var markers = [];

    
  <?php if (!isset($otrosDatos['coords'])) { ?>
    var loc = new google.maps.LatLng(40.4167754, -3.7037901999999576);
    var marker = null;
    
    if(navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        loc = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
        map.setCenter(loc);
        marker = crearMarker(map, loc);
        $("#coords").val(loc.toString().replace(/\(|\)/g, ''));
      }, function() {
        map.setCenter(loc);
        marker = crearMarker(map, loc);
        $("#coords").val(loc.toString().replace(/\(|\)/g, ''));
      });
    }
    else {
      map.setCenter(loc);
      marker = crearMarker(map, loc);
      $("#coords").val(loc.toString().replace(/\(|\)/g, ''));
    }
  <?php } else { ?>
    var loc = new google.maps.LatLng(<?php echo $otrosDatos['coords'] ?>);
    map.setCenter(loc);
    map.setZoom(14);
    marker = crearMarker(map, loc);
    $("#coords").val(loc.toString().replace(/\(|\)/g, ''));
  <?php } ?>
  
    google.maps.event.addListener(map, "dblclick", function(event) {
      borrarMarkers();
      marker = crearMarker(map, event.latLng);
      $("#coords").val(event.latLng.toString().replace(/\(|\)/g, ''));
    });
  }

  function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize';
    document.body.appendChild(script);
  }

  window.onload = loadScript;  

    </script>
  </body>
  </html>