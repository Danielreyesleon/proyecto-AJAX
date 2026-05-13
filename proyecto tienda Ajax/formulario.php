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
    </h2>
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
                </li>
                
            </ul>
        </div>
        <?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "ajax";

$enlace = mysqli_connect ($servidor, $usuario , $clave, $baseDeDatos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Formulario</title>
</head>
<h1>Por favor rellene estos datos de Cliente</h1>
<body>
    <header>Registrar Cliente</header>
    <form method="POST" name="registrar" >

    <ul>
<p>Nombre</p>
<input type="text" name="Nombre" placeholder="Nombre">
</ul>
<ul>
<p>Apellido</p>
<input type="text" name="Apellido" placeholder="Apellido">
</ul>
<ul>
<p>Telefono</p>
<input type="text" name="Telefono" placeholder="Telefono">
</ul>
<ul>
<p>Correo</p>
<input type="email" name="Correo" placeholder="Correo">
</ul>
<button type="submit" name="registrar"> Registrar</button>
    </form>
<h1>Gracias por llenar el Formulario de cliente</h1>

</body>



<?php

if(isset($_POST['registrar'])){

$nombre = $_POST ['Nombre'];
$apellido = $_POST ['Apellido'];
$telefono = $_POST ['Telefono'];
$correo = $_POST ['Correo'];


$insertarcliente = "INSERT INTO cliente VALUE('','$nombre','$apellido', '$telefono', '$correo')";


$ejecutarInsertar = mysqli_query($enlace, $insertarcliente);
}
if($enlace->connect_error != null){
echo"Ocurrio un error porfavor llame al 33334444 para recivir ayuda";
error_log("ocurrio un error a la hora de conectar con bd. {$enlace->connect_error}");
}
?>

        </html>