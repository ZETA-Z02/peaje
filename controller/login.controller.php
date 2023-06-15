<?php
require ("../model/consultas.model.php");

session_start();

if(isset($_POST['usuario']) && isset($_POST['password'])){
    $user = validarUser($_POST['usuario']);
    if(password_verify($_POST['password'], $user['password'])){

        switch(true){
            case($user['nivel_usuario']==1):
                //varibale blobal para el id_personal, se le pone como admin, supervisor o personal
                $_SESSION['admin'] = $user['id_personal'];
                header("location: ../view/admin.view.php");
                break;
            case($user['nivel_usuario']==2):
                //varibale blobal para el id_personal, se le pone como admin, supervisor o personal
                $_SESSION['supervisor'] = $user['id_personal'];                
                header("location: ../view/supervisor.view.php");
                break;
            case($user['nivel_usuario']==3):
                //varibale blobal para el id_personal, se le pone como admin, supervisor o personal
                $_SESSION['personal'] = $user['id_personal'];
                $_SESSION['login'] = $user['id_login'];    
                header("location: ../view/personal.view.php");
                break;
        }
    }else{
        header("location: ../");
    }
    //header("location: ../view/registrarPersonal.view.php");
}else{
    header("location: ../");
}

?>