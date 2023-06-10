<?php
require("../model/pagina.model.php");


switch(true){
    case (isset($_GET['id_personal'])):

        $id_personal = $_GET['id_personal'];

        borrarLogin(null,$id_personal);
        
        borrarPersonal($id_personal);
        
        header("location: ../view/admin.view.php");
        break;
    case (isset($_GET['id_categoria'])):
        $id_cargo = $_GET['id_categoria'];
        
        borrarCategoria($id_cargo);
        echo 'se ejecuta borrar cargo';
        header("location: ../view/admin.view.php");
        
        break;
    case (isset($_GET['id_login'])):
        $id_login = $_GET['id_login'];
        
        borrarLogin($id_login,null);
        echo 'se ejecuta borrar login';
        header("location: ../view/admin.view.php");
        break;
    default:

        echo 'no hay ni un id';
        header("location: ../view/admin.view.php");

} 

?>