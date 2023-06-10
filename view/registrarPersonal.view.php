
<?php  include('../other/header.php')?>
<!--formulario de registro (admin)-->
<center>
    <form action="../controller/registro.controller.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" required>
        <br>
        <br>
        <label for="contrasena">Apellido:</label>
        <input type="text" name="apellido" minlength="5" maxlength="20" required>
        <br>
        <br>
        <label for="contrasena">DNI:</label>
        <input type="text" name="dni" minlength="8" maxlength="8" required>

        <br>
        <br>
        <label for="contrasena">Telefono:</label>
        <input type="number" name="telefono" minlength="9" maxlength="9"required>
        <br>
        <br>
        <label for="contrasena">Correo:</label>
        <input type="text" name="correo" minlength="10" maxlength="40" required>
        <br>
        <br>
        <label for="contrasena">Direccion:</label>
        <input type="text" name="direccion" required>
        <br>
        <br>
        <label for="contrasena">Genero:</label>
        <input type="text" name="genero" required>

        <input type="submit" value="Registrar">
        <br>
        <h3><a href="../vista/bienvenida.php">Ir a Registrar Usuario</a></h3>
    </form>

</center>
<?php  include('../other/footer.php')?>
