<?php
include "web/header.php";
?>
<script>
    function validarLog() {
        let borrarMensaje = document.getElementById("mensajeErrorRegistro");
        borrarMensaje.style.visibility = "hidden";

        let email = document.getElementById("correoLogin");

        if (/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(email.value)) {
            let pass = document.getElementById("passLogin");

            if (pass.value.length > 0) {} else {
                event.preventDefault();
                let mensaje = document.getElementById("mensajeErrorLogin");
                mensaje.style.visibility = "visible";
            }
        } else {
            event.preventDefault();
            let mensaje = document.getElementById("mensajeErrorLogin");
            mensaje.style.visibility = "visible";
        }

    }

    function validarRegistro() {
        let borrarMensaje = document.getElementById("mensajeErrorLogin");
        borrarMensaje.style.visibility = "hidden";

        let email = document.getElementById("correoRegistro");

        if (/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(email.value)) {
            let pass = document.getElementById("passRegistro");

            if (pass.value.length > 0) {
                let nombre = document.getElementById("nombreRegistro");

                if (nombre.value.length > 0) {

                    let dir = document.getElementById("dirRegistro");
                    if (dir.value.length > 0) {} else {
                        event.preventDefault();
                        let mensaje = document.getElementById("mensajeErrorRegistro");
                        mensaje.style.visibility = "visible";
                    }
                } else {
                    event.preventDefault();
                    let mensaje = document.getElementById("mensajeErrorRegistro");
                    mensaje.style.visibility = "visible";
                }
            } else {
                event.preventDefault();
                let mensaje = document.getElementById("mensajeErrorRegistro");
                mensaje.style.visibility = "visible";
            }
        } else {
            event.preventDefault();
            let mensaje = document.getElementById("mensajeErrorRegistro");
            mensaje.style.visibility = "visible";
        }
    }
</script>
<div class="container-fluid">
    <div class="row formularios">

        <form action="web/registro.php" method="post" class="col-12 col-md-6 formularioRegistro">
            <h3>Regístrate</h3>
            <input type="text" name="nombre" id="nombreRegistro" placeholder="Nombre" class="textFormulario">

            <input type="email" name="correo" id="correoRegistro" placeholder="Correo electrónico" class="textFormulario">

            <input type="password" name="pass" id="passRegistro" placeholder="Contraseña" class="textFormulario">

            <input type="text" name="direccion" id="dirRegistro" placeholder="Dirección" class="textFormulario">

            <!-- <input type="submit" value="Registrarme" class="botonFormulario"> -->
            <button class="botonFormulario" onclick="validarRegistro()">Registrarse</button>

            <div id="mensajeErrorRegistro" style="margin:1rem;padding:1.5rem; color:red; visibility:hidden; border-radius:50px; font-size: 26px;">Introduzca los datos correctamente</div>
        </form>

        <form action="web/log.php" method="post" class="col-12 col-md-6 formularioIngreso" class="textFormulario">
            <h3>Ingresa</h3>
            <input type="mail" name="correo" id="correoLogin" placeholder="Correo electrónico" class="textFormulario">

            <input type="password" id="passLogin" name="pass" placeholder="Contraseña" class="textFormulario">

            <!-- <input type="submit" value="Ingresar" class="botonFormulario"> -->
            <button class="botonFormulario" onclick="validarLog()">Ingresar</button>

            <div id="mensajeErrorLogin" style="margin:1rem;padding:1.5rem; color:red; visibility:hidden; border-radius:50px; font-size: 26px;">Introduzca los datos correctamente</div>
        </form>

    </div>
</div>

<?php
include "web/footer.php";
?>