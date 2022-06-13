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
            printf("<div class='tituloFichaRapero'>%s<br><span class='tituloTipoFichaRapero'>%s</span></div>", $row["nombre"], $row["tipo"]);
            ?>
            <div class="hr"></div>
            <br>
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
                    printf("<div class='nombreFichaRapero'>%s</div><div class='tipoFichaRapero'>%s</div>", $row["nombre"], $row["tipo"]);
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


                <?php
                if (isset($_SESSION["LOG"])) {
                    var_dump($_SESSION["LOG"]);
                    if ($_SESSION["LOG"] == true) {
                        if (isset($_SESSION["enCarrito"])) {
                            if ($_SESSION["enCarrito"] == true) {
                                printf('<div class="col-12"><div class="enCarrito">
                                Ya tienes a esta persona en el carrito
                                </div></div>');
                                $_SESSION["enCarrito"] = false;
                            } else {
                                if (isset($_SESSION["add"])) {
                                    if ($_SESSION["add"] == true) {
                                        printf('<div class="col-12"><div class="addRapero" style="display:none">
                                        Persona añadida al carrito
                                        </div></div>');
                                    } else {
                                        printf('<div class="col-12"><div style="display:none"> </div></div>');
                                    }
                                } else {
                                    printf('<div class="col-12"><div style="display:none"> </div></div>');
                                }
                            }
                        } else {
                            printf('<div class="col-12"><div style="display:none"> </div></div>');
                        }
                    } else {
                        printf('<div class="col-12"><div class="noLog">Debes estar registrad@ para poder comprar</div></div>');
                    }
                } else {
                    printf('<div class="col-12"><div class="noLog">Debes estar registrad@ para poder comprar</div></div>');
                }
                ?>

                <div class="col-12">
                    <a href='web/productosCarrito.php?id=<?= $row["id"] ?>' class="btnComprar">Comprar</a>
                </div>


                <div class="col-12 ">
                    <?php
                    printf("<div class='fraseFichaRapero'><q>%s</q></div>", $row["frase"]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row filaFichaVideoRapero">
        <div class="d-none d-sm-block col-sm-3"></div>
        <?php
        printf("<iframe class='col-12 col-sm-6 videoFichaRapero' src='%s' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>", $row['video']);
        ?>
        <div class="d-none d-sm-block col-sm-3"></div>

    </div>
</div>
<div class="hr"></div>
</div>
<?php
include "web/footer.php";
?>