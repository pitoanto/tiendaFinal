<?php
include "web/header.php";
function validar($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);

    return $dato;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["descripcion"]) && isset($_POST["frase"]) && isset($_POST["img"]) && isset($_POST["video"]) && isset($_POST["precio"])) {

        if (!empty($_POST["nombre"]) && !empty($_POST["tipo"]) && !empty($_POST["descripcion"]) && !empty($_POST["frase"]) && !empty($_POST["img"]) && !empty($_POST["video"]) && !empty($_POST["precio"])) {

            $nombre = $_POST["nombre"];
            $tipo = $_POST["tipo"];
            $descripcion = $_POST["descripcion"];
            $frase = $_POST["frase"];
            $img = $_POST["img"];
            $video = $_POST["video"];
            $precio = $_POST["precio"];
            if (isset($_POST["precioOferta"]) && !empty($_POST["precioOferta"])) {
                $precioOferta = $_POST["precioOferta"];
                $precioOferta = validar($precioOferta);
            }

            $nombre = validar($nombre);
            $tipo = validar($tipo);
            $descripcion = validar($descripcion);
            $frase = validar($frase);
            $video = validar($video);
            $precio = validar($precio);

            $mysqli = new mysqli("localhost", "root", "", "raperos");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            if (!isset($precioOferta)) {
                $insertar = "INSERT INTO rapero (nombre, tipo, descripcion, img, video, frase, precio) VALUES ('$nombre', '$tipo', '$descripcion', '$img', '$video', '$frase', '$precio')";

                mysqli_query($mysqli, $insertar);
            } else {
                $insertar = "INSERT INTO rapero (nombre, tipo, descripcion, img, video, frase, precio, precio_oferta) VALUES ('$nombre', '$tipo', '$descripcion', '$img', '$video', '$frase', '$precio', '$precioOferta')";

                mysqli_query($mysqli, $insertar);
            }
        } else {
            echo "<div style='text-align:center; color:red;'><h2>Debes poner todos los campos, el único que puedes dejar en blanco es el precio en oferta.</h2></div>";
        }
    } else {
    }
}
?>

<div class="container"><br>
    <div class="row">
        <div class="col-2"></div>

        <form class="col-8" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="text-align: center; background-color:rgb(152, 143, 42)"><br>

            <input class="inputAddRapero" type="text" name="nombre" id="nombre" placeholder="Nombre"> <br>
            <input class="inputAddRapero" type="text" name="tipo" id="tipo" placeholder="Tipo de raper@"><br>
            <input class="inputAddRapero" type="text" name="descripcion" id="descripcion" placeholder="Descripcion"><br>
            <input class="inputAddRapero" type="text" name="frase" id="frase" placeholder="Frase"><br>
            <input class="inputAddRapero" type="text" name="img" id="img" placeholder="Link a la imagen"><br>
            <input class="inputAddRapero" type="text" name="video" id="video" placeholder="Link al vídeo"><br>
            <input class="inputAddRapero" type="number" name="precio" id="precio" placeholder="Precio"><br>
            <input class="inputAddRapero" type="number" name="precioOferta" id="precioOferta" placeholder="Precio en oferta"><br>
            <hr>
            <input class="btnAddRapero" type="submit" value="Insertar"><br>
        </form>
        <div class="col-2"></div>
    </div><br>
</div>
<?php
include "web/footer.php";


?>