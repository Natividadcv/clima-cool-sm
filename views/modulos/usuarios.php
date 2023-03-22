<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Contenido -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Administrar Reportes</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Usuario</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">

            <button class="btn btn-primary" data-toggle="modal" data-target='#modalAgregarUsuario'>
              Agregar Usuario
            </button>
          </div>
          <div class="card-body">



            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Foto</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Ultimo Login</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php

                $item = null;

                $valor = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                foreach ($usuarios as $key => $value) {
                  echo '<tr>
                  <td>' . ($key + 1) . '</td>
                  <td>' . $value["nombre"] . '</td>
                  <td>' . $value["usuario"] . '</td>
                  <td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>
                  <td>' . $value["perfil"] . '</td>
                  <td><button class="btn btn-success btn-xs">Activado</button></td>
                  <td>' . $value["ultimo_login"] . '</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>
                      <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                    </div>
                  </td>
                </tr>';
                }
                ?>


            </table>
          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            Usuarios
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- / Contenido -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!--  MODAL AGREGAR USUARIO   -->

  <!-- Modal -->
  <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form role="form" method="post" action="" enctype="multipart/form-data">

          <div class="modal-header" style="background:#3c8dbc; color:white;">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuarios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--  ENTRADA PARA EL NOMBRE   -->

          <div class="modal-body">
            <div class="box-body">



              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                  <input class="form-control form-control" type="text" name="txtNuevoNombre" placeholder="Ingresar nombre" required>
                </div>
              </div>

              <!--  ENTRADA PARA EL USUARIO   -->



              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  <input class="form-control form-control" type="text" name="txtNuevoUsuario" placeholder="Ingresar usuario" required>
                </div>
              </div>


              <!--  ENTRADA PARA CONTRASEÑA   -->

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                  <input class="form-control form-control" type="password" name="txtNuevoPass" placeholder="Ingresar Contraseña" required>
                </div>
              </div>



              <!--  ENTRADA PARA SELECCIONAR SU PERFIL   -->

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="txtNuevoPerfil">
                    <option value="">Seleccionar Perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>

              <!--  ENTRADA PARA SUBIR FOTO   -->



              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              </div>
            </div>
          </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </div>
    </div>
  </div>

  <?php

  $crearUsuario = new ControladorUsuarios();
  $crearUsuario->ctrCrearUsuario();

  ?>


  </form>
  </div>
  </div>
  </div>





  <!--  MODAL EDITAR USUARIO   -->

  <!-- Modal -->
  <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form role="form" method="post" action="" enctype="multipart/form-data">

          <div class="modal-header" style="background:#3c8dbc; color:white;">
            <h5 class="modal-title" id="exampleModalLabel">Editar Usuarios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--  ENTRADA PARA EL NOMBRE   -->

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                  <input class="form-control form-control" type="text" name="txtEditarNombre" id="txtEditarNombre" required>
                </div>
              </div>


              <!--  ENTRADA PARA EL USUARIO   -->



              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  <input class="form-control form-control" type="text" name="txtEditarUsuario" id="txtEditarUsuario" value="<?php ?>" readonly>
                </div>
              </div>


              <!--  ENTRADA PARA CONTRASEÑA   -->

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                  <input class="form-control form-control" type="password" name="txtEditarPass" placeholder="Escriba nueva contraseña" required>

                  <input type="hidden" id="passwordActual" name="passwordActual">




                </div>
              </div>



              <!--  ENTRADA PARA SELECCIONAR SU PERFIL   -->

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="txtEditarPerfil">

                    <option value="" id="editarPerfil"></option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>

                  </select>
                </div>
              </div>

              <!--  ENTRADA PARA SUBIR FOTO   -->



              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" name="editarFoto" id="editarFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                <input type="hidden" name="fotoActual" id="fotoActual">



              </div>
            </div>
          </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Editar usuario</button>
          </div>
          <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario->ctrEditarUsuario();

          ?>
        </form>
      </div>
    </div>
  </div>











</body>

</html>