<?php
session_start();
$_SESSION["LOG"] = false;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idRapero = $_GET["id"];
    if (isset($_SESSION["id_user"])) {
        $_SESSION["LOG"] = true;

        if (isset($_GET["id"]) && !is_null($_GET["id"])) {
            // var_dump("ID: " . $_GET["id"] . " ID_USER: " . $_SESSION["id_user"]);
            $mysqli = new mysqli("localhost", "root", "", "raperos");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            $idUsuario = $_SESSION["id_user"];
            $insertaRapero = "INSERT INTO carrito (id_user, id_rapero) VALUES ('$idUsuario', '$idRapero')";

            $comprobarCarritoUsuario = "SELECT id_user FROM carrito WHERE id_user = '$idUsuario'";

            if ($id_user_carrito = $mysqli->query($comprobarCarritoUsuario)) {
                $rowUser = $id_user_carrito->fetch_assoc();
                $id_user_carrito = $rowUser["id_user"];
                // var_dump("ID Usuario: " . $id_user_carrito);

                $comprobarCarritoRapero = "SELECT id_rapero FROM carrito WHERE id_rapero = '$idRapero'";
                if ($id_rapero_carrito = $mysqli->query($comprobarCarritoRapero)) {
                    $rowRapero = $id_rapero_carrito->fetch_assoc();
                    $id_rapero_carrito = $rowRapero["id_rapero"];
                    var_dump("ID Usuario: " . $id_user_carrito . " ID Rapero: " . $id_rapero_carrito);

                    $comprobarCarrito = "SELECT * FROM carrito WHERE id_user = '$id_user_carrito' AND id_rapero = '$id_rapero_carrito'";
                    if ($carrito = $mysqli->query($comprobarCarrito)) {
                        $rowCarrito = mysqli_num_rows($carrito);

                        if ($rowCarrito >= 1) {
                            $_SESSION["enCarrito"] = true;
                            header("Location: ../raperoIndividual.php?id=$idRapero");
                        } else if (mysqli_query($mysqli, $insertaRapero)) {
                            $_SESSION["add"] = true;
                            header("Location: ../raperoIndividual.php?id=$idRapero");
                        }
                    } else {
                        header("Location: ../raperoIndividual.php?id=$idRapero");
                    }
                }
            }
        } else {
            header("Location: ../raperoIndividual.php?id=$idRapero");
        }
    } else {
        header("Location: ../raperoIndividual.php?id=$idRapero");
    }
}
