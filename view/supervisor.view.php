<?php 

include("../model/pagina.model.php");
session_start();
$registro = Registro();

$categoria = tarifas();

require "../other/header.php";

while ($row = $registro->fetch_array(MYSQLI_ASSOC)) {
    $personalOptions[] = $row;
}

?>

<div>
        <center>
            <h1>BIENVENIDO supervisor</h1>
            <h2>hola</h2>
        </center>
    </div>

<table class="tabla-con-borde">
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
        
        foreach($personalOptions as $row) {?>
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
    <form action="../view/selectRegistro.view.php" method="POST">

        <select id="opciones" name="categoria">
            <?php
            while($row=$categoria->fetch_array(MYSQLI_ASSOC)){ ?>
            <option value="<?= $row['ejes']?>"><?= 'Cat: '.$row['id_categoria'] .'  /num: '. $row['ejes'];?></option>
            <?php } ?>
        </select>
        <input type="submit" name= 'buttonCategoria' value = 'filtrar categoria'>
    </form>

    <form action="../view/selectRegistro.view.php" method="POST"">
        <select name="personal" id="option">
            <?php 
            foreach($personalOptions as $row1) {?>
                <option value="<?= $row1['id_login']?>"><?= $row1['name']; ?></option>
                <?php } ?>
        </select>
        <input type="submit" name= 'buttonLogin'>
    </form>

    <form action="../view/selectRegistro.view.php" method="POST"">
        <input type="date" name = 'fecha'>
        <input type="submit" name= 'buttonFecha'>
    </form>

    <form action="../view/selectRegistro.view.php" method="POST"">
        <input type="time" name = 'hora'>
        <input type="submit" name= 'buttonHora'>
    </form>
    
</table>

<a href="../controller/salida.controller.php"> 
    <button>salir</button>
</a>
</div>
