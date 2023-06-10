<?php

require("../model/pagina.model.php");
//areglar errores de recarga de pagina

//que llegue los datos y se actualice con las funciones
switch(true){

    case (isset($_GET['idpersonal'])):
        $id_personal = $_GET['idpersonal']; 

        
        if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['direccion']) && !empty($_POST['genero'])){
            //echo 'datos llegando';
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            //dni no debe actualizar
            //$dni = $_POST['dni'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];    
            $direccion = $_POST['direccion'];
            $genero = $_POST['genero'];
        
            
            if(!updatePersonal($id_personal,$nombre,$apellido,$telefono,$correo,$direccion,$genero)){
                echo 'se cumple';
                //se edbe actualizar los datos, consulta para actualizar
                header("location: ../view/admin.view.php");
            }else{
                echo 'no se cumple y no se actualiza datos';
                header("location: ../view/editar.view.php?id_personal=".urlencode($id_personal));
            }
        
        }else{
            echo 'error faltan datos por llenar';
            header("location: ../view/editar.view.php?id_personal=".urlencode($id_personal));
        }

        break;
//update categoria
    case (isset($_GET['idcategoria'])):
        $id_categoria = $_GET['idcategoria'];
       
        //llegan todos los datos
        
        if(!empty($_POST['numCategoria']) && !empty($_POST['descripcion']) && !empty($_POST['tarifa'])){
            //echo 'funciona';
            $categoria = $_POST['numCategoria']; 
            $updatedescripcion = $_POST['descripcion'];
            $updateTarifa = $_POST['tarifa'];
            
            updateTarifa($categoria,$updatedescripcion,$updateTarifa);
            
            header("location: ../view/admin.view.php");
            
        }else{
            echo 'error faltan datos por llenar';
            header("location: ../view/editar.view.php?id_categoria=".urlencode($id_categoria));
        }


        break;



//update login, se debe poder cambiar la contrase;a
    case (isset($_GET['idlogin']));
        $id_login = $_GET['idlogin'];
        //echo $id_login;

        $password = loginUnico($id_login,null);
        
        if(!empty($_POST['usuario']) && !empty($_POST['contraseña1']) && password_verify($_POST['password'], $password['password'])){
            $newUser = $_POST['usuario'];
            $newPassword = $_POST['contraseña1'];
            $nivel= $_POST['nivel'];
            
            $newContrasena = password_hash($_POST['contraseña1'], PASSWORD_BCRYPT);
            updateLogin($id_login,$newUser,$newContrasena,$nivel);

            header("location: ../view/admin.view.php");
        }else{
            echo 'error faltan datos por llenar';
            header("location: ../view/editar.view.php?id_login=".urlencode($id_login));
        }

        break;

    default:
        echo 'no hay ni un id';
        header("location: ../view/admin.view.php?msg=noHayId");

}

?>