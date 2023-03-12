<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clima | Cool</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


  <!-- SweetAlert2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>


  <link rel="icon" href="views/img/plantilla/logo.png">


</head>

<!-- ========================================
    Contenido
          =======================================-->

<body class="hold-transition sidebar-mini">

  <?php

  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    echo '<div class="wrapper">';

    include "modulos/cabecera.php";

    if (isset($_GET["ruta"])) {
      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "inventario" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "venta-aire" ||
        $_GET["ruta"] == "instalacion" ||
        $_GET["ruta"] == "mantenimiento" ||
        $_GET["ruta"] == "reportes" ||
        $_GET["ruta"] == "salir"
      ) {
        # code...
        include "modulos/" . $_GET["ruta"] . ".php";
      } else {
        # code...
        include "modulos/404.php";
      }
    } else {
      include "modulos/inicio.php";
    }

    include "modulos/footer.php";

    echo '</div>';
  } else {
    include "modulos/login.php";
  }
  ?>



</body>

</html>