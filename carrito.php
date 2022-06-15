<?php
include "web/header.php";
$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<div class="container pagCarritoCompra">
    <?php
    if (isset($_SESSION["id_user"])) {
        $idUser = $_SESSION["id_user"];
        $consulta = "SELECT * FROM rapero INNER JOIN carrito ON rapero.id = carrito.id_rapero INNER JOIN cuenta ON cuenta.id_user = carrito.id_user AND cuenta.id_user = $idUser";
        if ($resultado = $mysqli->query($consulta)) {
            while ($row = $resultado->fetch_assoc()) {
                printf('
            <div class="row compraRapero">

                <div class="col">
                 <img  src="img\rapero\%s.jpg" alt="%s" class="compraIMGRapero">
                 </div>
                <div class="col compraInfoRapero">
                  <div>%s</div>
                  <div class="precioInfoRapero">%s€</div>
                </div>

                <div class="col contenedorbtnComprarBorrarRapero">
                 <a href="web/borrarCarrito.php?id=%s" class="btnComprarBorrarRapero">X</a>
                </div>
            </div>', $row["img"], $row["nombre"], $row["nombre"], $row["precio"], $row["id"]);
            }
        };
        $id_user = $_SESSION["id_user"];

        $precioOfertaBD = "SELECT SUM(precio_oferta) FROM rapero INNER JOIN carrito ON rapero.id = carrito.id_rapero INNER JOIN cuenta ON cuenta.id_user = carrito.id_user WHERE rapero.precio_oferta != '' AND cuenta.id_user = '$id_user'";
        if ($precioOferta = $mysqli->query($precioOfertaBD)) {
            $row = $precioOferta->fetch_assoc();
            $precioOferta = $row["SUM(precio_oferta)"];
        }

        $precioNormalBD = "SELECT SUM(precio) FROM rapero INNER JOIN carrito ON rapero.id = carrito.id_rapero INNER JOIN cuenta ON cuenta.id_user = carrito.id_user WHERE rapero.precio_oferta = '' AND cuenta.id_user = '$id_user'";

        if ($precioNormal = $mysqli->query($precioNormalBD)) {
            $row = $precioNormal->fetch_assoc();
            $precioNormal = $row["SUM(precio)"];
        }
        $total = $precioNormal + $precioOferta;
        printf("<div class='row contenedorBtnPagar'>
    <div class='col-12 totalPrecio'>TOTAL: $total €</div>
        <div class='col-12 contenedorBtnPagar'>
            <a href='compraFinalizada.php' class='btnPagar'>FINALIZAR COMPRA</a>
</div>
</div>");
    } else {
        printf("<div class='row'><div class='col-12 carritoRegistrar'><h3>Para ver los artículos del carrito, inicia sesión o regístrate</h3> <br> <p>¡Además, tendrás grandes descuentos en muchos de nuestr@s raper@s!</p></div></div>");
    }
    ?>
</div>

<?php
include "web/footer.php";
?>