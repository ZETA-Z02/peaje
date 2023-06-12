<?php 
include("../model/pagina.model.php");
session_start();

$personales = personal();

$personal = personalUnico($_SESSION['admin']);
$login = usuario();
$tarifa = tarifas();

require('../other/header1.php');
?>

<h1 class="text-center">BIENVENIDO ADMIN <?php echo $personal['nombre']; ?></h1>

<div class="container-xl">
    <div class="row">
        <h2>PERSONAL</h2>

        <table class="table table-striped table-bordered text-center">
            <thead class = 'table-dark'>
                <tr>
                    <th> nombre </th>
                    <th> apellido </th>
                    <th> sexo </th>
                    <th> dni </th>
                    <th> telefono </th>
                    <th> direccion </th>
                    <th> genero </th>
                    <th> edit </th>
                    <th> delete </th>
                    <th> crear un usuario login </th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                while($row = mysqli_fetch_array($personales)) {?>
                    <tr>
                        <td><?php echo $row['nombre']?> </td>
                        <td><?php echo $row['apellido']?> </td> 
                        <td><?php echo $row['dni']?> </td>
                        <td><?php echo $row['telefono']?> </td>
                        <td><?php echo $row['correo']?> </td>
                        <td><?php echo $row['direccion']?> </td>
                        <td><?php echo $row['genero']?> </td>
                        <td>
                            <a href="editar.view.php?id_personal=<?=$row['id_personal']?>">
                                edit
                            </a>
                        </td>
                        <td>
                            <a href="../controller/borrar.controller.php?id_personal=<?=$row['id_personal']?>">
                                delete
                            </a>
                        </td>
                        <!--se deberia crear un login, verificar si ya tiene un login y si no tiene se deberia poder crear-->
                        <td>
                            <a href="registrarUsuario.view.php?idpersonal=<?=$row['id_personal']?>"">
                                crear login
                            </a>
                        </td>
                    </tr>                   
                <?php }?>                  
            </tbody>      
        </table>
    </div>


    <div class="row">
        <h2>USUARIOS</h2>
        <table class="table table-striped table-bordered text-center">
            <thead class = 'table-danger'>
                <tr>
                    <th> id_login </th>
                    <th> id_personal </th>
                    <th> nivel_usuario </th>
                    <th> usuario </th>
                    <th> edit </th>
                    <th> delete </th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                
                while($row = mysqli_fetch_array($login)) {?>
                    <tr>
                        <td><?php echo $row['id_login']?> </td>
                        <td><?php echo $row['id_personal']?> </td> 
                        <td><?php 
                        switch($row['nivel_usuario']){
                            case 1: echo 'administrador'; break;
                            case 2: echo 'supervisor'; break;
                            case 3: echo 'personal'; break;}?> </td> 
                        <td><?php echo $row['usuario']?> </td>

                        <td>
                            <a href="editar.view.php?id_login=<?=$row['id_login'];?>">
                                edit
                            </a>
                        </td>
                        <td>
                            <a href="../controller/borrar.controller.php?id_login=<?php echo $row['id_login'];?>">
                                delete
                            </a>
                        </td>
                    </tr>                   
                <?php }?>                  
            </tbody>      
        </table>
    </div>

    <div class="row">
        <h2>TARIFA</h2>
        <table class="table table-striped table-bordered text-center">
            <thead class = 'table-info'>
                <tr>
                    <th> id_categoria </th>
                    <th> descripcion </th>
                    <th> tarifa </th>
                    <th> edit </th>

                </tr>
            </thead>
            
            <tbody>
                <?php
                
                while($row = mysqli_fetch_array($tarifa)) {?>
                    <tr>
                        <td><?php echo $row['id_categoria']?> </td>
                        <td><?php echo $row['descripcion']?> </td> 
                        <td><?php echo $row['tarifa']?> </td> 
                                        
                        <td>
                            <a href="editar.view.php?id_categoria=<?=$row['id_categoria'];?>">
                                edit
                            </a>
                        </td>
                        
                    </tr>                   
                <?php }?>                  
            </tbody>      
        </table>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="registrarPersonal.view.php">
                <button type = "button" class="btn btn-primary">ANADIR PERSONAL personal</button>
            </a>
        </div>
        <div class="col">
            <a href="registroVehiculos.php">
                <button type = "button" class="btn btn-info">VER REGISTROS</button>
            </a>
        </div>
        <div class="col">
            <a href="arqueo.view.php">
                <button type = "button" class="btn btn-succes">VER ARQUEO</button>
            </a>
        </div>

        <div class="col">
            <a href="../controller/salida.controller.php"> 
                <button type = "button" class="btn btn-danger">SALIR</button>
            </a>
        </div>
    </div>
</div>


