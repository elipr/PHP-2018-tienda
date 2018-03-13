<?php
require_once './autoload.php';

$id = $_GET['id'];

$categoria = CategoriaRepository::obtener($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <?php require_once './includes/resources.php';?>
    </head>
    <body>
        
        <?php require_once './includes/header.php';?>

        <div class="container-fluid main">
            
            <div class="page-header">
                <h1>Edición Categoria</h1>
            </div>
            
            <form action="categoria-actualizar.php" method="POST" enctype="multipart/form-data">
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Formulario de edición</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" value="<?=$categoria->nombre?>" class="form-control" required="" maxlength="100" placeholder="Ingrese el nombre">
                        </div>
                        
                        <div class="form-group">
                            <label for="precio">Orden</label>
                            <input type="number" id="orden" name="orden" value="<?=$categoria->orden?>" class="form-control" placeholder="Ingrese el número de orden">
                        </div>

                        
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary" value="Actualizar"/>
                        <a href="categorias-listar.php" class="btn btn-default">Regresar</a>
                    </div>
                </div>
                
            </form>
            
        </div>
        
        <?php require_once './includes/footer.php';?>
        
    </body>
</html>
