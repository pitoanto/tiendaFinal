<?php
include "web/header.php";
$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// include 'web/rapero.html';
?>

<div class="container-fluid">
    <div class="row">

        <?php
        $consulta = "SELECT * FROM raperos LIMIT 10";
        if ($resultado = $mysqli->query($consulta)) {
            while ($row = $resultado->fetch_assoc()) {
            }
        };
        ?>

    </div>
</div>
<?php
include "web/footer.php";
?>