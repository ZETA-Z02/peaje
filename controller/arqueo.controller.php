<?php 

session_start();
include('/usr/share/php/tcpdf/tcpdf.php');
require("../model/pagina.model.php");

$pdf = new TCPDF ('P', 'mm', 'A4', true, 'UTF-8');/*Clase para crear un PDF */




if(!empty($_POST['num_caja']) && !empty($_POST['fecha'])){
    $fecha = $_POST['fecha'];
    $id_caja = $_POST['num_caja'];
    //echo 'no hay numero d ecaja';
    $totalDia = arqueo($fecha,$id_caja);
    $montoInicialCaja = montoCaja($id_caja);
    //echo $totalDia['total'].'<br>';
    //echo $totalDia['vuelto'].'<br>';
    //echo $totalDia['tarifa'].'<br>';

    $total = 0;

    if(isset($_POST['10cent'])){
        $total += intval($_POST['10cent']) * 0.10;
    }
    if(isset($_POST['20cent'])){
        $total += intval($_POST['20cent']) * 0.20;   
    }
    if(isset($_POST['50cent'])){
        $total += intval($_POST['50cent']) * .50;
    }
    if(isset($_POST['1sol'])){
        $total += intval($_POST['1sol']) * 1;
    }
    if(isset($_POST['2sol'])){
        $total += intval($_POST['2sol']) * 2;
    }
    if(isset($_POST['5sol'])){
        $total += intval($_POST['5sol']) * 5;
    }
    if(isset($_POST['10sol'])){
        $total += intval($_POST['10sol']) * 10;
    }
    if(isset($_POST['20sol'])){
        $total += intval($_POST['20sol']) * 20;
    }
    if(isset($_POST['50sol'])){
        $total += intval($_POST['50sol']) * 50;
    }
    if(isset($_POST['100sol'])){
        $total += intval($_POST['100sol']) * 100;
    }
    if(isset($_POST['200sol'])){
        $total += intval($_POST['200sol']) * 200;
    }
    //verificar el arqueo


    if(($totalDia['tarifa'] == ($totalDia['total'] - $totalDia['vuelto'])) && $total  + $montoInicialCaja['monto_inicial'] == $totalDia['total']  + $montoInicialCaja['monto_inicial']){
    
        //echo 'todo bien';
        #AQUI HACER LA SALIDA DE ARCHIVO EN PDF

        // Configurar el encabezado y pie de página
        $pdf->SetHeaderData('', 0, 'ARQUEO DE CAJA', 'REGISTRO DE RECAUDACION CAJA');
        $pdf->setHeaderFont(Array('helvetica', 'B', 12));
        $pdf->setFooterFont(Array('helvetica', 'B', 12));

        $pdf->AddPage();

        $pdf->setFont('helvetica','B',16);
        $pdf->Cell(0, 10, 'arqueo verificado correctamente', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->Cell(0, 10, 'fecha: '.$fecha, 0, 1);
        $pdf->Cell(0, 10, 'monto ingresado: '.$totalDia['total'], 0, 1);
        $pdf->Cell(0, 10, 'vuelto total dado : '.$totalDia['vuelto'], 0, 1);
        $pdf->Cell(0, 10, 'cobro seguro por tarifa : '.$totalDia['tarifa'], 0, 1);
        $pdf->Cell(0, 10, 'total de monedas recauado : '.$total, 0, 1);
        $pdf->Cell(0, 10, 'RECAUDACION REGISTRADO Y RECUADACION FISICA CORRECTAS', 0, 1);
        //salida y guardado del pdf
        $pdf->Output('/var/www/html/peaje/pdf/arqueoBien.pdf', 'I');     

    
    }else{
        //echo 'algo esta mal';
        #AQUI HACER LA SALIDA DE ARCHIVO EN PDF
            
            // Configurar el encabezado y pie de página
            $pdf->SetHeaderData('', 0, 'ARQUEO DE CAJA', 'IMPRIMIENDO LO RECAUDADO POR CAJA');
            $pdf->setHeaderFont(Array('helvetica', 'B', 12));
            $pdf->setFooterFont(Array('helvetica', 'B', 12));

            $pdf->AddPage();

            $pdf->setFont('helvetica','B',16);
            $pdf->Cell(0, 10, 'arqueo fallido en la verificacion', 0, 1, 'C');
            $pdf->Ln(10);

            $pdf->Cell(0, 10, 'fecha del arqueo: '.$fecha, 0, 1);
            $pdf->Cell(0, 10, 'monto ingresado: '.$totalDia['total'], 0, 1);
            $pdf->Cell(0, 10, 'vuelto total dado : '.$totalDia['vuelto'], 0, 1);
            $pdf->Cell(0, 10, 'cobro seguro por tarifa : '.$totalDia['tarifa'], 0, 1);
            $pdf->Cell(0, 10, 'total de monedas recauado : '.$total, 0, 1);

            $pdf->Cell(0, 10, 'numero de caja en la que se realizo el arqueo : '.$id_caja, 0, 1);
            $pdf->Cell(0, 10, 'DIFERENCIAS ENTRE LO RECAUDADO REGISTRADO Y EL DINERO FISICO', 0, 1);
            //salida y guardado del pdf
            $pdf->Output('/var/www/html/peaje/pdf/arqueoMal.pdf', 'I');     
            //salida y guardado del pdf
            $pdf->Output('/var/www/html/peaje/pdf/boleta.pdf', 'I');     
    }

}else{
    header("location: ../view/arqueo.view.php?msg=noLlegadatos");
}

//echo $total.'<br>';


//imprimir por pdf los datos


// echo $_POST['10cent'].'<br>';
// echo $_POST['20cent'].'<br>';
// echo $_POST['50cent'].'<br>';
// echo $_POST['1sol'].'<br>';
// echo $_POST['2sol'].'<br>';
// echo $_POST['5sol'].'<br>';
// echo $_POST['10sol'].'<br>';
// echo $_POST['20sol'].'<br>';
// echo $_POST['50sol'].'<br>';
// echo $_POST['100sol'].'<br>';
// echo $_POST['200sol'].'<br>';
?>