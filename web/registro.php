<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["pass"]) && isset($_POST["direccion"])) {
        if (!empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["pass"]) && !empty($_POST["direccion"])) {
            $nombre = $_POST["nombre"];
            $correo = $_POST["correo"];
            $pass = $_POST["pass"];
            $direccion = $_POST["direccion"];
            $fecha = date('m:d:Y G:i:s');

            $consultaCorreo = "SELECT email FROM cuenta WHERE email = '$correo'";

            $mysqli = new mysqli("localhost", "root", "", "raperos");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            if ($correoBaseDatos = $mysqli->query($consultaCorreo)) {
                $row = $correoBaseDatos->fetch_assoc();
                $correoBaseDatos = $row["email"];
                if ($correo == $correoBaseDatos) {
                    echo "El email ya existe";
                } else {
                    $registro = "INSERT INTO cuenta (user, email, pass, direccion, fecha_registro) VALUES ('$nombre', '$correo', '$pass', '$direccion', '$fecha')";

                    mysqli_query($mysqli, $registro);
                    $_SESSION["log"] = true;
                    header('Location: ../index.php');
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
