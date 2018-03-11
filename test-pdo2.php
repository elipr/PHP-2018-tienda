<?php
 require_once 'clases/util/conexion.php';
 $pdo = conexion::getConexion();
 var_dump($pdo);
 new conexion();

 /// ....
  $pdo = conexion::getConexion();
 var_dump($pdo);
 