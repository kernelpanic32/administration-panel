<?php
session_start();
$pagina_actual=basename(__FILE__, '.php');
$categoria_actual = "panel-config";

if (!isset($_SESSION['user_name'])){
    header("Location: index.php?error=nologin");
}
if ($_SESSION['user_access'] < 2){
    header("Location: panel.php");
} 

require_once("includes/config.php");
require_once("includes/funciones.php");

if(isset($_POST["apply"])){

$result=$mysqli->query("UPDATE `panel_config` SET 
    `nombre_empresa`='".$_POST["nombre_empresa"]."',
    `nombre_empresa_corto`='".$_POST["nombre_empresa_corto"]."',
    `dark_mode`='".$_POST["dark_mode"]."'
    WHERE 1
    ");

    header("location: panel-config.php?exito");
}



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
                                            
                       
                    <div class="container-fluid col-md-6">

                    <form action="panel-config.php" method="POST">

                       <div class="form-group">
                           <label>Modo oscuro</label>               
                           <input class="form-control" type="text" name="dark_mode" maxlength="1" value="<?=$panel_config["dark_mode"]?>">
                 
               
                           <label>Nombre empresa</label>               
                           <input class="form-control" type="text" name="nombre_empresa" value="<?=$panel_config["nombre_empresa"]?>">
                
                
                           <label>Modo nombre empresa corto</label>               
                           <input class="form-control" type="text" name="nombre_empresa_corto" value="<?=$panel_config["nombre_empresa_corto"]?>">
                       </div>

                       <input class="form-control btn btn-block btn-primary" type="submit" name="apply" value="Cambiar">

                    </form>    

                   </div>

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
          

    
    <!-- end main wrapper  -->    



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