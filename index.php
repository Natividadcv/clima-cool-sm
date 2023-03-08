<?php
require_once("controllers/plantilla.controlador.php");

require_once("controllers/usuarios.controlador.php");
require_once("controllers/inventario.controlador.php");
require_once("controllers/clientes.controlador.php");
require_once("controllers/venta-aire.controlador.php");
require_once("controllers/instalacion.controlador.php");
require_once("controllers/mantenimiento.controlador.php");
require_once("controllers/reportes.controlador.php");

require_once("models/usuarios.modelo.php");
require_once("models/inventario.modelo.php");
require_once("models/clientes.modelo.php");
require_once("models/venta-aire.modelo.php");
require_once("models/instalacion.modelo.php");
require_once("models/mantenimiento.modelo.php");
require_once("models/reportes.modelo.php");





$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
