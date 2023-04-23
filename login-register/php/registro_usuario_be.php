<?php

include 'conexion_be.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
//encriptar de contraseña
$contrasena = hash('sha512',$contrasena);

$query = "INSERT INTO usuarios(nombre, correo, usuario, contrasena)
          VALUES('$nombre','$correo','$usuario','$contrasena')";


// verificar que el correo nose repita en la base de datos

$verificar_correo =  mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

if(mysqli_num_rows($verificar_correo) > 0 ) {

    echo '
    
    <script>
        alert("este correo ya esta registrado, intenta con otro diferente");
        window.location = "../index.php";
    </script>

    ';     
    exit();
}


// verificar que el nombre de usuario nose repita en la base de datos

$verificar_usuario =  mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

if(mysqli_num_rows($verificar_usuario) > 0 ) {

    echo '
    
    <script>
        alert("este usuario ya esta registrado, intenta con otro diferente");
        window.location = "../index.php";
    </script>

    ';     
    exit();
}
    


$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){

      echo '
      
      <script>
          alert("usuario almacenado exitosamente");
          window.location = "../index.php";
      </script>

      ';     
}else{
    echo '
      
      <script>
          alert("Intentalo de nuevo, usuario no almacenado");
          window.lcation = "../index.php";
      </script>

      ';
}

mysqli_close($conexion);

?>
