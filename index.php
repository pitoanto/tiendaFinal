<?php
session_start();
if (isset($_SESSION["LOG"])) {
    if (isset($_SESSION["admin"])) {
        printf("<a href='admin.php' class='btnAdmin'>Administrar</a>");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon/favicon_1.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <title>RapperBuy</title>
</head>
<style>
    body,
    html {
        width: 100%;
        height: 100%;
        margin: 0;
        overflow-X: hidden;
    }

    #i1,
    #i2,
    #i3,
    #i4,
    #i5 {
        display: none;
    }

    .carrusel {
        margin: 0 auto;
        position: relative;
        width: 100%;
        padding-bottom: 38%;
        user-select: none;
        background-color: #1c1c1c;
    }

    .carrusel .slide_img {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .carrusel .slide_img img {
        width: inherit;
        height: inherit;
    }

    .prev,
    .next {
        width: 8%;
        height: inherit;
        position: absolute;
        top: 0;
        background-color: rgba(88, 88, 88, .2);
        color: rgba(244, 244, 244, .9);
        z-index: 99;
        transition: .45s;
        cursor: pointer;
        text-align: center;
    }

    .next {
        right: 0;
    }

    .prev {
        left: 0;
    }

    label span {
        position: absolute;
        font-size: 100pt;
        top: 50%;
        transform: translateY(-50%);
    }

    .prev:hover,
    .next:hover {
        transition: .3s;
        background-color: rgba(88, 88, 89, .4);
        color: #ffffff;
    }

    .carrusel #nav_slide {
        width: 100%;
        bottom: 12%;
        height: 11px;
        position: absolute;
        text-align: center;
        z-index: 99;
        cursor: default;
    }

    .slide_img {
        z-index: -1;
    }

    #i1:checked~#one,
    #i2:checked~#two,
    #i3:checked~#three,
    #i4:checked~#four,
    #i5:checked~#five {
        z-index: 9;
        animation: scroll .3s ease-out;
    }

    #i1:checked~#nav_slide,
    #i2:checked~#nav_slide,
    #i3:checked~#nav_slide,
    #i4:checked~#nav_slide,
    #i5:checked~#nav_slide {
        background-color: rgba(255, 255, 255, .9);
    }

    @keyframes scroll {
        0% {
            opacity: .4;
        }

        100% {
            opacity: 1;
        }
    }

    @media screen and (max-width: 685px) {
        .carrusel {
            border: none;
            width: 100%;
            height: 0;
            padding-bottom: 55%;
        }

        label span {
            font-size: 50pt;
        }

        .prev,
        .next {
            width: 15%;
        }

        #nav_slide .dots {
            width: 12px;
            height: 12px;
        }
    }

    @media screen and(min-width: 970px) {
        .me {
            display: none;
        }
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row filaHeader">
            <a href="index.php" class="col-3 col-md-2 btnHeader"><img src="img/favicon/favicon.png" alt="" class="logo"></a>
            <a href="index.php" class="d-none d-md-block col-md-4 btnHeader">INICIO</a>
            <a href="store.php" class="col-6 col-md-4 btnHeader">TIENDA</a>
            <?php
            if (isset($_SESSION["LOG"])) {
                if ($_SESSION["LOG"] == true) {
                    printf('<a href="web/logout.php" class="col-3 col-md-2 btnHeader">SALIR</a>');
                } else {
                    printf('<a href="cuenta.php" class="col-3 col-md-2 btnHeader">CUENTA</a>');
                }
            } else {
                printf('<a href="cuenta.php" class="col-3 col-md-2 btnHeader">CUENTA</a>');
            }
            ?>
        </div>

    </div>
    <div class="carrusel">

        <input type="radio" id="i1" name="images" checked />
        <input type="radio" id="i2" name="images" />
        <input type="radio" id="i3" name="images" />
        <input type="radio" id="i4" name="images" />
        <input type="radio" id="i5" name="images" />

        <div class="slide_img" id="one">

            <img src="img/fondoWeb1.jpg">

            <label class="prev" for="i5"><span>&#x2039;</span></label>
            <label class="next" for="i2"><span>&#x203a;</span></label>

        </div>

        <div class="slide_img" id="two">

            <img src="img/fondoWeb2.jpg">

            <label class="prev" for="i1"><span>&#x2039;</span></label>
            <label class="next" for="i3"><span>&#x203a;</span></label>

        </div>

        <div class="slide_img" id="three">
            <img src="img/fondoWeb3.jpg">

            <label class="prev" for="i2"><span>&#x2039;</span></label>
            <label class="next" for="i4"><span>&#x203a;</span></label>
        </div>

        <div class="slide_img" id="four">
            <img src="img/fondoWeb4.jpg">

            <label class="prev" for="i3"><span>&#x2039;</span></label>
            <label class="next" for="i5"><span>&#x203a;</span></label>
        </div>

        <div class="slide_img" id="five">
            <img src="img/fondoWeb5.jpg">

            <label class="prev" for="i4"><span>&#x2039;</span></label>
            <label class="next" for="i1"><span>&#x203a;</span></label>

        </div>


    </div>


    <!-- <div id="carouselExampleCaptions" class="d-xl-block d-none carousel slide" data-bs-ride="false">
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
    </div> -->
    <?php
    if (!isset($_SESSION["LOG"])) {
        printf("<div class='container-fluid'>
        <div class='row'>
            <div class='col carritoRegistrar'>
                <h3>Para ver los artículos del carrito, inicia sesión o regístrate</h3> <br>
                <p>¡Además, tendrás grandes descuentos en muchos de nuestr@s raper@s!</p>
            </div>
        </div>");
    }
    ?>
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

            <a href="cuenta.php" class="col-12 col-md-6 divLinkRegistro">Regístrate</a>

        </div>
    </div>

    <?php
    include "web/footer.php";
    ?>