
<?php  include('../other/header.php')?>
<!--formulario de registro (admin)-->
<center>
    <form action="../controller/registro.controller.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" minlength="2" maxlength="20" required>
        <br>
        <br>
        <label for="contrasena">Apellido:</label>
        <input type="text" name="apellido" minlength="2" maxlength="20" required>
        <br>
        <br>
        <label for="contrasena">DNI:</label>
        <input type="text" name="dni" minlength="8" maxlength="8" required>

        <br>
        <br>
        <label for="contrasena">Telefono:</label>
        <input type="text" name="telefono" minlength="9" maxlength="9" required>
        <br>
        <br>
        <label for="contrasena">Correo:</label>
        <input type="email" name="correo" minlength="10" maxlength="40" required>
        <br>
        <br>
        <label for="contrasena">Direccion:</label>
        <input type="text" name="direccion" maxlength = "50" required>
        <br>
        <br>
        <label for="contrasena">Genero:</label>
        <input type="text" name="genero" maxlength="9" required>

        <input type="submit" value="Registrar">
    </form>

</center>
<?php  include('../other/footer.php')?>
