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
                <img src="logo tienda.png" alt="logo tienda">
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
                    <a class="nav-link active" aria-current="page" href="listar-productos.php">Lista de productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="carrito-compras.php">Carrito de compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="formulario.php">Formulario cliente</a>
                </li>
            </ul>
        </div>
        <div class="row cuerpo">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <h3 class="text-center">Listado de productos disponibles</h3>
            <hr>
            <ul>
                <li><img src="Banco.jpg" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong> 2222</li>
                <li><strong>Nombre del producto:</strong>Banco</li>
                <li><strong>Detalle:</strong>banco de ultima generacion para comodidad y eficiencia a la hora de entrenar</li>
                <li>Precio: $250</li>
            </ul>
                <button class="btn btn-primary" id="btn1">Agregar al carrito</button>
                <div class="msj" id="msj1"></div>   
                <hr>
            <ul>
                <li><img src="Bicicleta Estatica.webp" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong> 4444</li>
                <li><strong>Nombre del producto:</strong> Bicicleta Estatica</li>
                <li><strong>Detalle:</strong> Bicicleta Estatica de ultimo modelo con contador de calorias incluido</li>
                <li>Precio: $2500</li>
            </ul>
                <button class="btn btn-primary" id="btn2">Agregar al carrito</button>
                <div class="msj" id="msj2"></div>
                <hr>
            <ul>
                <li><img src="Bicicleta.webp" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong>8888</li>
                <li><strong>Nombre del producto:</strong>Bicicleta </li>
                <li><strong>Detalle:</strong>Bicicleta comoda y con cambio de llantas incluido con la compra</li>
                <li>Precio: $4500</li>
            </ul>
                <button class="btn btn-primary" id="btn3">Agregar al carrito</button>
                <div class="msj" id="msj3"></div>   
                <hr>
            <ul>
                <li><img src="Body Glove.jpg" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong> 1616</li>
                <li><strong>Nombre del producto:</strong> Body Glove botella</li>
                <li><strong>Detalle:</strong>La mejor botella para llevar al gym tieme gran capacidad de carga la que la hace ideal para entrenamientos largos</li>
                <li>Precio: $125</li>
            </ul>
                <button class="btn btn-primary" id="btn4">Agregar al carrito</button>
                <div class="msj" id="msj4"></div>
                <hr>
            <ul>
                <li><img src="Caminadora.jpg" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong> 1111</li>
                <li><strong>Nombre del producto:</strong>Caminadora</li>
                <li><strong>Detalle:</strong>Caminadora de alca calidad con velocidad y inclinacion adaptable</li>
                <li>Precio: $2300</li>
            </ul>
                <button class="btn btn-primary" id="btn5">Agregar al carrito</button>
                <div class="msj" id="msj5"></div>   
                <hr>
            <ul>
                <li><img src="Mancuernas Ajustables.png" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong> 5000</li>
                <li><strong>Nombre del producto:</strong> Mancuernas Ajustables</li>
                <li><strong>Detalle:</strong> Mancuernas ajustablies con selector de peso por imanes</li>
                <li>Precio: $400</li>
            </ul>
                <button class="btn btn-primary" id="btn6">Agregar al carrito</button>
                <div class="msj" id="msj6"></div>
                <hr>
            <ul>
                <li><img src="Mancuernas.jpeg" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong> 5018</li>
                <li><strong>Nombre del producto:</strong>Mancuernas</li>
                <li><strong>Detalle:</strong>Mancuernas de alta calidad y alto rendimienta</li>
                <li>Precio: $500</li>
            </ul>
                <button class="btn btn-primary" id="btn7">Agregar al carrito</button>
                <div class="msj" id="msj7"></div>   
                <hr>
            <ul>
                <li><img src="Maquina Gimnasio en Casa 3 en 1.jpg" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong> 3030</li>
                <li><strong>Nombre del producto:</strong> Maquina gimnasio en casa 3 en 1</li>
                <li><strong>Detalle:</strong>una maquina para entrena en desde la comodidad de su casa</li>
                <li>Precio: $4930</li>
            </ul>
                <button class="btn btn-primary" id="btn8">Agregar al carrito</button>
                <div class="msj" id="msj8"></div>
                <hr>
            <ul>
                <li><img src="Mesa para Ping Pong.jpg" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong>2010</li>
                <li><strong>Nombre del producto:</strong>Mesa para ping pong</li>
                <li><strong>Detalle:</strong> Mesa para ping pong cuenta con cuatro raquetas y 2 paquetes de bolas</li>
                <li>Precio: $1999</li>
            </ul>
                <button class="btn btn-primary" id="btn9">Agregar al carrito</button>
                <div class="msj" id="msj9"></div>   
                <hr>
            <ul>
                <li><img src="Set de Discos.jpg" style="display: block; border: 0; margin: 0 auto;"></li>
                <li><strong>Código del producto:</strong>2027</li>
                <li><strong>Nombre del producto:</strong> Set de Discos </li>
                <li><strong>Detalle:</strong>Set de Discos para en oferta por esta mes </li>
                <li>Precio: $4000</li>
            </ul>
                <button class="btn btn-primary" id="btn10">Agregar al carrito</button>
                <div class="msj" id="msj10"></div>
                <hr>
                <a href="carrito-compras.php" class="btn btn-success p-3">Finalizar compra</a>
                
            </div>
            <div class="col-md-3"></div>
        </div>
        
</body>
    <script>

    window.onload = function(){

        document.getElementById("btn1").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj1").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj1").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Banco"));
            conexion.send();
        }

        document.getElementById("btn2").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj2").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj2").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Bicicleta Estatica"));
            conexion.send();
        }

        document.getElementById("btn3").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj3").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj3").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Bicicleta"));
            conexion.send();
        }

        document.getElementById("btn4").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj4").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj4").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Body Glove"));
            conexion.send();
        }

        document.getElementById("btn5").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj5").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj5").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Caminadora"));
            conexion.send();
        }

        document.getElementById("btn6").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj6").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj6").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Mancuernas Ajustables"));
            conexion.send();
        }

        document.getElementById("btn7").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj7").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj7").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Mancuernas"));
            conexion.send();
        }

        document.getElementById("btn8").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj8").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj8").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Maquina Gimnasio en Casa 3 en 1"));
            conexion.send();
        }

        document.getElementById("btn9").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj9").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj9").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Mesa para Ping Pong"));
            conexion.send();
        }

        document.getElementById("btn10").onclick = function(){               
            let conexion = new XMLHttpRequest();
            conexion.onload = function(){
                document.getElementById("msj10").innerHTML = conexion.responseText;
                setTimeout(function() {
                document.getElementById("msj10").innerHTML = "";
                }, 3000);
            }
            conexion.open("GET", "sesion.php?producto=" + encodeURIComponent("Set de Discos"));
            conexion.send();
        }


    }
    </script>
</html>