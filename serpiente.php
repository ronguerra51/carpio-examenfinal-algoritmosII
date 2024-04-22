<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de la serpiente y escalera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: beige;
        }

        .tablero-container {
            margin-top: 50px;
            position: relative;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $nombre1 = isset($_POST['jugador1']) ? $_POST['jugador1'] : (isset($_SESSION['nombre1']) ? $_SESSION['nombre1'] : 'Jugador 1');
    $nombre2 = isset($_POST['jugador2']) ? $_POST['jugador2'] : (isset($_SESSION['nombre2']) ? $_SESSION['nombre2'] : 'Jugador 2');
    $nombre3 = isset($_POST['jugador3']) ? $_POST['jugador3'] : (isset($_SESSION['nombre3']) ? $_SESSION['nombre3'] : 'Jugador 3');

    if (!isset($_SESSION['nombre1'])) {
        $_SESSION['nombre1'] = $nombre1;
    }
    if (!isset($_SESSION['nombre2'])) {
        $_SESSION['nombre2'] = $nombre2;
    }
    if (!isset($_SESSION['nombre3'])) {
        $_SESSION['nombre3'] = $nombre3;
    }

    if (isset($_POST['reiniciar'])) {
        $_SESSION['jugador1casillaAcumulado'] = 0;
        $_SESSION['jugador2casillaAcumulado'] = 0;
        $_SESSION['jugador3casillaAcumulado'] = 0;
    }

    $dado1 = 0;
    $dado2 = 0;
    $dado3 = 0;

    $mensaje1 = '';
    $mensaje2 = '';
    $mensaje3 = '';

    if (isset($_POST['enviar1'])) {
        $dado1 = rand(1, 12);
        $_SESSION['jugador1casillaAcumulado'] += $dado1;
        $mensaje1 = "$nombre1 avanzó $dado1 casillas";
    }

    if (isset($_POST['enviar2'])) {
        $dado2 = rand(1, 12);
        $_SESSION['jugador2casillaAcumulado'] += $dado2;
        $mensaje2 = "$nombre2 avanzó $dado2 casillas";
    }

    if (isset($_POST['enviar3'])) {
        $dado3 = rand(1, 12);
        $_SESSION['jugador3casillaAcumulado'] += $dado3;
        $mensaje3 = "$nombre3 avanzó $dado3 casillas";
    }
    if (isset($_POST['valor1']) || isset($_POST['valor2'])) {
        $dado1 = $vrandom1 = rand(1, 12);
        $dado2 = $vrandom2 = rand(1, 12);

        if (isset($_POST['valor1'])) {
            $valorantiguo1 = $_POST['valor1'];
            $jugador1casillaAcumulado = $valorantiguo1 + $dado1;

            switch ($jugador1casillaAcumulado) {
                case 3:
                    $jugador1casillaAcumulado = 36;
                    $mensaje1 = "$nombre1 cayó en la casilla 3 y subió por la escalera a la casilla 36";
                    break;
                case 11:
                    $jugador1casillaAcumulado = 48;
                    $mensaje1 = "$nombre1 cayó en la casilla 11 y subió por la escalera a la casilla 48";
                    break;

                case 45:
                    $jugador1casillaAcumulado = 74;
                    $mensaje1 = "$nombre1 cayó en la casilla 45 y subió por la escalera a la casilla 74";
                    break;

                case 57:
                    $jugador1casillaAcumulado = 99;
                    $mensaje1 = "$nombre1 cayó en la casilla 57 y subió por la escalera a la casilla 99";
                    break;
                case 64:
                    $jugador1casillaAcumulado = 45;
                    $mensaje1 = "$nombre1 cayó en la casilla 64 y bajó por la serpiente a la casilla 45";
                    break;
                case 73:
                    $jugador1casillaAcumulado = 31;
                    $mensaje1 = "$nombre1 cayó en la casilla 73 y bajó por la serpiente a la casilla 31";
                    break;

                case 43:
                    $jugador1casillaAcumulado = 12;
                    $mensaje1 = "$nombre1 cayó en la casilla 43 y bajó por la serpiente a la casilla 12";
                    break;

                case 85:
                    $jugador1casillaAcumulado = 51;
                    $mensaje1 = "$nombre1 cayó en la casilla 85 y bajó por la serpiente a la casilla 51";
                    break;
                default:
                    $mensaje1 = "$nombre1 avanzó $dado1 casillas";
                    break;
            }
        }

        if (isset($_POST['valor2'])) {
            $valorantiguo2 = $_POST['valor2'];
            $jugador2casillaAcumulado = $valorantiguo2 + $dado2;

            switch ($jugador2casillaAcumulado) {
                case 3:
                    $jugador2casillaAcumulado = 36;
                    $mensaje2 = "$nombre2 cayó en la casilla 3 y subió por la escalera a la casilla 36";
                    break;
                case 11:
                    $jugador2casillaAcumulado = 48;
                    $mensaje2 = "$nombre2 cayó en la casilla 11 y subió por la escalera a la casilla 48";
                    break;

                case 45:
                    $jugador2casillaAcumulado = 74;
                    $mensaje2 = "$nombre2 cayó en la casilla 45 y subió por la escalera a la casilla 74";
                    break;

                case 57:
                    $jugador2casillaAcumulado = 99;
                    $mensaje2 = "$nombre2 cayó en la casilla 57 y subió por la escalera a la casilla 99";
                    break;
                case 64:
                    $jugador2casillaAcumulado = 45;
                    $mensaje2 = "$nombre2 cayó en la casilla 64 y bajó por la serpiente a la casilla 45";
                    break;
                case 73:
                    $jugador2casillaAcumulado = 31;
                    $mensaje2 = "$nombre2 cayó en la casilla 73 y bajó por la serpiente a la casilla 31";
                    break;

                case 43:
                    $jugador2casillaAcumulado = 12;
                    $mensaje2 = "$nombre2 cayó en la casilla 43 y bajó por la serpiente a la casilla 12";
                    break;

                case 85:
                    $jugador2casillaAcumulado = 51;
                    $mensaje2 = "$nombre2 cayó en la casilla 85 y bajó por la serpiente a la casilla 51";
                    break;
                default:
                    $mensaje2 = "$nombre2 avanzó $dado1 casillas";
                    break;
            }
        }
    }
    $jugador1casillaAcumulado = $_SESSION['jugador1casillaAcumulado'];
    $jugador2casillaAcumulado = $_SESSION['jugador2casillaAcumulado'];
    $jugador3casillaAcumulado = $_SESSION['jugador3casillaAcumulado'];
    ?>
    <div class="container text-center">
        <h1>SERPIENTES Y ESCALERAS</h1>
        <p>BIENVENIDOS!! <?= $nombre1 ?>, <?= $nombre2 ?> y <?= $nombre3 ?>.</p>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="serpiente.php" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="form-label" for="valor1">ACUMULADO <?= $nombre1 ?></label>
                            <input class="form-control" type="text" id="valor1" name="valor1" min="1" max="100" value="<?= $jugador1casillaAcumulado ?>" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="dado1">DADO <?= $nombre1 ?></label>
                            <input class="form-control" type="text" id="dado1" name="dado1" min="1" max="12" value="<?= $dado1 ?>" readonly>
                        </div>
                        <div class="col-lg-4 d-flex align-items-end">
                            <input type="submit" id="enviar1" name="enviar1" class="btn btn-success w-100" value="TIRAR">
                        </div>
                    </div>
                    <input type="hidden" name="jugador1" value="<?= $nombre1 ?>">
                </form>
                <form action="serpiente.php" method="post">
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label class="form-label" for="valor2">ACUMULADO <?= $nombre2 ?></label>
                            <input class="form-control" type="text" id="valor2" name="valor2" min="1" max="100" value="<?= $jugador2casillaAcumulado ?>" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="dado2">DADO <?= $nombre2 ?></label>
                            <input class="form-control" type="text" id="dado2" name="dado2" min="1" max="12" value="<?= $dado2 ?>" readonly>
                        </div>
                        <div class="col-lg-4 d-flex align-items-end">
                            <input type="submit" id="enviar2" name="enviar2" class="btn btn-success w-100" value="TIRAR">
                        </div>
                    </div>
                    <input type="hidden" name="jugador2" value="<?= $nombre2 ?>">
                </form>
                <form action="serpiente.php" method="post">
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <label class="form-label" for="valor3">ACUMULADO <?= $nombre3 ?></label>
                            <input class="form-control" type="text" id="valor3" name="valor3" min="1" max="100" value="<?= $jugador3casillaAcumulado ?>" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="dado3">DADO <?= $nombre3 ?></label>
                            <input class="form-control" type="text" id="dado3" name="dado3" min="1" max="12" value="<?= $dado3 ?>" readonly>
                        </div>
                        <div class="col-lg-4 d-flex align-items-end">
                            <input type="submit" id="enviar3" name="enviar3" class="btn btn-success w-100" value="TIRAR">
                        </div>
                    </div>
                    <input type="hidden" name="jugador3" value="<?= $nombre3 ?>">
                </form>
                <form action="serpiente.php" method="post">
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <input type="submit" name="reiniciar" class="btn btn-danger w-100" value="REINICIAR JUEGO">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php if ($mensaje1 !== '') : ?>
                    <div style="border:solid">
                        <h1><?= $nombre1 ?> </h1>
                        <h1>TIRO<?= $dado1 ?></h1>
                        <h2><?= $mensaje1 ?> EL TURNO DEL JUGADOR 2 <? $nombre2 ?> </h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php if ($mensaje2 !== '') : ?>
                    <div style="border:solid">
                        <h1><?= $nombre2 ?> </h1>
                        <h1>TIRO<?= $dado2 ?></h1>
                        <h2><?= $mensaje2 ?> Turno de jugador 3 <? $nombre3 ?> </h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php if ($mensaje3 !== '') : ?>
                    <div style="border:solid">
                        <h1><?= $nombre3 ?> </h1>
                        <h1>TIRO<?= $dado3 ?></h1>
                        <h2><?= $mensaje3 ?> Turno de jugador 1 <? $nombre1 ?> </h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6 offset-lg-4 mt-5">
        <img src="./images/escalera1.png" alt="" style="z-index:2; margin-top: 10px; margin-left: 100px; position:absolute; width:100px; height:300px; transform:rotate(-30deg)">
        <img src="./images/escalera2.png" alt="" style="z-index:2; margin-top: 350px; margin-left:150px; position:absolute; width:100px; height:300px; transform:rotate(30deg)">
        <img src="./images/escalera1.png" alt="" style="z-index:2; margin-top: 290px; margin-left:490px; position:absolute; width:100px; height:300px; transform:rotate(-30deg)">
        <img src="./images/escalera2.png" alt="" style="z-index:2; margin-top: 100px; margin-left:300px; position:absolute; width:100px; height:300px; transform:rotate(30deg)">
        <img src="./images/serpiente1.png" alt="" style="z-index:2; margin-top: 200px; margin-left:100px; position:absolute; width:200px; height:200px; transform:rotate(-30deg)">
        <img src="./images/serpiente1.png" alt="" style="z-index:2; margin-top: 100px; margin-left:400px; position:absolute; width:200px; height:400px; transform:rotate(-30deg)">
        <img src="./images/serpiente2.png" alt="" style="z-index:2; margin-top: 300px; margin-left:200px; position:absolute; width:300px; height:300px; transform:rotate(-20deg)">
        <img src="./images/serpiente2.png" alt="" style="z-index:2; margin-top: 10px; margin-left:300px; position:absolute; width:300px; height:300px; transform:rotate(-10deg)">
        <table class="tablero" style="z-index: 1;">
            <?php
            $colores = ['yellow', 'white', 'red', 'blue', 'green'];
            $NoCasilla = 101;
            $coloranterior = '';
            for ($fila = 0; $fila < 10; $fila++) {
                echo "<tr>";
                for ($columna = 0; $columna < 10; $columna++) {
                    echo "<td>";
                    $colorquetoca = rand(0, 4);
                    while ($colorquetoca == $coloranterior) {
                        $colorquetoca = rand(0, 4);
                    }
                    $coloranterior = $colorquetoca;

                    if ($fila > 0) {
                        if ($columna == 0) {
                            $NoCasilla -= 10;
                        } else {
                            if ($fila % 2 == 0) {
                                $NoCasilla--;
                            } else {
                                $NoCasilla++;
                            }
                        }
                    } else {
                        $NoCasilla--;
                    }

                    if ($jugador1casillaAcumulado == $NoCasilla && $jugador1casillaAcumulado > 0 && $jugador1casillaAcumulado < 101) {
                        echo "<div class='ficha' style='width: 60px; height: 60px; border: solid; background-color: $colores[$colorquetoca]'><img src='./images/ficha.png' alt='' style='z-index: 2; width: 60px; height: 60px;'></div>";
                    } elseif ($jugador2casillaAcumulado == $NoCasilla && $jugador2casillaAcumulado > 0 && $jugador2casillaAcumulado < 101) {
                        echo "<div class='ficha' style='width: 60px; height: 60px; border: solid; background-color: $colores[$colorquetoca]'><img src='./images/city.png' alt='' style='z-index: 2; width: 60px; height: 60px;'></div>";
                    } elseif ($jugador3casillaAcumulado == $NoCasilla && $jugador3casillaAcumulado > 0 && $jugador3casillaAcumulado < 101) {
                        echo "<div class='ficha' style='width: 60px; height: 60px; border: solid; background-color: $colores[$colorquetoca]'><img src='./images/bayern.png' alt='' style='z-index: 2; width: 60px; height: 60px;'></div>";
                    } else {
                        echo "<div class='ficha' style='width: 60px; height: 60px; border: solid; background-color: $colores[$colorquetoca]'><p>$NoCasilla</p></div>";
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>