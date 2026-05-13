<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tienda de articulos de GYM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="formulario.css">
</head>

<body>

    <div class="container">
        <div class="row encabezado">
            <div class="col-sm-4 align-self-center logo">
                <img src="logo tienda.png" alt="loga tienda">
            </div>
            <div class="col-sm-8">
                <div class="titulo">
                    <h1>Tienda de articulos de GYM</h1>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="listar-productos.php">Lista de productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="carrito-compras.php">Carrito de compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="formulario.php">Formulario cliente</a>
                </li>
            </ul>
        </div>
        <div class="row cuerpo">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
<h1>Por Favor cuando termine de comprar llene el formulario de la siguiente pagina</h1>
                <h3>Carrito de compras</h3>

                <hr>
                <p><b>Productos selecsionados en el carrito de compras:</b></p>
                <?php
                session_start();
                for($i=0; $i<sizeof($_SESSION['productos']); $i++) { 
                    echo "<p class='prod_carrito'>";
                    echo $_SESSION['productos'][$i];
                    echo "</p>";
                } 
                
?>
            
            <form method="POST">

<button type="submit" name="clear"> Vaciar carrito</button>
</form>

            <div class="col-md-3"></div>
        </div>
            </div>
        </div>
    </div>
</body>

</html>