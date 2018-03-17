<?php
require_once './autoload.php';
 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <?php require_once './includes/resources.php';?>
        <style>
            .form-signin {
    width: 100%;
    max-width: 340px;
    padding: 15px;
    margin: 0 auto;
}
.form-control {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    padding:20px;
           border-radius: .25rem;
}
.form-signin .checkbox {
    font-weight: 400;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}.mt-5, .my-5 {
    margin-top: 3rem!important;
}
        </style>
        
    </head>
    <body class="text-center">
        
        <?php require_once './includes/header.php';?>

            <div class="page-header">
            </div>
            <div>
            <form class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      <label for="username" class="sr-only" > Usuario</label>
      <input type="username" placeholder="Usuario" id="username" autofocus="" autocomplete="off" required="" class="form-control">
       <label for="contra" class="sr-only" > Contraseña</label>
       <input type="password" placeholder="contraseña" id="contra" autofocus="" autocomplete="off" required="" class="form-control">
       <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p>No estas registrado aùn? <a href="crear-cuenta.php">Crear cuenta</a></p>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
      
    </form>
        </div>
        <?php require_once './includes/footer.php';?>
        
    </body>
</html>
