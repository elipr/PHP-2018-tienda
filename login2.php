<?php
require_once './autoload.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <?php require_once './includes/resources.php';?>
        
    </head>
    <body class="text-center">
        
        <?php require_once './includes/header.php';?>

            <div class="page-header">
            </div>
            <div>
            <form class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      <label for="inputEmail" class="sr-only">Email </label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="" style="cursor: auto;" autocomplete="off">
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="" style="" autocomplete="off">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
        </div>
        <?php require_once './includes/footer.php';?>
        
    </body>
</html>
