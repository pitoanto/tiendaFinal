<?php
session_start();
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
</head>

<body>
    <!-- HEADER -->
    <div class="container-fluid">
        <div class="row filaHeader">
            <a href="index.php" class="col-3 col-md-2 btnHeader"><img src="img/favicon/favicon.png" alt="Logo" class="logo"></a>
            <a href="index.php" class="d-none d-md-block col-md-4 btnHeader">INICIO</a>
            <a href="store.php" class="col-6 col-md-4 btnHeader">TIENDA</a>
            <?php
            if (isset($_SESSION["log"])) {
                if ($_SESSION["log"] == true) {
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
    <div class="container-fluid contenedorBuscadorHeader">
        <div class="row buscadorHeader">
            <form class="col buscarForm" action="web/buscador.php" method="GET">
                <input type="text" name="buscar" id="buscar" class="textBuscador" placeholder="Buscar en toda la tienda...">
                <button type="submit" class="btnBuscador"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></button>
            </form>
        </div>
    </div>