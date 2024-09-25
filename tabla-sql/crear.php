<?php

    $servername= "localhost";
    $username= "root";
    $password= "1234";
    $dbname= "entregable_ab";
    
    $conn= new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }


    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $titulo= $_POST['titulo'];
        $idioma= $_POST['idioma'];
        $paginas= $_POST['paginas'];
        $id_autor= $_POST['id_autor'];

        
        $crear_nuevo= "INSERT INTO libro (titulo, idioma, paginas, ID_autor) VALUES ('$titulo', '$idioma', '$paginas', '$id_autor')";

        if ($conn->query($crear_nuevo)=== TRUE){
            echo "Nuevo Libro Creado. ";
        }
    }
?>



<form method="post" action=""><br>
    <strong> 
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
    </strong>
    <br><br>

    <strong> 
        <label for="idioma">Idioma:</label>
        <input type="text" name="idioma" required>
    </strong>
    <br><br>

    <strong> 
        <label for="paginas">Nº Páginas:</label>
        <input type="number" name="paginas" required>
    </strong>
    <br><br>

    <strong> 
        <label for="id_autor">ID Autor:</label>
        <input type="number" name="id_autor" required>
    </strong>
    <br><br>


    <input type="submit" value="Crear">
    <br> <br>

    <a style="size=120%" href="ejer_TABLA.php">VOLVER</a>
</form>

   
