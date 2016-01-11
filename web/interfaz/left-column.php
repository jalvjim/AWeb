

<?
include('../php/Principal.class.php');
?>
 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <a href="http://localhost/web/interfaz/index.php">
                <img src="http://localhost/web/images/arduino.png" class="img-circle" alt="User Image">
              </a>
            </div>
            <div class="pull-left info">
              <p>sensorAdmin</p>
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

            <!-- Inicio -->
            <li>
              <a href="http://localhost/web/interfaz/index.php">
                <i class="fa fa-dashboard"></i> <span>Inicio</span>
              </a>
            </li>

            <!-- Dispositivos -->
            <li>
              <a href="http://localhost/web/interfaz/pages/dispositivos/dispositivos.php">
                <i class="fa fa-laptop"></i> <span>Dispositivos</span>

                <small class="label label-primary pull-right">
				<?

					BD::conectar();
					$num_dispositivos=Principal::contarDispositivos();
					if (empty($num_dispositivos))
						echo 0;
					else
						echo $num_dispositivos['total_count'];
					BD::desconectar();
				?>
				</small>
              </a>
            </li>

            <!-- Medidas -->
            <li>
              <a href="http://localhost/web/interfaz/pages/medidas/medidas.php">
                <i class="fa fa-envelope"></i> <span>Medidas</span>
                <small class="label pull-right bg-green">
					       <?

          BD::conectar();
          $num_medidas_nuevas=Principal::contarNuevasMedidas();
          if (empty($num_medidas_nuevas))
            echo 0;
          else
            echo $num_medidas_nuevas['total_count'];
          BD::desconectar();
        ?>
				</small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

