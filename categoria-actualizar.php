<?php
require_once './autoload.php';
//(isset($_POST['id']) ? $_POST['id'] : '');
 $id = (isset($_POST['id']) ? $_POST['id'] : '');
$nombre = $_POST['nombre'];
$orden = $_POST['orden'];


$categoria = new Categoria();
$categoria->id = $id;
$categoria->nombre = $nombre;
$categoria->orden = $orden;


CategoriaRepository::actualizar($categoria);

Flash::success('Registro actualizado satisfactoriamente');

if(empty(error_get_last() ))
    header('location: categorias-listar.php');