<?php
require_once './autoload.php';

$categorias = CategoriaRepository::listar();
//var_dump($categorias);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tienda de eli</title>
        <?php require_once './includes/resources.php';?>
        
    </head>
    <body>
        
        <?php require_once './includes/header.php';?>

        <div class="container-fluid main">
            
            <div class="page-header">
                <h1>Mantenimiento de Categorias</h1>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Listado de Productos</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>ORDEN</th>
                            <th width="50"></th>
                            <th width="50"></th>
                            <th width="50"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categorias as $categoria){?>
                        <tr>
                            <td><?=$categoria->id?></td>
                            <td><?=$categoria->nombre?></td>
                            <td><?=$categoria->orden?></td>
                            <td><a href="#" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Mostrar</a></td>
                            <td><a href="#" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Editar</a></td>
                            <td><a href="#" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="panel-footer">
                    <a href="categoria-nuevo.php" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
                </div>
            </div>
            
        </div>
        
        <?php require_once './includes/footer.php';?>
        
    </body>
</html>