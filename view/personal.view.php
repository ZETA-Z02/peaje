<?php 
include("../model/pagina.model.php");
session_start();
$personal = personalUnico($_SESSION['personal']);
$categoria = tarifas();

$editar = isset($_GET['editar']) ? $_GET['editar'] : false;
$placa = isset($_GET['placa']) ? $_GET['placa'] : '';
$categoriaEditar = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$opcionPago = isset($_GET['opcionPago']) ? $_GET['opcionPago'] : '';
$ingreso = isset($_GET['ingreso']) ? $_GET['ingreso'] : '';
$idcategoria = isset($_GET['idcategoria']) ? $_GET['idcategoria'] : '';


$editar.'<br>';
$placa.'<br>';
$categoriaEditar.'<br>';
$opcionPago.'<br>';
$ingreso.'<br>';


require("../other/header.php");

?>

    <div class= 'container'>
        <center>
            <h1>BIENVENIDO trabajador<?= $personal['nombre']?></h1>
            <h2>REGISTRAR VEHICULOS</h2>
        </center>
    



        <h2>Formulario Peaje</h2>
        <h1>Registrar Vehículos</h1>
        <div>
            <p>Fecha y hora actual:</p>
            <p id="fechaActual"></p>
            <p id="horaActual"></p>
        </div>
        <script>
            function mostrarFechaHoraActual() {
                var fechaHoraActual = new Date();
                var fecha = fechaHoraActual.toLocaleDateString();
                var hora = fechaHoraActual.toLocaleTimeString();

                document.getElementById("fechaActual").innerHTML = "Fecha: " + fecha;
                document.getElementById("horaActual").innerHTML = "Hora: " + hora;
            }

            setInterval(mostrarFechaHoraActual, 1000); // Actualizar cada segundo
        </script>
        <form action="../view/boleta.view.php" method="POST">

            
            <div class="Formulario">
                <div class="formulario-campo">
                    <label for="nombre">Placa:</label>
                    <input type="text" id="nombre" name="placa" placeholder="Ingresa N° de Placa" value = "<?= $placa?>" minlength = "7" maxlength="7">
                </div>

                <div class="formulario-campo">
                    <label for="opciones">Categoria: :</label>
                    <select id="opciones" name="categoria">
                        <?php
                        if(!empty($categoriaEditar)){echo "<option value='".$idcategoria."' selected>".$categoriaEditar."</option>";} 
                        while($row=$categoria->fetch_array(MYSQLI_ASSOC)){ ?>
                        <option value="<?= $row['id_categoria']?>"><?= 'Cat: '.$row['id_categoria'] .'  /num: '. $row['ejes'];?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="formulario-campo">
                    <label for="categoria">Opcion de pago:</label>
                    <select id="categoria" name="opcionPago">
                        <?php if(!empty($opcionPago)){ echo "<option value='". $opcionPago ."' selected>" . $opcionPago . "</option>";}?>
                        <option value="ruc">RUC</option>
                        <option value="efectivo">Efectivo</option>
                    </select>
                </div>               
                <div class="formulario-campo">
                    <label for="monto">monto de ingreso o RUC: </label>
                    <input type="text" id="monto" name="ingreso" placeholder="monto ingreso" value = "<?= $ingreso?>" minlength="1" maxlength="11">
                </div>
            </div>

            <div class="campo">
                <button type="submit" value="Enviar">enviar</button>
            </div>
    </form>
    <div class="col">
            <a href="../controller/salida.controller.php"> 
                <button type = "button" class="btn btn-danger">SALIR</button>
            </a>
        </div>

</div>
