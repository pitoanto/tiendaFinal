<?php
session_start();
function validar($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);

    return $dato;
}
function login()
{
    $correoLog = $_POST["correo"];
    $fecha = date('m:d:Y G:i:s');
    $registroLog = "INSERT INTO log (fecha, email_intento, correcto) VALUES ('$fecha', '$correoLog', 0)";
    $mysqli = new mysqli("localhost", "root", "", "raperos");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    mysqli_query($mysqli, $registroLog);
    mysqli_close($mysqli);

    header('Location: ../cuenta.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["correo"]) && isset($_POST["pass"])) {
        if (!empty($_POST["correo"]) && !empty($_POST["pass"])) {
            $correo = $_POST["correo"];
            $pass = $_POST["pass"];
            $fecha = date('m:d:Y G:i:s');

            $correo = validar($correo);
            $pass = validar($pass);


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

                        if (password_verify($pass, $passBaseDatos)) {
                            $_SESSION["LOG"] = true;
                            $consultaID = "SELECT id_user FROM cuenta WHERE email = '$correo'";
                            if ($id_user = $mysqli->query($consultaID)) {
                                $row = $id_user->fetch_assoc();
                                $id_user = $row["id_user"];
                                $_SESSION["id_user"] = $id_user;
                            }

                            $correoLog = $_POST["correo"];
                            $registroLog = "INSERT INTO log (fecha, email_intento, correcto) VALUES ('$fecha', '$correoLog', 1)";
                            mysqli_query($mysqli, $registroLog);

                            $consultaAdmin = "SELECT email FROM cuenta WHERE email = '$correo' AND cuenta.admin = 1";

                            header('Location: ../store.php');
                            if ($correoAdminBaseDatos = $mysqli->query($consultaAdmin)) {
                                $row = $correoAdminBaseDatos->fetch_assoc();
                                $correoAdminBaseDatos = $row["email"];

                                if ($correo == $correoAdminBaseDatos && $id_user == 11) {
                                    $_SESSION["admin"] = true;
                                    mysqli_close($mysqli);

                                    header('Location: ../store.php');
                                }
                            } else {
                                header('Location: ../store.php');
                            }
                        } else {
                            echo "ERROR 6";
                            login();
                        }
                    } else {
                        echo "ERROR 5";
                        login();
                    }
                } else {
                    echo "ERROR 4";
                    login();
                }
            } else {
                echo "ERROR 3";
                login();
            }
        } else {
            echo "ERROR 2";
            login();
        }
    } else {
        echo "ERROR 1";
        login();
    }
} else {
    echo "ERROR 0";
    login();
}
