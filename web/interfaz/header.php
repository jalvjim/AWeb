<header class="main-header">

  <!-- LOGOS -->
  <a href="http://localhost/web/interfaz/index.php" class="logo">
    <span class="logo-mini"><span style='color: #000'>g</span> <span style='color: orange'>m</span></span>
    <span class="logo-lg"><img src="http://localhost/images/arduino.png" alt=""></span>
  </a>

        <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">

    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>

    <!-- navbar menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- Nombre Usuario  -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="http://localhost/web/interfaz/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?Principal::obtener_nombre($_SESSION['usuario_id'])?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="http://localhost/web/interfaz/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                Jaime - Desarrollador web
                <small>Miembro desde Dic. 2015</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="col-xs-4 text-center">
                <a href="#">Seguidores</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Ventas</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Amigos</a>
              </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="http://localhost/web/interfaz/pages/datos/datos.php" class="btn btn-default btn-flat">Perfil</a>
              </div>
              <div class="pull-right">
                <a href="http://localhost/web/php/cerrar_sesion.php" class="btn btn-default btn-flat">Desconectar</a>
              </div>
            </li>
          </ul>
        </li>

        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>

      </ul>
    </div>

  </nav>

</header>
