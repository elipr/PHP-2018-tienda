<?php
    require_once './autoload.php';
    
    $categorias = CategoriaRepository::listar();
//    var_dump($categorias);
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
                <h1>Registro de Categoria</h1>
            </div>
            
            <form action="categoria-registrar.php" method="POST" enctype="multipart/form-data">
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Formulario de registro</h3>
                    </div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required="" maxlength="100" placeholder="Ingrese el nombre">
                        </div>
                        
                        <div class="form-group">
                            <label for="orden">Orden</label>
                            <input type="number" id="orden" name="orden" class="form-control" placeholder="Ingrese la orden">
                        </div>
                        
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary" value="Registrar"/>
                        <a href="categoria-listar.php" class="btn btn-default">Regresar</a>
                    </div>
                </div>
                
            </form>
            
        </div>
        
        <?php require_once './includes/footer.php';?>
        
    </body>
</html>
