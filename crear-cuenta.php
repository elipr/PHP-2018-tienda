<?php
    require_once './autoload.php';
    
    $user = UserRepository::listar();
//    var_dump($user);
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
                <h1>Crear usuario nuevo</h1>
            </div>
            
            <form action="user-registrar.php" method="POST" enctype="multipart/form-data">
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Formulario de registro</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input name="username" id="cusername" class="form-control" required="">
                                
                            </input>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required="" maxlength="100" placeholder="Ingrese el nombre">
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="roles_id">Rol</label>
                            <input id="roles_id" name="roles_id" class="form-control ckeditor" type="text"></input>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        
                        
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-primary" value="Registrar"/>
                        <a href="login.php" class="btn btn-default">Regresar</a>
                    </div>
                </div>
                
            </form>
            
        </div>
        
        <?php require_once './includes/footer.php';?>
        
    </body>
</html>