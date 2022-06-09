<?php
include "web/header.php";
?>
<div class="container-fluid">
    <div class="row formularios">

        <form action="web/registro.php" method="post" class="col-12 col-md-6 formularioRegistro">
            <h3>Regístrate</h3>
            <input type="text" name="nombre" placeholder="Nombre" class="textFormulario">

            <input type="email" name="correo" placeholder="Correo electrónico" class="textFormulario">

            <input type="password" name="pass" placeholder="Contraseña" class="textFormulario">

            <input type="text" name="direccion" id="direccion" placeholder="Dirección" class="textFormulario">

            <input type="submit" value="Registrarme" class="botonFormulario">
        </form>

        <form action="web/log.php" method="post" class="col-12 col-md-6 formularioIngreso" class="textFormulario">
            <h3>Ingresa</h3>
            <input type="mail" name="correo" placeholder="Correo electrónico" class="textFormulario">

            <input type="password" name="pass" placeholder="Contraseña" class="textFormulario">

            <input type="submit" value="Ingresar" class="botonFormulario">

        </form>
    </div>
</div>
<?php
include "web/footer.php";
?>