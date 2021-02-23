<?php
session_start();

if (!isset($_SESSION['user_name'])){
    header("Location: index.php?error=nologin");
} 

require_once("includes/config.php");
require_once("includes/funciones.php");

$usuario=$mysqli->query("
        SELECT id, username, nombre, apellido, password, email, access
        FROM users
        WHERE id = '".$_SESSION['user_id']."'
        ");

$datos_user = mysqli_fetch_assoc($usuario);

if(isset($_POST["submit"])){


    $username = cadena_segura(strtolower($_POST['username']),25);
    $nombre = cadena_segura(ucfirst(strtolower($_POST['nombre'])),25);
    $apellido = cadena_segura(ucfirst(strtolower($_POST['apellido'])),25);
    $email = cadena_segura(strtolower($_POST['email']),150);
    

    if($_POST['old_password'] != ""){

        $password = hash('md5', cadena_segura($_POST['new_password'],150));

        if(hash('md5',$_POST['old_password']) == $_POST['password']){
            if($_POST['new_password'] == $_POST['repeat_new_password']){
                $sql = "UPDATE users
                SET username = '".$username."', 
                nombre = '".$nombre."', 
                apellido = '".$apellido."',
                password = '".$password."',
                email = '".$email."'
                WHERE id = '".$_POST['id']."'
        ";
            }
        }
    }else{

    $sql = "UPDATE users
        SET username = '".$username."', 
        nombre = '".$nombre."', 
        apellido = '".$apellido."',
        email = '".$email."'
        WHERE id = '".$_POST['id']."'
        ";
    }

    $query=$mysqli->query($sql);

//echo $sql;
   header("Location: ".$_POST['pagina'].".php");
}


?>

    <form action="usuarios-modificar-propio.php" method="post">
            <div class="card-header">
                <h3 class="mb-1">Modificar Usuario (<?=$datos_user['username']?>)</h3>
                
            </div>
            <div class="card-body">
                
                <input type="hidden" name="pagina" value="<?=$_GET['pag']?>">
                <input type="hidden" name="id" value="<?=$datos_user['id']?>">
                <input type="hidden" name="password" value="<?=$datos_user['password']?>">

                <div class="form-group">
                    <input class="form-control form-control-lg" type="hidden" name="username" value="<?=$datos_user['username']?>" readonly>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="nombre" required="" placeholder="Nombre" value="<?=$datos_user['nombre']?>" maxlength="25">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="apellido" required="" placeholder="Apellido" value="<?=$datos_user['apellido']?>" maxlength="25">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="correo" name="email" placeholder="Email" value="<?=$datos_user['email']?>" maxlength="150">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="old_password" placeholder="Contraseña actual" maxlength="150">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="new_password" placeholder="Nueva contraseña" maxlength="150">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="repeat_new_password" placeholder="Repetir contraseña" maxlength="150">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit" name="submit" value="agregar">Modificar</button>
                </div>
            </div>
    </form>