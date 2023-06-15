<?php 
require("../other/header.php");
include("../model/pagina.model.php");
$personal = Personal();



?>

<div class= 'container'>
        <center>
            <h1>BIENVENIDO administrador de caja</h1>
            <h2>REGISTRAR Y EDITAR CAJA</h2>
        </center>

        <h2>Formulario Peaje</h2>
        <h1>Registrar Vehículos</h1>
        <div>
            <p>Fecha y hora actual:</p>
            <p id="fechaActual"></p>
            <p id="horaActual"></p>
        </div>
        <!--scripo para ver la hora actual, JS-->
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
        <form action="../controller/caja.controller.php" method="POST">

            
            <div class="Formulario">
                
                <div class="formulario-campo">
                    <label for="opciones">Personal de caja:</label>
                    <select id="opciones" name="personal_caja">
                        <?php 
                        //aqui poner al personal encargado cuando se edite
                        while($row=$personal->fetch_array(MYSQLI_ASSOC)){ ?>
                        <option value="<?= $row['id_personal']?>"><?= 'id: '.$row['id_personal'] .' /nombre: '. $row['nombre'];?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="formulario-campo">
                    <label for="nombre">descripcion:</label>
                    <input type="textarea" id="nombre" name="descripcion" placeholder="descripcion de la caja" value = "<?= $placa?>">
                </div>

              
                <div class="formulario-campo">
                    <label for="monto">monto inicio jordana: </label>
                    <input type="text" id="monto" name="inicio" placeholder="monto inicio" value = "<?= $ingreso?>" minlength="1" maxlength="11">
                </div>
            </div>

            <div class="campo">
                <button type="submit" value="crear">crear</button>
            </div>
    </form>
    <div class="col">
            <a href="../controller/salida.controller.php"> 
                <button type = "button" class="btn btn-danger">SALIR</button>
            </a>
        </div>

</div>