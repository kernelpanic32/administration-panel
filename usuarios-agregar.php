<?php
session_start();

if (!isset($_SESSION['user_name'])){
    header("Location: index.php?error=nologin");
} 
if ($_SESSION['user_access'] < 2){
    header("Location: panel.php");
} 

require_once("includes/config.php");
require_once("includes/funciones.php");


if(isset($_POST["submit"])){

    $access = $_POST['access'];
    $username = cadena_segura(strtolower($_POST['username']),25);
    $nombre = cadena_segura(ucfirst(strtolower($_POST['nombre'])),25);
    $apellido = cadena_segura(ucfirst(strtolower($_POST['apellido'])),25);
    $email = cadena_segura(strtolower($_POST['email']),150);

    $password = hash('md5', $_POST['password']);

    $sql = "INSERT INTO users (`username`, `nombre`, `apellido`, `password`, `email`, `access`, `last_login`)
        VALUES (
        '".$username."', 
        '".$nombre."', 
        '".$apellido."', 
        '".$password."',
        '".$email."',
        '".$access."',
        '0000-00-00 00:00:00'
        )";

    $query=$mysqli->query($sql);

//echo $sql;
    header("Location: usuarios.php");
}


?>

    <form action="usuarios-agregar.php" method="post">
            <div class="card-header">
                <h3 class="mb-1">Nuevo usuario</h3>
                
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Usuario" maxlength="25">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="nombre" required="" placeholder="Nombre" maxlength="25">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="apellido" required="" placeholder="Apellido" maxlength="25">
                </div>
                <div class="form-group">
                    <select class="form-control form-control-lg" name="access">
                      <option value="1">Usuario</option>
                      <option value="2">Administrador</option>
                      <option value="0">Deshabilitado</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="password" required="" placeholder="Contraseña" maxlength="150">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="email" placeholder="Email" maxlength="150">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit" name="submit" value="agregar">Agregar</button>
                </div>
            </div>
    </form>