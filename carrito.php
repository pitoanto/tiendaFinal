<?php
include "web/header.php";
$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<div class="container pagCarritoCompra">
    <?php
    $consulta = "SELECT * FROM rapero ORDER BY RAND() LIMIT 4";
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
                </div>

        <div class='col contenedorbtnComprarBorrarRapero'>
            <button class='btnComprarBorrarRapero'><svg class='btnComprarBorrarRaperoIMG' xmlns='http://www.w3.org/2000/svg' width='26' height='26' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                    <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z' />
                </svg></button>
        </div>
    </div>", $row["img"], $row["nombre"], $row["nombre"], $row["tipo"]);
        }
    };
    ?>
</div>

<?php
include "web/footer.php";
?>