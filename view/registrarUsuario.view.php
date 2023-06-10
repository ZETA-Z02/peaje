
<?php  include('../other/header.php')?>
<!--formulario de registro (admin)-->
<center>
    <form action="../controller/registroUser.controller.php" method="POST" id = "my-form">
        <label for="nombre">DNI:</label>
        <input type="text" name="usuario" required>
        <br>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id = "contraseña"required>
        <br>
        <br>
        <label for="contrasena">Repita la contrasena</label>
        <input type="password" name="contrasena1" id = "contraseña1" required>

        <input type="hidden" name= "idpersonal" value=<?= $_GET['idpersonal'] ?>>

        <h4>nivel de usuario:
            <select name="nivel" id="">                
                <option value="1">administrador</option>
                <option value="2">supervisor</option>
                <option value="3">personal</option>
            </select>
        </h4>

        <input type="submit" value="Registrar">
        <br>
        <h3><a href="../vista/bienvenida.php">REGRESAR</a></h3>
    </form>
</center>
<?php  include('../other/footer.php')?>
