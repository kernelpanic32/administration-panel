<?php
session_start();
$pagina_actual=basename(__FILE__, '.php');
$categoria_actual = "usuarios";

if (!isset($_SESSION['user_name'])){
    header("Location: index.php?error=nologin");
} 
if ($_SESSION['user_access'] < 2){
    header("Location: panel.php");
} 

require_once("includes/config.php");
require_once("includes/funciones.php");

$usuarios=$mysqli->query("
        SELECT id, username, nombre, apellido, email, access, last_login
        FROM users
        WHERE id > 1
        ");

//$row = mysqli_fetch_assoc($query_usuario);


?>

<!DOCTYPE html>
<html lang="es">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php require('includes/css.php')?>

    <title>Panel Inicio</title>
</head>

<body class="body-dark">    

    <?php require('includes/nav.php')?>

        <!-- wrapper  -->        
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                                                                       
                                          <!-- users table  -->                            
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Usuarios</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="thead">
                                                    <tr class="border-0">
                                                        <th class="border-0">ID</th>
                                                        <th class="border-0">Usuario</th>
                                                        <th class="border-0">Nombre y apellido</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Acceso</th>
                                                        <th class="border-0">Ultima actividad</th>
                                                        <th class="border-0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                            <?php while($row = mysqli_fetch_assoc($usuarios)) { 

                                                //muestra todos 0000 para que quede lindo porque soy re hincha pelotas no mas
                                                if (date_format(date_create($row['last_login']),"Y")<2000){
                                                    $date = "00:00 - 00/00/0000";
                                                }else{
                                                    $date = date_format(date_create($row['last_login']),"H:i - d/m/Y");
                                                }                                          

                                                    ?>      
                                                    <tr>
                                                        <td><?=$row['id']?></td>
                                                        <td><?=$row['username']?></td>
                                                        <td><?=$row['nombre']." ".$row['apellido']?></td>
                                                        <td><?=$row['email']?></td>
                                                        <td><?=$access_levels[$row['access']]?></td>
                                                        <td><?=$date?></td>
                                                        <td>
                                                            

                                                        <li class="nav-item dropdown nav-user navbar-nav">
                            <a class="btn btn-outline-light btn-sm dropdown-toggle" data-toggle="dropdown">Opciones <i class="fa fa-sort-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <a class="dropdown-item" href="usuarios-modificar.php?<?=http_build_query($row)?>" data-toggle="modal" data-target="#modal-acciones">Modificar</a>
                                <a class="dropdown-item" href="usuarios-eliminar.php?id=<?=$row['id']."&user=".$row['username']?>">Eliminar</a>
                            </div>
                        </li>                           <!--

                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-light btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                  Opciones
                                                                  <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                  <li>
                                                                    <ul class="mail-info-detail"> 

                                                                        <li><a href="usuarios-modificar.php?<?=http_build_query($row)?>" data-toggle="modal" data-target="#modal-acciones">Modificar</a></li> 
                                                                        <li><a href="usuarios-eliminar.php?id=<?=$row['id']."&user=".$row['username']?>" data-toggle="modal" data-target="#modal-acciones">Eliminar</a></li>

                                                                    </ul>
                                                                  </li>
                                                                </ul>
                                                            </div> -->
                                                        </td>
                                                    </tr>
                                                
                                             <?php } ?>
                                                    <tr>
                                                        <td colspan="9"><a href="usuarios-agregar.php" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#modal-acciones"><i class="fa fa-plus"></i> Nuevo usuario</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <!-- end users table  -->    
                            
                   
                            <!-- Default bootstrap modal example -->
                                <div class="modal fade" id="modal-acciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">                                      
                                      
                                    </div>
                                  </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
    
    <!-- end main wrapper  -->    
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
    <script>
    // Fill modal with content from link href
    $("#modal-acciones").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-content").load(link.attr("href"));
    });         
    </script>

</body>
 
</html>