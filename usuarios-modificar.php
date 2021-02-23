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

    $access = cadena_segura($_POST['access'],1);
    
    if(empty($_POST['access'])){
        $access = '0';
    }

    $username = cadena_segura(strtolower($_POST['username']),25);
    $nombre = cadena_segura(ucfirst(strtolower($_POST['nombre'])),25);
    $apellido = cadena_segura(ucfirst(strtolower($_POST['apellido'])),25);
    $email = cadena_segura(strtolower($_POST['email']),150);

    $sql = "UPDATE users
        SET username = '".$username."', 
        nombre = '".$nombre."', 
        apellido = '".$apellido."',
        access = '".$access."',
        email = '".$email."'
        WHERE id = '".cadena_segura($_POST['id'],11)."'
        ";

    $query=$mysqli->query($sql);

//echo $sql;
    header("Location: usuarios.php");
}


?>

    <form action="usuarios-modificar.php" method="post">
            <div class="card-header">
                <h3 class="mb-1">Modificar Usuario</h3>
                
            </div>
            <div class="card-body">
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Usuario" value="<?=$_GET['username']?>" maxlength="25">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="nombre" required="" placeholder="Nombre" value="<?=$_GET['nombre']?>" maxlength="25">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="apellido" required="" placeholder="Apellido" value="<?=$_GET['apellido']?>" maxlength="25">
                </div>
                <div class="form-group">
                    <select class="form-control form-control-lg" name="access">
                      <option value="<?=$_GET['access']?>"><?=$access_levels[$_GET['access']]?></option>                    
                      <option value="1">Usuario</option>
                      <option value="2">Administrador</option>
                      <option value="0">Deshabilitado</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="email" placeholder="Email" value="<?=$_GET['email']?>" maxlength="150">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit" name="submit" value="agregar">Modificar</button>
                </div>
            </div>
    </form>
