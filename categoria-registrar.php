<?php
require_once './autoload.php';

//var_dump($_POST);
//var_dump($_FILES);

// validadar los parámetros de entrada
//...

$nombre = $_POST['nombre'];
$orden = $_POST['orden'];


$categoria = new Categoria();
$categoria->nombre = $nombre;
$categoria->orden = $orden;


CategoriaRepository::registrar($categoria);

header('location: categoria-listar.php');