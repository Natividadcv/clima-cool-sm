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

            $aleatorio = mt_rand(100, 999); // * Genera un número aleatorio entre 100 y 999

            $ruta = "views/img/usuarios/" . $_POST["txtNuevoUsuario"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }


        $tabla = "usuarios";

        $encriptar = crypt($_POST["txtNuevoPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); // * Encriptar la contraseña

        $datos = array(
          "nombre" => $_POST["txtNuevoNombre"],
          "usuario" => $_POST["txtNuevoUsuario"],
          "password" => $encriptar,
          "perfil" => $_POST["txtNuevoPerfil"],
          "foto" => $ruta
        ); // * Se crea un array con los datos que se van a insertar en la base de datos

        $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos); // * Se llama al modelo para que haga la consulta a la base de datos

        if ($respuesta == "ok") { // * Si la respuesta es ok se muestra un mensaje de éxito


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
      } else { // * Si la respuesta no es ok se muestra un mensaje de error
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
  // * Se crea un método estático para mostrar los usuarios
  static public function ctrMostrarUsuarios($item, $valor)
  {

    $tabla = "usuarios"; // * Se crea una variable con el nombre de la tabla

    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor); // * Se llama al modelo para que haga la consulta a la base de datos

    return $respuesta; // * Se retorna la respuesta
  }


  /*=============================================
      EDITAR USUARIOS ctrEditarUsuario
      =============================================*/
  // * Se crea un método estático para editar los usuarios
  static public function ctrEditarUsuario()
  {

    if (isset($_POST["txtEditarNombre"])) { // * Si se envía el formulario de editar usuario

      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["txtEditarNombre"])) { // * Validar que el nombre solo contenga letras y números

        /*=============================================
            VALIDAR IMAGEN
            =============================================*/

        $ruta = $_POST["fotoActual"]; // * Se crea una variable con la ruta de la foto actual

        if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) { // * Si se envía una nueva foto

          list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]); // * obtenemos el ancho y alto de la imagen

          $nuevoAncho = 500; // * Se crea una variable con el nuevo ancho de la imagen
          $nuevoAlto = 500; // * Se crea una variable con el nuevo alto de la imagen

          /*=============================================
              CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
              =============================================*/

          $directorio = "views/img/usuarios/" . $_POST["txtEditarUsuario"]; // * Se crea una variable con el directorio donde se va a guardar la foto

          /*=============================================
              PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
              =============================================*/

          if (!empty($_POST["fotoActual"])) { // * Si la foto actual no está vacía

            unlink($_POST["fotoActual"]); // * borramos la imagen anterior
          } else { // * Si la foto actual está vacía

            mkdir($directorio, 0755); // * si no existe la carpeta la creamos
          }

          /*=============================================
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
              =============================================*/

          if ($_FILES["editarFoto"]["type"] == "image/jpeg") { // * Si la imagen es jpg

            /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

            $aleatorio = mt_rand(100, 999); // * Genera un número aleatorio entre 100 y 999

            $ruta = "views/img/usuarios/" . $_POST["txtEditarUsuario"] . "/" . $aleatorio . ".jpg"; // * Se crea una variable con la ruta de la imagen

            $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]); // * Se crea una variable con la imagen original

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto); // * Se crea una variable con la imagen destino

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto); // * Se copia la imagen original en la imagen destino

            imagejpeg($destino, $ruta); // * Se guarda la imagen destino en la ruta
          }

          if ($_FILES["editarFoto"]["type"] == "image/png") { // * Si la imagen es png

            /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

            $aleatorio = mt_rand(100, 999);

            $ruta = "views/img/usuarios/" . $_POST["txtEditarUsuario"] . "/" . $aleatorio . ".png";

            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);
          }
        }

        $tabla = "usuarios";

        if ($_POST["txtEditarPass"] != "") { // * si la contraseña no esta vacia

          if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtEditarPass"])) { // * si la contraseña no tiene caracteres especiales

            $encriptar = crypt($_POST["txtEditarPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
          } else { // * si la contraseña tiene caracteres especiales

            echo '<script>
        
            const swal = new SweetAlert({
              type: "error",
              title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then(function(result){
                if (result.value) {
                  window.location = "usuarios";
                }
              });
  
            </script>';
          }
        } else { // * si la contraseña esta vacia

          $encriptar = $_POST["passwordActual"]; // * la contraseña actual
        }

        $datos = array(
          "nombre" => $_POST["txtEditarNombre"],
          "usuario" => $_POST["txtEditarUsuario"],
          "password" => $encriptar,
          "perfil" => $_POST["txtEditarPerfil"],
          "foto" => $ruta
        );

        $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

        if ($respuesta == "ok") { // * Si la respuesta es ok

          echo '<script>
        
          const swal = new SweetAlert({
            type: "success",
            title: "¡El usuario ha sido editado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
              if (result.value) {
                window.location = "usuarios";
              }
            });

          </script>';
        }
      } else { // * Si el nombre no es válido

        echo '<script>
          
          const swal = new SweetAlert({
            type: "error",
            title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
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
}
