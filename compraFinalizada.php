<?php
include "web/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12" style="text-align:center; margin:2rem 0rem;background-color: #7D84B2;">
            <h1 style="margin: .5rem">¡Gracias por utilizar nuestros servicios!</h1>
            <h3 style="margin:.5rem">¡No olvides, pasarte por nuestra sección de <a href="contacto.php" style="color: #F6F8FF; text-decoration:none;">contacto</a> si te surge alguna duda!</h3>
            <p>Te redigiremos a nuestra página principal en 5 segundos, si quieres ir ya, <a href="index.php" style="color: #F6F8FF; text-decoration:none;">pulsa aquí</a></p>
        </div>
    </div>
    <div class="row bloqueInteresCompraFinalizada">
        <div class="col-12">Quizá te puedan interesar...</div>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "raperos");
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $id_user = $_SESSION["id_user"];
        $borrarCarrito = "DELETE FROM carrito WHERE id_user = '$id_user'";
        $mysqli->query($borrarCarrito);

        $consulta = "SELECT * FROM rapero ORDER BY RAND() LIMIT 4";
        if ($resultado = $mysqli->query($consulta)) {
            while ($row = $resultado->fetch_assoc()) {
                include "rapero.html";
            }
        };
        ?>
    </div>
    <br>
</div>
<script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 5000);
</script>
<?php
include "web/footer.php";
?>