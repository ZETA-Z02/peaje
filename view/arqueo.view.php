<?php 
session_start();

?>
<head>
    <link rel="stylesheet" href="../asset/css/styleBoleta.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>ARQUEO</h1>
        </div>
        <div class="form">
            <form action="../controller/arqueo.controller.php" method="POST">
                <div class="Formulario">
                    <div class="formulario-campo">
                        <label for="">monedas de 10 cent. </label>
                        <input type="number" name='10cent' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">monedas de 20 cent.</label>
                        <input type="number" name='20cent'>    
                    </div>
                    <div class="formulario-campo">
                        <label for="">monedas de 50 cent.</label>
                        <input type="number" name='50cent' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">monedas de 1.00 sol </label>
                        <input type="number" name='1sol' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">monedas de 2.00 soles </label>
                        <input type="number" name='2sol' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">monedas de 5.00 soles </label>
                        <input type="number" name='5sol' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">billete de 10 soles</label>
                        <input type="number" name='10sol' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">billete de 20 soles </label>
                        <input type="number" name='20sol' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">billetes de 50 soles </label>
                        <input type="number" name='50sol' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">billetes de 100 soles </label>
                        <input type="number" name='100sol' >
                    </div>
                    <div class="formulario-campo">
                        <label for="">billetes de 200 soles </label>
                        <input type="number" name='200sol' >
                    </div>
                </div>
                <div class="button">
                    <input type="date" name='fecha'>
                    <button type='submit'>enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>