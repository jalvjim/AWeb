
<?session_start();?>
 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="http://pruebas.granmanzana.es/areapersonal/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nombre'] ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Navegación principal</li>

            <!-- ESCRITORIO -->
            <li>
              <a href="http://pruebas.granmanzana.es/areapersonal/index.php">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
              </a>
            </li>

            <!-- ANUNCIOS -->
            <li>
              <a href="http://pruebas.granmanzana.es/areapersonal/pages/anuncios/anuncios.php">
                <i class="fa fa-laptop"></i> <span>Anuncios</span>

                <small class="label label-primary pull-right">
				<?
				/*
					BD::conectar();
					$num_mensajes=Area_personal::contarMensajes($_SESSION['usuario_id']);
					if (empty($num_mensajes))
						echo 0;
					else
						echo $num_mensajes['total_count'];
					BD::desconectar();*/
				?>
				</small>
              </a>
            </li>

            <!-- MENSAJES -->
            <li>
              <a href="http://pruebas.granmanzana.es/areapersonal/pages/mailbox/mailbox.php">
                <i class="fa fa-envelope"></i> <span>Mensajes</span>
                <small class="label pull-right bg-green">
								<?

					BD::conectar();
					$num_anuncios=Area_personal::contarAnuncios($_SESSION['usuario_id']);
					if (empty($num_anuncios))
						echo 0;
					else
						echo $num_anuncios['total_count'];
					BD::desconectar();
				?>
				</small>
              </a>
            </li>

            <!-- FAVORITOS -->
            <li>
              <a href="http://pruebas.granmanzana.es/areapersonal/pages/favoritos/favoritos.php">
                <i class="fa fa-star-o"></i> <span>Favoritos</span>
                <small class="label pull-right bg-yellow">3</small>
              </a>
            </li>

            <!-- NOTIFICACIONES -->
            <li>
              <a href="http://pruebas.granmanzana.es/areapersonal/pages/notificaciones/notificaciones.php">
                <i class="fa fa-bell-o"></i> <span>Notificaciones</span>
                <small class="label pull-right bg-yellow">10</small>
              </a>
            </li>

            <!-- DATOS -->
            <li>
              <a href="http://pruebas.granmanzana.es/areapersonal/pages/datos/datos.php">
                <i class="fa fa-user"></i> <span>Perfil</span>
              </a>
            </li>

            <!-- AYUDA -->
            <li>
              <a href="http://pruebas.granmanzana.es/areapersonal/pages/ayuda/ayuda.php">
                <i class="fa fa-question"></i> <span>Ayuda</span>
              </a>
            </li>

            <!-- CERRAR SESSION -->
            <li>
              <a href="http://pruebas.granmanzana.es/php/cerrar_sesion.php">
                <i class="fa fa-unlock"></i> <span>Cerrar Session</span>
              </a>
            </li>
             <li><hr></li>

             <li class="header">ADMINISTRADORES</li>
             <li>
                <a href="#">
                  <i class="fa fa-bar-chart"></i><span>Estadisticas</span>
                </a>
             </li>
             <li>
                <a href="#">
                  <i class="fa fa-fw fa-users"></i><span>Usuarios</span>
                </a>
             </li>

          </ul>


        </section>
        <!-- /.sidebar -->
      </aside>

