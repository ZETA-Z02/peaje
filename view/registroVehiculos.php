<?php 
include("../model/pagina.model.php");
session_start();
$registro = Registro();

$categoria = tarifas();

require "../other/headerdiana.php";

while ($row = $registro->fetch_array(MYSQLI_ASSOC)) {
    $personalOptions[] = $row;
}

?>
<div class="col-md-8">
<h1>REGISTRO DE VEHICULOS ADMIN</h1><br><br><br>
<table class="tabletable">
    <thead>
        <tr>
            <th> <h3>Registro NUM </h3></th>
            <th> <h3>PLACA </h3> </th>
            <th> <h3>CATEGORIA </h3> </th>
            <th> <h3>FECHA </h3> </th>
            <th> <h3>HORA </h3> </th>
            <th> <h3>OPCION DE PAGO </h3> </th>
            <th> <h3>MONTO </h3> </th>
            <th> <h3>TARIFA </h3> </th>
            <th> <h3>PERSONAL: </h3> </th>
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
        <select id="opciones" name="categoria" class="styled-select">
            <?php
            while($row=$categoria->fetch_array(MYSQLI_ASSOC)){ ?>
            <option value="<?= $row['ejes']?>"><?= 'Cat: '.$row['id_categoria'] .'  /num: '. $row['ejes'];?></option>
            <?php } ?>
        </select>
        <input type="submit" name= 'buttonCategoria' value = 'filtrar categoria'>
    </form>

    <form action="../view/selectRegistro.view.php" method="POST"">
        <select name="personal" id="option" class="styled-select1">
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
    <form action="../view/selectRegistro.view.php" method="POST"">
        <input type="submit" name= 'revez' value="revez">
    </form>
    
</table>
<!--borrar esta parte si no funciona el grafico-->
<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total de Reportes Enviados</h5>

              <!-- Bar Chart -->
              <div id="barChart" style="min-height: 400px;" class="echart"></div>
              <?php 
              include "../models/reportes.model.php";
              $reportes = new Reportes();
              $data = $reportes->verReportes();

              $datos = array();

                // Recorrer el resultado y añadir los datos al array
                while ($fila = $data->fetch_assoc()) {
                    $datos[$fila['nombre']] = $fila['cantidad'];
                }
                // Convertir los datos a formato JSON
                $datos_json = json_encode($datos);
              ?>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var datos = <?php echo $datos_json; ?>;
                  // Convertir los datos a un array de objetos
                  var datos_array = [];
                  Object.keys(datos).forEach(function(key) {
                      datos_array.push({
                        name: key,
                        value: datos[key]
                      }); 
                    });

                  echarts.init(document.querySelector("#barChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: ['edg', 'ang', 'jho', 'elm', 'jer', 'sa', 'do']
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: datos_array,
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->

</div>
</div>
</div>

<a href="admin.view.php"><h2>ATRAS</h2></a>
</div>