<?php
include "web/header.php";
$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<div class="container pagCarritoCompra">
    <?php
    // $consulta = "SELECT * FROM rapero ORDER BY RAND() LIMIT 4";
    $consulta = "SELECT * FROM rapero INNER JOIN carrito ON rapero.id = carrito.id_rapero INNER JOIN cuenta ON cuenta.id_user = carrito.id_user";
    if ($resultado = $mysqli->query($consulta)) {
        while ($row = $resultado->fetch_assoc()) {
            printf("
            <div class='row compraRapero'>

                <div class='col'>
                 <img src='%s' alt='%s' class='compraIMGRapero'>
                 </div>
                <div class='col compraInfoRapero'>
                  <div class='styleInfoRapero'>%s</div>
                  <div class='styleInfoRapero'>%s</div>
                  <div class='styleInfoRapero'>%s€</div>
                </div>

        <div class='col contenedorbtnComprarBorrarRapero'>
            <a href='web/borrarCarrito.php?id=%s' class='btnComprarBorrarRapero'>X</a>
        </div>
    </div>", $row["img"], $row["nombre"], $row["nombre"], $row["tipo"], $row["precio"], $row["id"]);
        }
    };
    ?>
</div>

<?php
include "web/footer.php";
?>