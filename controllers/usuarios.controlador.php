<?php

class ControladorUsuarios
{

  /*=============================================
      INGRESO DE USUARIO
      =============================================*/

  static public function ctrIngresoUsuario()
  {

    if (isset($_POST["user"])) {

      if (
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["user"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])
      ) {

        $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $tabla = "usuarios";

        $item = "usuario"; // La columna de la tabla que se va a comparar con el valor de la variable $valor

        $valor = $_POST["user"]; // El valor que se va a comparar con la columna de la tabla

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor); // Se llama al modelo para que haga la consulta a la base de datos

        // var_dump($respuesta["usuario"]);

        // == $encriptar
        if ($respuesta["usuario"] == $_POST["user"] && $respuesta["password"] == $encriptar) {

          echo '<br><div class="alert alert-success">Bienvenido al sistema</div>';

          $_SESSION["iniciarSesion"] = "ok";
          $_SESSION["id"] = $respuesta["id"];
          $_SESSION["nombre"] = $respuesta["nombre"];
          $_SESSION["usuario"] = $respuesta["usuario"];
          $_SESSION["foto"] = $respuesta["foto"];
          $_SESSION["perfil"] = $respuesta["perfil"];


          echo '<script>
            window.location = "inicio";
          </script>';
        }
      } else {
        echo '<br>
                          <div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
      }
    }
  }

  /*=============================================
      REGISTRO DE USUARIO
      =============================================*/

  static public function ctrCrearUsuario()
  {

    if (isset($_POST["txtNuevoNombre"])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["txtNuevoNombre"]) && // Validar que el nombre solo contenga letras y espacios
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtNuevoUsuario"]) && // Validar que el usuario solo contenga letras y números
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtNuevoPass"])
      ) { // Validar que la contraseña solo contenga letras y números

        /*=============================================
        VALIDAR IMAGEN
        =============================================*/

        $ruta = "";

        if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /*=============================================
            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
            =============================================*/

          $directorio = "views/img/usuarios/" . $_POST["txtNuevoUsuario"];

          mkdir($directorio, 0755);

          /*=============================================
            DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
            =============================================*/

          if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

            /*=============================================
              GUARDAMOS LA IMAGEN EN EL DIRECTORIO
              =============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "views/img/usuarios/" . $_POST["txtNuevoUsuario"] . "/" . $aleatorio . ".jpg";

            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);
          }

          if ($_FILES["nuevaFoto"]["type"] == "image/png") {

            /*=============================================
              GUARDAMOS LA IMAGEN EN EL DIRECTORIO
              =============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "views/img/usuarios/" . $_POST["txtNuevoUsuario"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }


        $tabla = "usuarios";

        $encriptar = crypt($_POST["txtNuevoPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $datos = array(
          "nombre" => $_POST["txtNuevoNombre"],
          "usuario" => $_POST["txtNuevoUsuario"],
          "password" => $encriptar,
          "perfil" => $_POST["txtNuevoPerfil"],
          "foto" => $ruta
        );

        $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>
        
          const swal = new SweetAlert({
            type: "success",
            title: "¡El usuario ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
              if (result.value) {
                window.location = "usuarios";
              }
            });

          </script>';
        }
      } else {
        echo '<script>
        
         const swal = new SweetAlert({
            type: "error",
            title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
              if (result.value) {
                window.location = "usuarios";
              }
            });

          </script>';
      }
    }
  }

  /*=============================================
      MOSTRAR USUARIOS
      =============================================*/

  static public function ctrMostrarUsuarios($item, $valor)
  {

    $tabla = "usuarios";

    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

    return $respuesta;
  }
}
