<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["correo"]) && isset($_POST["pass"])) {
        if (!empty($_POST["correo"]) && !empty($_POST["pass"])) {
            $correo = $_POST["correo"];
            $pass = $_POST["pass"];
            $fecha = date('m:d:Y G:i:s');

            $consultaCorreo = "SELECT email FROM cuenta WHERE email = '$correo'";
            $consultaPass = "SELECT pass FROM cuenta WHERE email = '$correo'";

            $mysqli = new mysqli("localhost", "root", "", "raperos");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            if ($correoBaseDatos = $mysqli->query($consultaCorreo)) {
                $row = $correoBaseDatos->fetch_assoc();
                $correoBaseDatos = $row["email"];

                if ($correo == $correoBaseDatos) {

                    if ($passBaseDatos = $mysqli->query($consultaPass)) {
                        $row = $passBaseDatos->fetch_assoc();
                        $passBaseDatos = $row["pass"];
                        echo $passBaseDatos;
                        echo $pass;
                        if ($pass == $passBaseDatos) {
                            $_SESSION["log"] = true;
                            header('Location: ../index.php');
                            if ($correo == "admin") {
                                $_SESSION["admin"] = true;
                            }
                        } else {
                            header('Location: ../cuenta.php');
                        }
                    }
                }
            };
        } else {
            echo "ERROR 2";
        }
    } else {
        echo "ERROR 1";
    }
} else {
    echo "ERROR 0";
}
