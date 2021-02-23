<?php
session_start();


if (!isset($_SESSION['user_name'])){
    header("Location: index.php?error=nologin");
} 
if ($_SESSION['user_access'] < 1){
    header("Location: panel.php");
} 


if(isset($_POST['id'])){

	require_once("includes/config.php");
	$usuarios=$mysqli->query("DELETE FROM users WHERE id = '".$_POST['id']."'");
	header("Location: usuarios.php");

}

if(isset($_GET['id'])){

	require_once("includes/config.php");
	require_once("includes/funciones.php");
	//$temp_name = $row['username']." (".$row['nombre']." ".$row['apellido'].")";

?>

<div class="modal-content">
	<form method="post" action="usuarios-eliminar.php">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>¿Seguro desea eliminar el usuario <b><?=$_GET['user']?></b>?</label>
        </div>   
    </div>
    <div class="modal-footer">
        <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
        <input type="submit" class="btn btn-primary" value="Eliminar">
    </div>
    </form>
</div><!-- /.modal-content -->

<?php } ?>