<?php

    include 'conexion.php';

    $nombre_completo=$_POST['nombre_completo'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];

    $query= "INSERT INTO usuario(nombre_completo, correo, usuario, contrasena)
            VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    $ejecutar= mysqli_query($conexion, $query);


    
    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location= "../login_o_register.php";
            </script>  
        ';
    }

    else{
        echo '
            <script>
                alert("Inténtalo de nuevo");
                window.location= "../login_o_register.php";
            </script>  
        ';
    }


?>