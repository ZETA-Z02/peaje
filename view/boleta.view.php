<?php
include("../model/pagina.model.php");
session_start();
//nombre-descripcion de la categoria, igv de, precio de la tarifa, nombre del personal que atendio
//calculo del vuelto 

//$_POST['placa'];
//$_POST['categoria'];
//$_POST['opcionPago'];
//$_POST['ingreso'];
//$_SESSION['personal'];

$personal = personalUnico($_SESSION['personal']);
$tarifa = tarifaUnica($_POST['categoria']);
$login = loginUnico(null,$_SESSION['personal']);
//echo $personal['nombre'];
//echo $tarifa['tipo'];
//echo $tarifa['tarifa'];
$igv = $tarifa['tarifa']*0.18;
$subtotal = $tarifa['tarifa'] - $igv;

//AQUI HACER UN IF, UN CONDICIONAL QUE SI INGRESO SUPERA LOS 4 DIGITOS NO SE HAGA NI UNA RESTA SI NO QUE SI SE HAGA

if(strlen($_POST['ingreso'])<4){
    $vuelto =  $_POST['ingreso'] - $tarifa['tarifa'];
    //echo $vuelto;
}else{
    //echo 'se declara mis misma variable';
    $vuelto = $_POST['ingreso'];
    //echo $vuelto;
}


//echo $login['id_login'];

?>


    <div>
        <center>
            <h1>BOLETA</h1>
            <h2>PARA IMPRIMIR EN PDF</h2>
        </center>
        <h2>Formulario para confirmar la BOLETA</h2>

        <form action="../controller/peaje.controller.php" method="POST">

            <div class="Formulario">
                <div class="formulario-campo">
                    <label for="placa">Placa:</label>
                    <input type="text" id="placa" name="placa" value="<?= $_POST['placa']?>">
                </div>

                <div class="formulario-campo">
                    <label for="categoria">Categoria: </label>
                    <input id = 'categoria' type="text" name = 'categoria' value="<?= $tarifa['tipo']?>" readonly>
                </div>
                <div class="formulario-campo">
                    <label for="subtotal">subtotal:</label>
                    <input type="text" id="subtotal" name="subtotal"value="<?= $subtotal?>" readonly>
                </div>

                <div class="formulario-campo">
                    <label for="igv">IGV 18.00%:</label>
                    <input type="text" id="igv" name="igv" value="<?= $igv?>" readonly>
                </div>

                <div class="formulario-campo">
                    <label for="total">total a pagar:</label>
                    <input type="text" id="total" name="total" value="<?= $tarifa['tarifa']?>" readonly>
                </div>

                <div class="formulario-campo">
                    <label for="cajero">cajero:</label>
                    <input type="text" id="cajero" name="cajero" value="<?= $personal['nombre']?>" readonly>
                </div>

                <div class="formulario-campo">
                    <label for="opcionPago">Opcion de pago:</label>
                    <input type="text" id="opcionPago" name="opcionPago" value="<?= $_POST['opcionPago']?>" readonly>
                </div>
                <div class="formulario-campo">
                    <label for="monto">monto de ingreso o RUC: </label>
                    <input type="text" id="monto" name="ingreso" value="<?= $_POST['ingreso']?>" readonly>
                </div>
                <div class="formulario-campo">
                    <label for="vuelto">vuelto: </label>
                    <input type="text" id="vuelto" name="vuelto" value="<?= $vuelto?>" readonly>
                </div>
                <input type="hidden" name="idpersonal" value="<?= $personal['id_personal']?>" readonly>
                <input type="hidden" name="idcategoria" value="<?= $_POST['categoria']?>" readonly>
                <input type="hidden" name="idlogin" value="<?= $login['id_login']?>" readonly>

            </div>

            <div class="campo">
                <input type="submit" name = "confirmar" value="confirmar">
                <input type="submit" name = "editar" value="editar">
            </div>
    </form>
