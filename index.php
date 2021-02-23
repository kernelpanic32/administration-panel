<?php
session_start();
//if session exist redirect to panel
if (isset($_SESSION['user_name'])){
    header("Location: panel.php");
} 

require_once("includes/config.php");
require_once("includes/funciones.php");

$mensaje = "";

if(isset($_GET['error'])){
    if($_GET['error'] == 'nologin'){
        $mensaje = "No has iniciado sesion";
    }
}

if (isset($_POST["username"])){
    $username=cadena_segura($_POST["username"],25);
    $password=hash('md5', cadena_segura($_POST["password"],150));

$query_usuario=$mysqli->query("
        SELECT id, username, nombre, apellido, access
        FROM users
        WHERE username='$username' 
        AND password='$password'
        ");

    if (mysqli_num_rows($query_usuario)>0) {

        $row = mysqli_fetch_assoc($query_usuario);
        
        if($row["access"] > 0){
                      
            $_SESSION["user_id"]=$row["id"];
            $_SESSION["user_name"]=$row["username"];
            $_SESSION["user_nombre"]=$row["nombre"];
            $_SESSION["user_apellido"]=$row["apellido"];
            $_SESSION["user_access"]=$row["access"];

            //login time log
            $temp_time = date('Y-m-d').' '.date('H:i:s');

            $sql = "UPDATE users
            SET last_login = '".$temp_time."'
            WHERE id = '".$row['id']."'
            ";

            $query=$mysqli->query($sql);

            header('Location: panel.php');
        }else{
            $mensaje="Este usuario ha sido dehabilitado por un administrador";
        }

    } else {        
        $mensaje="Usuario o contrase&ntilde;a incorrecta";
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
   <title>Panel Login</title>
   <link rel="icon" type="image/png" href="img/favicon.ico">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="manifest" href="manifest.json">

   <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

<style>
.login-panel input[type=submit].btn-block{
    background-color: #454554;
    border-color: #454554;
}
.panel-body {
    padding: 35px;
}
.panel-heading{
    background-image: url(img/fondo_panel.jpg);
    padding-top: 50px;
    padding-bottom: 50px;
}
.banner{
    color: white;
    text-align: center;
    text-transform: uppercase;
    font-size: 25px;
}
.input-group-addon{
    padding: 6px 25px 0px 12px;
}

<?php if($panel_config["dark_mode"] == true){ ?>

body{
    background-color: #1a1a1a;
}

.panel-default {
    border-color: #404040;
}

.panel-default > .panel-heading {
    color: #333;
    background-color: #fff;
    border-color: #1e1e1e;
}

.panel {
    margin-bottom: 20px;
    background-color: #313131;
    border: 2px solid #404040;
    border-radius: 4px;
    -webkit-box-shadow: 0 0px 50px rgba(0, 0, 0, 0.95);
}

.form-control{
    background-color: #212121 !important;
    border: 1px solid #1a1a1a !important;
    color: #fff !important;
}

.input-group-addon:first-child {
    border-right: 0 !important;
    background-color: #313131 !important;
    border: 1px solid #1a1a1a !important;
}

.fa, .fas {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    background-color: #313131 !important;
    /* border: 1px solid #1a1a1a; */
    color: #fff;
}

.form-control:focus {
    border-color: none !important;
    outline: 0 !important;
    box-shadow: none !important;
}

.btn-login{
    background-color: #4656e9 !important;
    border-color: #4656e9 !important;
}

.btn-login:hover {
    color: #fff;
    background-color: #3d4593 !important;
    border-color: #3d4593 !important;
}

<?php }; ?>
</style>

<script> 
    if('serviceWorker' in navigator) {

    navigator.serviceWorker.register('service-worker.js', { scope: '/' })

    .then(function(registration) {

          //console.log('Service Worker Registered');

    });

    navigator.serviceWorker.ready.then(function(registration) {

     //console.log('Service Worker Ready');

    });

}
 </script>

</head>

<body>

    <div class="container" style="padding-top: 3%">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        
                        <h3 class="banner"><?=$panel_config["nombre_empresa"]?></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Usuario" name="username" autofocus>
                                </div>
                                
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password">
                                </div>
                                <? if ($mensaje!=""){?>
                                <p class="text-danger text-center"><?=$mensaje?></p>
                                <? }?>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block btn-login" name="submit" value="Ingresar">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>