<?php
function Conexion()
{
    $host = 'localhost';
    $user = 'root';
    $password = 'zeta';
    $bd = 'peaje';

    $conexion = mysqli_connect($host,$user,$password,$bd);
    if(!$conexion){

        echo 'error'. mysqli_error() .'error en la conexion';
    }//else{
        //echo 'conexion exitosa';
    //}
    return $conexion;
}


?>