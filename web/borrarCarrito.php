<?php
session_start();
// var_dump("ID RAPERO: " . $_GET["id"] . " USUARIO: " . $_SESSION["id_user"]);
$idBorrar = $_GET["id"];
$idUserBorrar = $_SESSION["id_user"];

$borrarRaperoCarrito = "DELETE FROM carrito WHERE id_rapero = $idBorrar AND id_user = $idUserBorrar";

$mysqli = new mysqli("localhost", "root", "", "raperos");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
var_dump($borrarRaperoCarrito);
if ($mysqli->query($borrarRaperoCarrito)) {
    header('Location: ../carrito.php');
} else {
    echo "MAL" . $mysqli->error;
}
