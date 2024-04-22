<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingrese el Nombre de los Jugadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url(./images/fond.jpg);
            background-size: cover;
            color: white;
            margin-top: 10%;
        }
    </style>
</head>

<body>
    <div class="container text-center col-3">
        <h1>Ingrese el Nombre De Los Jugadores</h1>
        <form action="serpiente.php" method="POST">
            <div class="mb-3">
                <label for="jugador1" class="form-label">Jugador 1:</label>
                <input type="text" class="form-control" id="jugador1" name="jugador1" required>
            </div>
            <div class="mb-3">
                <label for="jugador2" class="form-label">Jugador 2:</label>
                <input type="text" class="form-control" id="jugador2" name="jugador2" required>
            </div>
            <div class="mb-3">
                <label for="jugador3" class="form-label">Jugador 3:</label>
                <input type="text" class="form-control" id="jugador3" name="jugador3" required>
            </div>
            <button type="submit" class="btn btn-primary">LET'S GO</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
