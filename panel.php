<?php
session_start();
$pagina_actual=basename(__FILE__, '.php');
$categoria_actual = "panel";

if (!isset($_SESSION['user_name'])){
    header("Location: index.php?error=nologin");
}

require_once("includes/config.php");
require_once("includes/funciones.php");
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
                                            
                        <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Ventas Hoy</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">15</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Hoy</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">$1245</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                         
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Ventas Totales</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">1245</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">$12099</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">                        
                                                
                                          <!-- recent orders  -->                            
                            
                            <div class="col-xl-9 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Ventas Recientes</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="thead">
                                                    <tr class="border-0">
                                                        <th class="border-0">Producto</th>
                                                        <th class="border-0">Cantidad</th>
                                                        <th class="border-0">Precio</th>
                                                        <th class="border-0">Hora</th>
                                                        <th class="border-0">Cliente</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Product #1</td>
                                                        <td>20</td>
                                                        <td>$80.00</td>
                                                        <td>27-08-2018 01:22:12</td>
                                                        <td>InTransit</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Product #2</td>
                                                        <td>12</td>
                                                        <td>$180.00</td>
                                                        <td>25-08-2018 21:12:56</td>
                                                        <td>Delivered</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Product #3</td>
                                                        <td>23</td>
                                                        <td>$820.00</td>
                                                        <td>24-08-2018 14:12:77</td>
                                                        <td>Delivered</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Product #4</td>
                                                        <td>34</td>
                                                        <td>$340.00</td>
                                                        <td>23-08-2018 09:12:35</td>
                                                        <td>Delivered</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">Ver Todos</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <!-- end recent orders  -->                                

                            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">                                
                                <!-- resumen -->                                
                                <div class="card">
                                    <h5 class="card-header">Resumen</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table no-wrap p-table">
                                                <thead class="thead">
                                                    <tr class="border-0">
                                                        <th class="border-0">Usuario</th>
                                                        <th class="border-0">Ventas</th>
                                                        <th class="border-0">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Campaign#1</td>
                                                        <td>98,789 </td>
                                                        <td>$4563</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Campaign#2</td>
                                                        <td>2,789 </td>
                                                        <td>$325</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Campaign#3</td>
                                                        <td>1,459 </td>
                                                        <td>$225</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <a href="#" class="btn btn-outline-light float-right">Ver Todos</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end resumen -->

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