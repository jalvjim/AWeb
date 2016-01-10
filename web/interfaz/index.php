<?php

if (empty($_SESSION)) {
	header("http://localhost/web/interfaz/login.php");
}

include '../php/Principal.class.php';

include '../php/BD.class.php';
session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Escritorio | Gran Manzana</title>

    <?php require_once 'head.php';?>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php require_once 'header.php';?>

      <?php require_once 'left-column.php';?>

      <?php require_once 'content.php';?>

      <?php require_once 'footer.php';?>

      <?php require_once 'control-sidebar.php';?>

      <!-- Color de fondo -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <?php require_once 'script-footer.php';?>

  </body>
</html>
