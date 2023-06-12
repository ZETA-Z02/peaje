<?php

include("../model/pagina.model.php");

switch (true){
    case (isset($_GET['id_personal'])):
    $idpersonal = $_GET['id_personal'];
    //echo 'se ejecuta editar personal';
    //header("location: ../view/editarPersonal.php?idpersonal=".urlencode($idpersonal));
    $personal = personalUnico($idpersonal);
    
    ?>
    <?php  include('../other/header.php')?>
        <h1>EDITAR EL PERFIL DEL PERSONAL</h1>

            <form action="../controller/editar.controller.php?idpersonal=<?= $personal['id_personal']?>" method="post" id = "my-form">

                <input type="hidden" name="idpersonal">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nombre" name="nombre"  value = "<?= $personal['nombre']?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="">Apellidos:</label>
                    <div class="col-sm-8">
                        <input type="text" required class="form-control" id="apellido" name="apellido"  value = "<?= $personal['apellido']?>">
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">DNI:</legend>
                    <input type="text" name = "dni" value = "<?= $personal['dni']?>" readonly>
                    </div>
                </fieldset>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">telefono:</label>
                    <div class="col-sm-2">
                        <input type="text" required class="form-control" id="dni" name="telefono"  value = "<?= $personal['telefono']?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="">correo:</label>
                    <div class="col-sm-3">
                        <input type="text" required class="form-control" id="telefono" name="correo"  value = "<?= $personal['correo']?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Dirección:</label>
                    <div class="col-sm-2">
                        <input type="text" required class="form-control" id="direccion" name="direccion" value = "<?= $personal['direccion']?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Genero:</label>
                    <div class="col-sm-2">
                        <input type="text" required class="form-control" id="direccion" name="genero"  value = "<?= $personal['genero']?>">
                    </div>
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="btn-agregar" id="btn-agregar">Guardar cambios</button>
                </div>
            </form><!-- Finalizar formulario de edición de perfil -->
    <?php 
    break;
    
    case (isset($_GET['id_login'])):
    $idlogin = $_GET['id_login'];
    //echo 'se ejecuta editar login';
    $login = loginUnico($idlogin,null);

    ?>
    <?php  include('../other/header.php')?>
        <h1>EDITAR AL USUARIO Y CONTRASEÑA</h1>

            <form action = "../controller/editar.controller.php?idlogin=<?= $login['id_login']?>" id = "my-form" method = "post">
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="">usuario</label>
                    <div class="col-sm-8">
                    <input type="text" name="usuario" value = "<?= $login['usuario'];?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="">contrasena</label>
                    <div class="col-sm-8">
                    <input type="password" name="password" placeholder = "ingrese su contrasena">
                    </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="">nueva contrasena</label>
                    <div class="col-sm-8">
                    <input type="password" name="contraseña" id = "password1" placeholder = "nueva contrasena">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="">repita la contrasenal</label>
                    <div class="col-sm-8">
                    <input type="password" name="contraseña1" id = "newpassword1" placeholder = "repita la contrasena">
                    </div>
                </div>
                <div>
                <h4>nivel de usuario:
                <select name="nivel" id="">                
                    <option value="1" <?php if ($login['nivel_usuario'] == 1) echo 'selected'; ?>>administrador</option>
                    <option value="2" <?php if ($login['nivel_usuario'] == 2) echo 'selected'; ?>>supervisor</option>
                    <option value="3" <?php if ($login['nivel_usuario'] == 3) echo 'selected'; ?>>personal</option>
                </select>
                </h4>
                </div>

                <button type="submit">actualizar</button>
                
            </form>
    <?php 
    include('../other/footer.php');
    break;

    case (isset($_GET['id_categoria'])):
    $idcategoria = $_GET['id_categoria'];
    //echo 'se ejecuta editar categoria';
    //conuslta para ver la categoria unica para editar
    $tarifa = tarifaUnica($idcategoria);
    ?>
    <?php  include('../other/header.php')?>
        <h1>EDITAR CATEGORIAS</h1>

        <form action = "../controller/editar.controller.php?idcategoria=<?=$tarifa['id_categoria']?>" id = "my-form" method = "post">
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="">num. categoria</label>
                    <div class="col-sm-8">
                        <input type="text" name="numCategoria" value = "<?= $tarifa['id_categoria'];?>" readonly>
                    </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="">descripcion</label>
                    <div class="col-sm-8">
                        <input type="text" name="descripcion" value = "<?= $tarifa['descripcion'];?>">
                    </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="">tarifa</label>
                    <div class="col-sm-8">
                        <input type="text" name="tarifa" value = "<?= $tarifa['tarifa'];?>">
                    </div>
            </div>
            
            <button type="submit">guardar cambios</button>

        </form>
            


<?php    
    break;

    default:
        echo 'no hay ni un id';
        header("location: ../view/admin.view.php");


}



?>