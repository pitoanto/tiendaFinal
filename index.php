<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <title>RapperBuy</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row filaHeader">
            <a href="index.php" class="col-3 col-md-2 btnHeader">LOGO</a>
            <a href="index.php" class="d-none d-md-block col-md-4 btnHeader">INICIO</a>
            <a href="store.php" class="col-6 col-md-4 btnHeader">TIENDA</a>
            <a href="#" class="col-3 col-md-2 btnHeader">CUENTA</a>
        </div>

    </div>
    <div id="carouselExampleCaptions" class="d-xl-block d-none carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/fondoWeb1.jpg" class="imgCarousel d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Blon y SweetPain</h1>
                    <h4>Su encuentro tuvo lugar en la RedBull 2019</h4>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/fondoWeb2.jpg" class="imgCarousel d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Mnak y Skone</h1>
                    <h4>Mnak y Skone batallando durante la FMS España</h4>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/fondoWeb3.jpg" class="imgCarousel d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Arkano y Dtoke</h1>
                    <h4>Arkano rapeando contra Dtoke en la RedBull 2015</h4>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="btnSlider carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid">
        <div class="row raperosFamosos">
            <div class="col-12 raperosFamososTitulo">Descubre nuestros raperos mejor valorados</div>
        </div>
        <div class="row raperosFamosos">
            <?php
            $mysqli = new mysqli("localhost", "root", "", "raperos");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            $consulta = "SELECT * FROM rapero ORDER BY RAND() LIMIT 4";
            if ($resultado = $mysqli->query($consulta)) {
                while ($row = $resultado->fetch_assoc()) {
                    include "rapero.html";
                }
            };
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="serviciosTitulo">Nuestros servicios
                <div class="HR"></div>
            </div>
            <div class="col servicios">
                <p> Ofrecemos distintos raperos para su entretenimiento. Los mejores raperos a su disposición, tanto los dedicados a la música como a las batallas de gallos... Sí, esa salvajada inhumana que realizan ciertos jóvenes.</p>
            </div>
            <div class="col servicios">
                <p>Con todo esto, acercamos a vuestras estrellas favoritas y extremadamente violentas a vuestras vidas, a ver si aprendéis lo que es música de verdad, y así conseguimos avanzar como sociedad, ya que los raperos son pura violencia sin sentido.</p>
            </div>
        </div>
        <div class="row divRegistro">
            <div class="col-12 col-md-6">
                <p> ¿Primera vez en nuestra web? <br> Regístrate para obtener los mejores precios</p>
            </div>

            <a href="#" class="col-12 col-md-6 divLinkRegistro">Regístrate</a>

        </div>
    </div>

    <?php
    include "web/footer.php";
    ?>