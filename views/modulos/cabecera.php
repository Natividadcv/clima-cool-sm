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


</head>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../../index3.html" class="nav-link">Inicio</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">2</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">3 Notificaciones</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> Pedro le urge mantenimiento
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> Franco
          <span class="float-right text-muted text-sm">12 horas</span>
        </a>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


        <li class="nav-item">
          <a href="inicio" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Inicio
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="usuarios" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Usuarios
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="inventario" class="nav-link">
            <i class="nav-icon fas fa-box-open"></i>
            <p>
              Inventario
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="clientes" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Clientes
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="venta-aire" class="nav-link">
            <i class="nav-icon fas fa-wind"></i>
            <p>
              Venta de aire
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="instalacion" class="nav-link">
            <i class="nav-icon fas fa-fan"></i>
            <p>
              Instalacion de aire
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="mantenimiento" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Mantenimiento
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="reportes" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Reporte
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>