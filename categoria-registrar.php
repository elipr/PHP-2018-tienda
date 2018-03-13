<?php
require_once './autoload.php';


$nombre = $_POST['nombre'];
$orden = $_POST['orden'];


$categoria = new Categoria();
$categoria->nombre = $nombre;
$categoria->orden = $orden;

CategoriaRepository::registrar($categoria);

header('location: categorias-listar.php');