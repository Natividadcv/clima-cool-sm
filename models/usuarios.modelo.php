<?php

require_once "conexion.php";


class ModeloUsuarios
{
  /*=============================================
  MOSTRAR USUARIOS
  =============================================*/

  public static function MdlMostrarUsuarios($tabla, $item, $valor)
  {
    if ($item != null) { // Si el item no es nulo, se hace una consulta con el item y el valor

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item"); // Se prepara la consulta

      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR); // Se enlaza el parámetro con el valor, PARAM_STR es para indicar que es un string

      $stmt->execute(); // Se ejecuta la consulta

      return $stmt->fetch(); // Se retorna el resultado de la consulta

    } else { // Si el item es nulo, se hace una consulta sin item y valor

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
}
