<?php
include "web/header.php";
$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<div class="container-fluid">
    <div class="row">

        <?php
        $consulta = "SELECT * FROM rapero ORDER BY RAND() LIMIT 10";
        if ($resultado = $mysqli->query($consulta)) {
            while ($row = $resultado->fetch_assoc()) {
                include "web/rapero.html";
            }
        };
        ?>

    </div>
</div>
<?php
include "web/footer.php";
?>