<?php

class ControladorUsuarios
{

  /*=============================================
      INGRESO DE USUARIO
      =============================================*/

  public function ctrIngresoUsuario()
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
                          <div class="alert alert-danger">EEError al ingresar, vuelve a intentarlo</div>';
      }
    }
  }
}
