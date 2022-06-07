<?php
include "web/header.php";

$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$consulta = "SELECT * FROM rapero ORDER BY RAND() LIMIT 10";

if ($resultado = $mysqli->query($consulta)) {
    while ($fila = $resultado->fetch_assoc()) {
        include 'web/rapero.html';
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">

        </div>
    </div>
</div>
<?php
include "web/footer.php";
?>