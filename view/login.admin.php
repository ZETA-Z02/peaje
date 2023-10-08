<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../asset/css/styleZeta.css">
    <title>LOGIN</title>
</head>
<body>

    <section>
        <div class="login">
            <form action="../controller/verificacion.controller.php" method="POST">
                <h2>Inicio de Sesion SUPER ADMIN</h2>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="text" name="usuario" required>
                    <label>USUARIO UNICO</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label>CONTRASENA ADMIN</label>
                </div>
                <div class="button">
                    <button class = "boton" type="submit">SIGUIENTE</button>
                </div>
                <div class="botton">
                    <button class='botton-botton'>
                        Atras
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>