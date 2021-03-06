<?php
session_start();
function validar($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);

    return $dato;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["pass"]) && isset($_POST["direccion"])) {
        if (!empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["pass"]) && !empty($_POST["direccion"])) {
            $nombre = $_POST["nombre"];
            $correo = $_POST["correo"];
            $pass = $_POST["pass"];
            $direccion = $_POST["direccion"];
            $fecha = date('m:d:Y G:i:s');

            $nombre = validar($nombre);
            $correo = validar($correo);
            $pass = validar($pass);
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $direccion = validar($direccion);

            $consultaCorreo = "SELECT email FROM cuenta WHERE email = '$correo'";

            $mysqli = new mysqli("localhost", "root", "", "raperos");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            if ($correoBaseDatos = $mysqli->query($consultaCorreo)) {
                $row = $correoBaseDatos->fetch_assoc();
                $correoBaseDatos = $row["email"];

                if ($correo == $correoBaseDatos) {
                    $correoLog = $_POST["correo"];
                    $registroLog = "INSERT INTO log (fecha, email_intento, correcto) VALUES ('$fecha', '$correoLog', 0)";
                    mysqli_query($mysqli, $registroLog);
                    mysqli_close($mysqli);
                    header('Location: ../cuenta.php');
                } else {
                    $registro = "INSERT INTO cuenta (user, email, pass, direccion, fecha_registro) VALUES ('$nombre', '$correo', '$password', '$direccion', '$fecha')";
                    mysqli_query($mysqli, $registro);
                    $_SESSION["LOG"] = true;

                    $correoLog = $_POST["correo"];
                    $registroLog = "INSERT INTO log (fecha, email_intento, correcto) VALUES ('$fecha', '$correoLog', 1)";
                    mysqli_query($mysqli, $registroLog);

                    $consultaID = "SELECT id_user FROM cuenta WHERE email = '$correo'";
                    if ($id_user = $mysqli->query($consultaID)) {
                        $row = $id_user->fetch_assoc();
                        $id_user = $row["id_user"];
                        $_SESSION["id_user"] = $id_user;
                        mysqli_close($mysqli);
                    }
                    mysqli_close($mysqli);
                    header('Location: ../index.php');
                }
            };
        } else {
            // echo "ERROR 2";
            mysqli_close($mysqli);
            header('Location: ../cuenta.php');
        }
    } else {
        // echo "ERROR 1";
        header('Location: ../cuenta.php');
    }
} else {
    // echo "ERROR 0";
    header('Location: ../cuenta.php');
}
