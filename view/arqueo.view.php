<?php 
session_start();

?>
<div>
    <h1>arqueo</h1>
</div>
<form action="../controller/arqueo.controller.php" method="POST">
    <label for="">
        monedas de 10 centimos <input type="number" name='10cent' >
    </label><br>
    <label for="">
        monedas de 20 centimos <input type="number" name='20cent'>    
    </label><br>
    <label for="">
        monedas de 50 centimos <input type="number" name='50cent' >
    </label><br>
    <label for="">
        monedas de 1.00 sol <input type="number" name='1sol' >
    </label><br>
    <label for="">
        monedas de 2.00 soles <input type="number" name='2sol' >
    </label><br>
    <label for="">
        monedas de 5.00 soles <input type="number" name='5sol' >
    </label><br>
    <label for="">
        billete de 10 soles <input type="number" name='10sol' >
    </label><br>
    <label for="">
        billete de 20 soles <input type="number" name='20sol' >
    </label><br>
    <label for="">
        billetes de 50 soles <input type="number" name='50sol' >
    </label><br>
    <label for="">
        billetes de 100 soles <input type="number" name='100sol' >
    </label><br>
    <label for="">
        billetes de 200 soles <input type="number" name='200sol' >
    </label>

    <input type="date" name='fecha'>

    <button type='submit'>enviar</button>


</form>