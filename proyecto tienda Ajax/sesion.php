<?php

    session_start();

    if (isset($_SESSION['productos'])) {
        array_push($_SESSION['productos'],$_GET['producto']);
    } else {
        $_SESSION['productos'] = array();
        array_push($_SESSION['productos'],$_GET['producto']);
    }
    echo "<p class='text-center'>Se agregó '{$_GET['producto']}' al carrito de compras.</p><br>";