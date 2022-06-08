<?php
include "web/header.php";
$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$miRapero = $_GET["id"];

$consulta = "SELECT * FROM rapero WHERE rapero.id = $miRapero";

if ($resultado = $mysqli->query($consulta)) {
    $row = $resultado->fetch_assoc();
}
?>

<div class="container-fluid fichaRaperoFondo">
    <div class="row">
        <div class="col-12">
            <?php
            printf("<div class='tituloFichaRapero'>%s | %s</div>", $row["nombre"], $row["tipo"]);
            ?>
        </div>
        <div class="col-12 col-md-4 fichaRapero">
            <?php
            printf("<img src='%s' alt='%s'>", $row["img"], $row["nombre"]);
            ?>
        </div>
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12">
                    <?php
                    printf("<div class='nombreFichaRapero'>%s</div>", $row["nombre"]);
                    ?>
                </div>
                <div class="col-12">
                    <?php
                    printf("<div class='descripcionFichaRapero'>%s</div>", $row["descripcion"]);
                    ?>
                </div>
                <div class="col-12">
                    <?php
                    printf("<div class='precioFichaRapero'>%s€</div>", $row["precio"]);
                    ?>
                </div>
                <div class="col-12">
                    <form action="">
                        <button class="btnComprar">
                            comprar
                        </button>
                    </form>
                </div>
                <div class="col-12 ">
                    <?php
                    printf("<div class='fraseFichaRapero'><q>%s</q></div>", $row["frase"]);
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include "web/footer.php";
?>