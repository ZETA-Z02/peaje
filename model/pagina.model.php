<?php
require("conexion.php");


function personal(){
    $conexion = Conexion();
    $sql = "SELECT * FROM personal;";
    $data = $conexion->query($sql);
    return $data;
}
function personalUnico($id_personal){
    $conexion = Conexion();
    $sql = "SELECT * FROM personal where id_personal = '$id_personal';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}
function usuario(){
    $conexion = Conexion();
    $sql = "SELECT * FROM login;";
    $data = $conexion->query($sql);
    return $data;
}
function tarifas(){
    $conexion = Conexion();
    $sql = "SELECT * , SUBSTRING_INDEX(descripcion, '**', -1) AS ejes FROM tarifa;";
    $data = $conexion->query($sql);
    return $data;
}
function tarifaUnica($idcategoria){
    $conexion = Conexion();
    $sql = "SELECT *, SUBSTRING_INDEX(descripcion, '**', -1) AS tipo FROM tarifa WHERE id_categoria = '$idcategoria';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}
function loginUnico($idlogin,$idpersonal){
    $conexion = Conexion();
    $sql = "SELECT * FROM login WHERE id_login = '$idlogin' or id_personal = '$idpersonal';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}
//editar consultas
function updatePersonal($idpersonal,$nombre,$apellido,$telefono,$correo,$direccion,$genero){
    $conexion = Conexion();
    $sql = "UPDATE personal SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', correo = '$correo', direccion = '$direccion', genero = '$genero' WHERE id_personal = '$idpersonal';";
    $conexion->query($sql);
}
function updateTarifa($idcategoria,$descripcion,$tarifa){
    $conexion = Conexion();
    $sql = "UPDATE tarifa SET descripcion ='$descripcion' , tarifa = '$tarifa' WHERE id_categoria = '$idcategoria';";
    $conexion->query($sql);
}
function updateLogin($idlogin,$user,$contrasena,$nivel){
    $conexion = Conexion();
    $sql = "UPDATE login SET usuario = '$user' , password = '$contrasena', nivel_usuario = '$nivel' WHERE id_login = '$idlogin';";
    $conexion->query($sql);
}
//borrar consultas
function borrarPersonal($id_personal){
    $conexion = Conexion();
    $sql = "DELETE FROM personal WHERE id_personal = $id_personal;";
    $conexion->query($sql);
}
function borrarLogin($idlogin,$idpersonal){
    $conexion = Conexion();
    $sql = "DELETE FROM login WHERE id_login  = '$idlogin' or id_personal = '$idpersonal';";
    $conexion->query($sql);
}
function borrarCategoria($idcategoria){
    $conexion = Conexion();
    $sql = "DELETE FROM tarifa WHERE id_categoria  = '$idcategoria';";
    $conexion->query($sql);
}
function insertarPeaje($placa,$idcategoria,$fecha,$hora,$opcionPago,$monto,$idlogin,$vuelto,$id_caja){
    $conexion = Conexion();
    $sql = "INSERT INTO registroVehiculos VALUES(null,'$placa','$idcategoria','$fecha','$hora','$opcionPago','$monto','$idlogin','$vuelto','$id_caja');";
    $conexion->query($sql);
}
//CONSULTAS PARA VER LOS REGISTROS DE DISTINTAS MANERAS
//all el registro todo  
function Registro(){
    $conexion = Conexion();
    $sql = "SELECT r.*, SUBSTRING_INDEX(t.descripcion, ' ', -2) AS tipo, t.tarifa,  
            (SELECT CONCAT(nombre, ' ', apellido) AS name FROM personal WHERE id_personal = r.id_login) AS name  
            FROM registroVehiculos r  
            JOIN tarifa t ON r.id_categoria = t.id_categoria;";
    $data = $conexion->query($sql);
    return $data;
}
function registroHora($hora,$fecha,$personal,$categoria){
    $conexion = Conexion();
    $sql = "SELECT r.*, SUBSTRING_INDEX(t.descripcion, ' ', -2) AS tipo, t.tarifa,  (SELECT CONCAT(nombre, ' ', apellido) AS name 
    FROM personal 
    WHERE id_personal = r.id_login) AS name  
    FROM registroVehiculos r  
    JOIN tarifa t ON r.id_categoria = t.id_categoria
    WHERE 1 = 1 ";
    if(!empty($hora)){
        $sql .= "AND hora LIKE '$hora%';";
    }
    if(!empty($fecha)){
        $sql .= "AND fecha = '$fecha';";
    }
    if(!empty($personal)){
        $sql .= "AND id_login = '$personal'";
    }
    if(!empty($categoria)){
        $sql .= "AND descripcion LIKE '%$categoria%'";
    }
    $data = $conexion->query($sql);
    return $data; 
}
//registro para ver todo al revez
function RegistroRevez(){
    $conexion = Conexion();
    $sql = "SELECT r.*, SUBSTRING_INDEX(t.descripcion, ' ', -2) AS tipo, t.tarifa,  
            (SELECT CONCAT(nombre, ' ', apellido) AS name FROM personal WHERE id_personal = r.id_login) AS name  
            FROM registroVehiculos r  
            JOIN tarifa t ON r.id_categoria = t.id_categoria
            ORDER BY r.id_registro DESC;";
    $data = $conexion->query($sql);
    return $data;
}

//CONSULTAS PARA EL ARQUEO
function arqueo($fecha,$idcaja){
    $conexion = Conexion();
    $sql = "SELECT SUM(r.monto) AS total,SUM(r.vuelto) AS vuelto, SUM(t.tarifa) AS tarifa
    FROM registroVehiculos r 
    JOIN tarifa t ON r.id_categoria = t.id_categoria 
    WHERE opcion_pago = 'efectivo' 
    AND fecha = '$fecha'
    AND id_caja = '$idcaja';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}

//todos sobre caja, =consultas para la caja
function caja(){
    $conexion = Conexion();
    $sql = "SELECT * FROM caja;";
    $data = $conexion->query($sql);
    return $data;
}
function insertarCaja($id_personal,$descripcion,$monto_inicio){
    $conexion = Conexion();
    $sql = "INSERT INTO caja VALUES(null,'$id_personal','$monto_inicio','$descripcion');";
    $conexion->query($sql);
}
function cajaUnica($id_caja){
    $conexion = Conexion();
    $sql = "SELECT * FROM caja where id_caja = '$id_caja';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}
function updateCaja($id_caja,$id_personal,$descripcion,$monto){
    $conexion = Conexion();
    $sql = "UPDATE caja SET id_personal = '$id_personal', descripcion ='$descripcion' , monto_inicial = '$monto' WHERE id_caja = '$id_caja';";
    $conexion->query($sql);
}


function cajaPersonal($idpersonal){
    $conexion = Conexion();
    $sql = "SELECT * FROM caja WHERE id_personal = '$idpersonal';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}
function montoCaja($idcaja){
    $conexion = Conexion();
    $sql = "SELECT * FROM caja WHERE id_caja = '$idcaja';";
    $result = $conexion->query($sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return $data;
}





?>