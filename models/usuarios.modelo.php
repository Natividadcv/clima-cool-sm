<?php

require_once "conexion.php";


class ModeloUsuarios
{
  /*=============================================
  MOSTRAR USUARIOS
  =============================================*/

  public static function MdlMostrarUsuarios($tabla, $item, $valor)
  {

    if ($item != null) {

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item"); // Se prepara la consulta

      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string

      $stmt->execute(); // Se ejecuta la consulta

      return $stmt->fetch(); // Se retorna el resultado de la consulta

    } else {

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); // Se prepara la consulta

      $stmt->execute(); // Se ejecuta la consulta

      return $stmt->fetchAll(); // Se retorna el resultado de la consulta
    }

    $stmt->close(); // Se cierra la conexión

    $stmt = null; // Se destruye la variable
  }


  /*=============================================
  REGISTRO DE USUARIO
  =============================================*/

  /*=============================================
 Este es un fragmento de código en PHP que contiene una función llamada mdlIngresarUsuario que se encarga de insertar datos de un usuario en una tabla de base de datos.

La función espera dos parámetros: el nombre de la tabla y los datos del usuario a insertar en la tabla. Los datos deben estar en un array asociativo que contenga las claves "nombre", "usuario", "password", "perfil" y "foto", con sus respectivos valores.

La función utiliza la clase Conexion para establecer una conexión con la base de datos y preparar una consulta SQL para insertar los datos del usuario en la tabla. La consulta utiliza marcadores de posición :nombre, :usuario, :password, :perfil y :foto para indicar los valores que se van a insertar en la tabla.

Luego, la función enlaza los valores del array asociativo con los marcadores de posición utilizando el método bindParam() de la clase PDOStatement. Los valores se enlazan con los marcadores de posición para evitar posibles inyecciones de SQL y garantizar la seguridad de la aplicación.

A continuación, se ejecuta la consulta utilizando el método execute() de la clase PDOStatement. Si la consulta se ejecuta correctamente, la función devuelve la cadena "ok". En caso contrario, devuelve la cadena "error".

Por último, se cierra la conexión con la base de datos y se destruye la variable $stmt.

En resumen, esta función se encarga de insertar los datos de un usuario en una tabla de base de datos y devuelve un mensaje indicando si la operación se realizó correctamente o no. Es importante destacar que este es sólo un fragmento de código, y que es posible que el resto de la aplicación contenga más lógica para procesar la información y realizar otras tareas.
  =============================================*/

  public static function mdlIngresarUsuario($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) VALUES (:nombre, :usuario, :password, :perfil, :foto)"); // Se prepara la consulta

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string
    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string
    $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string
    $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string

    if ($stmt->execute()) { // Se ejecuta la consulta

      return "ok"; // Se retorna el resultado de la consulta

    } else {

      return "error"; // Se retorna el resultado de la consulta
    }

    $stmt->close(); // Se cierra la conexión

    $stmt = null; // Se destruye la variable
  }


  /*=============================================
  EDITAR USUARIO
  =============================================*/

  static public function mdlEditarUsuario($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario"); // Se prepara la consulta



    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string

    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string

    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string

    $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string

    $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string

    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT); // Se enlaza el parámetro con el valor, PARAM_INT es para indicar que es un entero

    if ($stmt->execute()) { // Se ejecuta la consulta

      return "ok"; // Se retorna el resultado de la consulta

    } else {

      return "error"; // Se retorna el resultado de la consulta
    }

    $stmt->close(); // Se cierra la conexión

    $stmt = null; // Se destruye la variable



  }
}
