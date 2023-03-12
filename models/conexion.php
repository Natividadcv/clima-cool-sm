<?php

class Conexion
{
  public $dbh;
  static public function conectar()
  {
    try {


      $link = new PDO("mysql:host=sql355.main-hosting.eu;dbname=u433272284_climaCool", "u433272284_nativiDev", "yLZMXG>s1");


      $link->exec("set names utf8");

      return $link;
    } catch (Exception $e) {
      print "¡Error DB!: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}
