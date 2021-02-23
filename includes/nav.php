<?php

?>
   <!-- main wrapper -->    
    <div class="dashboard-main-wrapper">   
        <!-- navbar -->        
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html"><?=$panel_config["nombre_empresa_corto"]?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <!--<input class="form-control" type="text" placeholder="Search..">-->
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notificaciones</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Producto234</span> vendido a las 12:23
                                                        <div class="notification-date">24/3/2020</div>
                                                    </div>
                                                </div>
                                            </a>                                            
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">Ver todo</a></div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$nombre_completo." ";?><i class="fa fa-sort-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <a class="dropdown-item" href="usuarios-modificar-propio.php?pag=<?=$pagina_actual?>" data-toggle="modal" data-target="#modal-acciones"><i class="fas fa-user mr-2"></i>Cuenta</a>
                                
                                <?php if($_SESSION['user_access'] >= 2){ ?>
                                    <a class="dropdown-item" href="panel-config.php"><i class="fas fa-cog mr-2"></i>Opciones</a>
                                <?php } ?>
                                
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>        
        <!-- end navbar -->                
        <!-- left sidebar -->        
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">Menu</li>

                            <li class="nav-item">
                                <a class="nav-link <?=$categoria_actual=="panel"?" active":""?>" href="panel.php"></i>Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?=$categoria_actual=="productos"?" active":""?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">Productos</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Administrar productos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Lista de precios y stock</a>
                                    </ul>
                                </div>
                            </li>
                            <?php if ($_SESSION['user_access'] >= 2){ ?>
                                
                                <li class="nav-item">
                                    <a class="nav-link <?=$categoria_actual=="usuarios"?"active":""?> "  href="usuarios.php">Usuarios</a>                        
                                <li class="nav-item ">
                            
                            <?php } ?>
                                <a class="nav-link" href="#"></i>Estadisticas</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>        
        <!-- end left sidebar -->        
