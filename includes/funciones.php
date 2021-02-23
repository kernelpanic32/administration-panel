<?php
function cadena_segura($cadena,$longitud){
    if ($longitud > 0){
        $resultado=substr($cadena, 0, $longitud);
    }
    $resultado=htmlentities($resultado, ENT_QUOTES);
    $resultado=str_replace("\&quot;","&quot;",$resultado);      //cambio el \" por "
    $resultado=str_replace("\&#039;","&#039;",$resultado);      //cambio el \' por '
    $resultado=str_replace("-","&#45",$resultado);              //escapo el -
    
    return $resultado;
}
?>