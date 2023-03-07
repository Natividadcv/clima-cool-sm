<!-- Navbar -->
<?php
include "modulos/cabecera.php";

if (isset($_GET["ruta"])) {
  # code...
  if (
    $_GET["ruta"] == "inicio" ||
    $_GET["ruta"] == "usuarios" ||
    $_GET["ruta"] == "categorias" ||
    $_GET["ruta"] == "productos" ||
    $_GET["ruta"] == "clientes" ||
    $_GET["ruta"] == "ventas" ||
    $_GET["ruta"] == "crear-venta" ||
    $_GET["ruta"] == "reportes" ||
    $_GET["ruta"] == "salir"
  ) {
    # code...
    include "modulos/" . $_GET["ruta"] . ".php";
  } else {
    # code...
    include "modulos/404.php";
  }
}




include "modulos/footer.php";
?>