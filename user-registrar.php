<?php
require_once './autoload.php';

$username = $_POST['username'];
$password = $_POST['password'];
//$nombres = $_POST['nombres'];
$roles_id = $_POST['roles_id'];
$email = $_POST['email'];

$usuarios = new Usuarios ();
$usuarios->username = $username;
$usuarios->password = $password;
//$usuarios->nombres = $nombres;
$usuarios->roles_id = $roles_id;
$usuarios->email = $email;




UserRepository::registrar($usuarios);

Flash::success('Registro guardado satisfactoriamente');

if(empty(error_get_last() ))
    header('location: login.php');
