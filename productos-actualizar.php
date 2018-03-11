<?php
require_once './autoload.php';
// validaciones
if(!isset($_POST['categorias_id']) || '' === $_POST['categorias_id'])
    die('Categoría inválida');

if(!isset($_POST['nombre']) || strlen($_POST['nombre']) <= 3)
    die('Modelo debe ser mayor a 3 caracteres');

if($_FILES['imagen']['error']==0 && $_FILES['imagen']['size'] > 1048576)
        die('Archivo demasiado grande ( > 1MiB)');
$id=
$categorias_id = $_POST['categorias_id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

$producto = new Producto();
$producto->
$producto->categorias_id = $categorias_id;
$producto->nombre = $nombre;
$producto->precio = $precio;
$producto->stock = $stock;
$producto->descripcion = $descripcion;
$producto->creado = date('Y-m-d H:i:s'); // http://php.net/manual/es/function.date.php
$producto->estado = $estado;