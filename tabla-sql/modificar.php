
<?php
    if ($_SERVER["REQUEST_METHOD"]== "POST"){

        $id_libro= $_POST["id_libro"];
        $titulo= $_POST["titulo"];
        $idioma= $_POST["idioma"];
        $paginas= $_POST["paginas"];


        $servername= "localhost";
        $username= "root";
        $password= "1234";
        $dbname= "entregable_ab";
        $conn= new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }


        $modificar= "UPDATE libro SET titulo= '$titulo', idioma= '$idioma', paginas= '$paginas' WHERE ID_libro= $id_libro";

        if ($conn->query($modificar)=== TRUE){
            echo "Actualizado Correctamente";
        }
    }
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>
    <strong> 
        <label style="font" for="id_libro">ID Libro: </label>
        <input type="number" id="id_libro" name="id_libro" required>
        <br><br>
    </strong> 


    <strong> 
        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" required>
        <br><br>
    </strong> 


    <strong> 
        <label for="idioma">Idioma:</label>
        <input type="text" id="idioma" name="idioma" required>
        <br><br>
    </strong> 


    <strong> 
        <label for="paginas">Paginas:</label>
        <input type="number" id="paginas" name="paginas" required>
        <br><br>
    </strong>

    <button type="submit">Modificar</button>
    <br><br><br>

    <a style="size=120%" href="ejer_TABLA.php">VOLVER</a>
</form>

