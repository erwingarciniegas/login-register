<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
            alert("por favor debes iniciar sesion");
            window.location = "index.php";
            </script>
        
        ';
        session_destroy();
        die();
        

    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenido-a-ayudas-sena</title>
</head>
<body>
    <h1>bienvenido a mis mundos!</h1>
    <a href="php/cerrar_sesion.php">cerrar sesion</a>
</body>
</html>