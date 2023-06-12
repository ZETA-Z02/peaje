<?php 
session_start();
include("../model/pagina.model.php");


$idlogin = loginUnico(null,$_SESSION['personal']);

$hora = null;
$fecha = null;
$idlogin = null;
$categoria = null;

//echo $_POST['categoria'].'<br>';
//echo $_POST['personal'].'<br>';
//echo $_POST['fecha'].'<br>';
//echo $_POST['hora'].'<br>';

if(isset($_POST['buttonCategoria'])){
    $categoria = $_POST['categoria'];
}
if(isset($_POST['buttonLogin'])){
    $idlogin = $_POST['personal'];
}
if(isset($_POST['buttonFecha'])){
    $fecha = $_POST['fecha'];
}
if(isset($_POST['buttonHora'])){
    $hora = substr($_POST['hora'],0 , -3);
}

$filtro = registroHora($hora,$fecha,$idlogin,$categoria);
if(isset($_POST['revez'])){
    $filtro= RegistroRevez();
}

?>
<head>
    <link rel="stylesheet" href="../asset/css/stylez.css">
</head>
<body>
    <div class="tableR">
            <table>
                <thead>
                    <tr>
                        <th> Registro NUM </th>
                        <th> placa </th>
                        <th> categoria </th>
                        <th> fecha </th>
                        <th> hora </th>
                        <th> opcion de pago </th>
                        <th> monto </th>
                        <th> tarifa </th>
                        <th> personal: </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    
                    while($row = $filtro->fetch_array(MYSQLI_ASSOC)) {?>
                        <tr>
                            <td><?= $row['id_registro']?> </td>
                            <td><?= $row['placa']?> </td> 
                            <td><?= $row['tipo']?> </td>
                            <td><?= $row['fecha']?> </td>
                            <td><?= $row['hora']?> </td>
                            <td><?= $row['opcion_pago']?> </td>
                            <td><?= $row['monto']?> </td>
                            <td><?= $row['tarifa']?> </td>
                            <td><?= $row['name']?> </td>
                        </tr>                   
                    <?php }?>                  
                </tbody>
            </table>
    </div>  
    <div class="button">  

        <a href="registroVehiculos.php">Atras</a>
       
    </div>
</body>
