<?php

//session_start();
ini_set('display_errors',1);

$sql_hostname = 'localhost';
$sql_username = 'id15552441_huaynaoutdoors';
$sql_password = '#$bge!YI8NS[C^5s';
$sql_database = 'id15552441_huaynadb';


$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_LOCAL_INFILE, true);
$mysqli->real_connect($sql_hostname, $sql_username, $sql_password, $sql_database);

$hoy=date("d-m-Y");

if(isset($_SESSION['user_name'])){
	if(!empty($_SESSION['user_nombre'])){
		$nombre_completo = ucfirst(strtolower($_SESSION['user_nombre']))." ".ucfirst(strtolower($_SESSION['user_apellido']));
	}else{
		$nombre_completo = $_SESSION['user_name'];
	}
}

$access_levels = array("Deshabilitado", "Usuario", "Administrador", "Super Administrador");

/*
$result=$mysqli->query("
SELECT titulo, color_titulo, color_boton, texto_footer, color_texto_footer, mercadopago, frase_inicio, color_fondo_logo, retira_sucursal, json, version
FROM datos_panel
    ");
$datos_panel=mysqli_fetch_assoc($result);
$json_datos_panel=json_decode($datos_panel["json"],256);
*/

$result=$mysqli->query("SELECT nombre_empresa, nombre_empresa_corto, dark_mode FROM panel_config");
$panel_config = mysqli_fetch_assoc($result);


?>