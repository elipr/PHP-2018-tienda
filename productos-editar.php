<?php
require_once './autoload.php';

$id = $_GET['id'];
$producto = ProductoRepository::obtener($id);
$categorias = CategoriaRepository::listar();
?>
<!DOCTYPE html>
<html>
    <head>
            <title>Editar producto</title>
        <?php require_once './includes/resources.php';?>
        
    </head>
    <body>
        
        <?php // require_once './includes/header.php';?>

        <div class="container-fluid main">
           
           
             <div class="page-header">
                 <h3 class="panel-title">Editor de producto</h3>
            </div>
            <form action="productos-actualizar.php" method="POST" enctype="multipart/form-data">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editor de producto</h3>
                </div>
                   <div class="form-group">
                            <label for="categorias_id">Categoría</label>
                            <select name="categorias_id" id="categorias_id" class="form-control" required="">
                                <option value="" selected="" disabled="">Seleccione una categoría</option>
                                <?php foreach($categorias as $categoria){ ?>
                                <option value="<?=$categoria->id?>" <?=($categoria->id==$producto->categorias_id)?'selected':''?>><?=$categoria->nombre?></option>
                                <?php } ?>
                            </select>
                        </div>
                <div class="panel-body">
                    <div class="form-group" >
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" value="<?=$producto->nombre?>" class="form-control">
            </div>
                    
                </div>
                <div class="panel-footer">
                    <a href="productos-actualizar.php" class="btn btn-default">Actualizar</a>
                </div>
            </div>
            
        </div>
        
        <?php // require_once './includes/footer.php';?>
        
    </body>
</html>