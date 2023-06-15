<?php
include("../model/pagina.model.php");

if(!empty($_POST['personal_caja']) && !empty($_POST['descripcion']) && !empty($_POST['inicio'])){
    //echo 'llegando datos';
    //datos a variables 
    $id_personal = $_POST['personal_caja'];
    $descripcion= $_POST['descripcion'];
    $monto_inicio = $_POST['inicio'];
    
    if(!insertarCaja($id_personal,$descripcion, $monto_inicio)){
        echo 'no fuinciona la consulta volvemos de nuevo a hacer el formulario';
        header("location: ../view/caja.view.php");    
    }
    
    header("location: ../view/admin.view.php");
}else{
    echo 'error';
    header("location: ../view/caja.view.php");
}





?>