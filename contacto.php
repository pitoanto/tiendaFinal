<?php
include "web/header.php";
?>

<div class="container-fluid">
    <br>
    <div class="row">
        <?php
        if (isset($_SESSION["Enviado"])) {
            if ($_SESSION["Enviado"] == true) {
                printf("<div id='alertaEnvioEmail'>E-mail enviado correctamente, gracias por contactar con nosotros</div>");
            }
        }
        ?>

        <div class="d-none d-md-block col-md-3"></div>
        <form action="envioEmails/enviarEmail.php" method="POST" class="col-12 col-lg-6 formContacto">
            <br>
            <div class="tituloFormulario">Formulario de contacto</div>
            <div class="mb-3">
                <label for="email" class="form-label">Introduzca su e-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Introduzca su nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Juanito Cocunero">
            </div>
            <div class="mb-3">
                <label for="asunto" class="form-label">Asunto</label>
                <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Consulta">
            </div>
            <div class="mb-3">
                <label for="textoCorreo" class="form-label">Escriba sus comentarios</label>
                <textarea class="form-control" name="textoCorreo" id="textoCorreo" rows="3" placeholder="Mi consulta sobre la web de RapperBuy es..."></textarea>
            </div>
            <input type="submit" class="btnEnviarConsulta" name="botonEnviarConsulta" placeholder="Enviar consulta"></input>
        </form>
        <div class="d-none d-md-block col-md-3"></div>
    </div>
    <br>
</div>

<?php
include "web/footer.php";
?>