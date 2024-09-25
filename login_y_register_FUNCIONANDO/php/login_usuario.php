<?php
    session_start();

    include 'conexion.php';

    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];


    $validar_login= mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo' 
    and contrasena='$contrasena'"); 


    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario']= $correo;
        header("location: ../../tabla-sql/ejer_TABLA.php");
        exit;
    }

    
    else{
        echo '
            <script>
                alert("Usuario y/o contraseña no existe. Por favor, revise los datos e inténtalo de nuevo.");
                window.location= "../login_o_register.php";
            </script>
        ';
        exit;
    }

?>