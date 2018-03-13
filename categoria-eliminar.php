<?php
require_once './autoload.php';

$id = $_GET['id'];

$categoria = CategoriaRepository::obtener($id);


CategoriaRepository::eliminar($id);

Flash::success('Registro eliminado satisfactoriamente');

if(empty(error_get_last()))
    header('location: categorias-listar.php');