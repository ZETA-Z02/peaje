<?php
date_default_timezone_set('America/Lima');

include('/usr/share/php/tcpdf/tcpdf.php');

require("../model/pagina.model.php");
//pdf instancia
$pdf = new TCPDF ('P', 'mm', 'A4', true, 'UTF-8');

if (isset($_POST['editar'])) {
    // Redirigir a la vista "registrarPeaje" con los datos ya llenados para editar
    header("Location: ../view/personal.view.php?editar=true&placa=".$_POST['placa']."&categoria=".$_POST['categoria']."&opcionPago=".$_POST['opcionPago']."&ingreso=".$_POST['ingreso']."&idcategoria=".$_POST['idcategoria']);
    exit();
}else if(isset($_POST['confirmar'])){

    if(!empty($_POST['placa']) && !empty($_POST['idcategoria'])  &&
       !empty($_POST['opcionPago']) && !empty($_POST['ingreso']) && 
       !empty($_POST['idlogin']) && !empty($_POST['idpersonal']) &&
       !empty($_POST['total'])  && !empty($_POST['categoria']) &&
       !empty($_POST['subtotal']) && !empty($_POST['igv']) &&
       !empty($_POST['cajero']) && !empty($_POST['vuelto'])       
    ){
        
        //para insertar datos, SOLO IMPORTANTES
        $placa = $_POST['placa'];
        $idcategoria = $_POST['idcategoria'];
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $opcionPago = $_POST['opcionPago'];
        $montoRuc = $_POST['ingreso'];
        $idlogin = $_POST['idlogin'];  
        
        //para crear la boleta en pdf
        $total = $_POST['total'];
        $tipo = $_POST['categoria'];
        $subtotal = $_POST['subtotal'];
        $igv = $_POST['igv'];
        $cajeroNombre = $_POST['cajero'];
        $vuelto = $_POST['vuelto'];
        $idpersonal = $_POST['idpersonal'];
        
        //verificacion de los datos
        //echo $placa.'<br>';
        //echo $idcategoria.'<br>';
        //echo $fecha.'<br>';
        //echo $hora.'<br>';
        //echo $opcionPago.'<br>';
        //echo $montoRuc.'<br>';
        //echo $idlogin.'<br>';
        //echo $total.'<br>';
        //echo $tipo.'<br>';
        //echo $subtotal.'<br>';
        //echo $igv.'<br>';
        //echo $cajeroNombre.'<br>';
        //echo $vuelto.'<br>';
        //echo $idpersonal.'<br>';

        #AQUI HACER LA SALIDA DE ARCHIVO EN PDF

        // Configurar el encabezado y pie de página
        $pdf->SetHeaderData('', 0, 'BOLETA DE PEAJE', 'IMPRIMIENDO BOLETA CON DATOS');
        $pdf->setHeaderFont(Array('helvetica', 'B', 12));
        $pdf->setFooterFont(Array('helvetica', 'B', 12));

        $pdf->AddPage();

        $pdf->setFont('helvetica','B',16);
        $pdf->Cell(0, 10, 'peaje cobrado exitosamente en pdf', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'placa: '.$placa, 0, 1);
        $pdf->Cell(0, 10, 'nombre: '.$cajeroNombre, 0, 1);
        $pdf->Cell(0, 10, 'vuelto : '.$vuelto, 0, 1);
        $pdf->Cell(0, 10, 'categoria : '.$tipo, 0, 1);
        $pdf->Cell(0, 10, 'subtotal : '.$subtotal, 0, 1);
        $pdf->Cell(0, 10, 'igv : '.$igv, 0, 1);
        $pdf->Cell(0, 10, 'monto o RUC : '.$montoRuc, 0, 1);
        $pdf->Cell(0, 10, 'opcion : '.$opcionPago, 0, 1);
        $pdf->Cell(0, 10, 'fecha : '.$fecha, 0, 1);
        $pdf->Cell(0, 10, 'hora : '.$hora, 0, 1);
        //salida y guardado del pdf
        $pdf->Output('/var/www/html/peaje/pdf/boleta.pdf', 'I');      
        
        //ya guarda el registro en la base de datos
        if(!insertarPeaje($placa,$idcategoria,$fecha,$hora,$opcionPago,$montoRuc,$idlogin,$vuelto)){
            //echo 'se guardo regitro';
            // Redireccionar a la vista "personal" en una nueva pestaña
            echo '<script>window.open("../pdf/boleta.pdf", "_blank");</script>';
            echo '<script>window.location.href = "../view/personal.view.php";</script>';
            header("location: ../view/personal.view.php");
            exit();
        }else{
            //echo 'no se guardo registro';
            header("location: ../view/personal.view.php");
        }
    }else{
        //echo 'faltan datos';
        header("location: ../view/personal.view.php");
    }
}else{
    //echo 'no llega ni editar ni confirmar';
    header("location: ../view/personal.view.php");
}

?>