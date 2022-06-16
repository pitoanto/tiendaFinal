<?php
include "web/header.php";
$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<div class="container-fluid pagCarritoCompra">
    <?php
    if (isset($_SESSION["id_user"])) {
        $idUser = $_SESSION["id_user"];
        $consulta = "SELECT * FROM rapero INNER JOIN carrito ON rapero.id = carrito.id_rapero INNER JOIN cuenta ON cuenta.id_user = carrito.id_user AND cuenta.id_user = $idUser";

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



        if ($resultado = $mysqli->query($consulta)) {
            while ($row = $resultado->fetch_assoc()) {
                if ($row["precio_oferta"] == 0) {
                    printf(
                        '<div class="row compraRapero">
                                <div class="col-12 col-sm-3">
                                    <img src="img\rapero\%s.jpg" alt="%s" class="compraIMGRapero">
                                </div>
                                <div class="col-12 col-sm-6 compraInfoRapero">
                                    <div>%s</div>
                                    <div class="col-12 precioInfoRapero">%s€</div>
                                </div>
                                <div class="col-12 col-sm-2 contenedorbtnComprarBorrarRapero">
                                    <a href="web/borrarCarrito.php?id=%s" class="btnComprarBorrarRapero">Eliminar</a>
                                </div>
                            </div>',
                        $row["img"],
                        $row["nombre"],
                        $row["nombre"],
                        $row["precio"],
                        $row["id"]
                    );
                } else {
                    printf(
                        '<div class="row compraRapero">
                                <div class="col-12 col-md-4">
                                    <img src="img\rapero\%s.jpg" alt="%s" class="compraIMGRapero">
                                </div>
                                <div class="col-12 col-md-5 compraInfoRapero">
                                    <div>%s</div>
                                <div class="col-12 precioRaperoTachado">%s€</div>
                                <div class="col-12 precioInfoRapero">%s€</div>
                                </div>
                                <div class="col-12 col-md-2 contenedorbtnComprarBorrarRapero">
                                    <a href="web/borrarCarrito.php?id=%s" class="btnComprarBorrarRapero">Eliminar</a>
                                </div>
                            </div>',
                        $row["img"],
                        $row["nombre"],
                        $row["nombre"],
                        $row["precio"],
                        $row["precio_oferta"],
                        $row["id"]
                    );
                }
            }
        }


        if ($total != 0) {
            printf("<div class='row contenedorBtnPagar'><div class='col-12 totalPrecio'>TOTAL: $total €</div><div class='col-12 contenedorBtnPagar'><a href='compraFinalizada.php' class='btnPagar'>PAGAR</a></div></div>");
        } else {
            printf("<div class='row contenedorBtnPagar'><div class='col-12 totalPrecio'>¡Aún no tienes productos en el carrito!</div></div>");
        }
    } else {
        printf("<div class='row contenedorBtnPagar'><div class='col-12 totalPrecio'>Debes estar registrado para poder comprar</div><a href='cuenta.php' class='col-12 noLog'>Regístrate</a></div>");
    }
    ?>
</div>

<?php
include "web/footer.php";
?>