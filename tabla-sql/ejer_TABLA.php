<?php
session_start();

if(!isset($_SESSION['usuario'])){

    echo '
        <script>
        alert("Por favor, inicia sesión primero.");
        window.location= "../login_y_register_FUNCIONANDO/login_o_register.php";
        </script>
    ';
    session_destroy();
    die();
}
?>

<!DOCTYPE html>

<?php 

echo "<br>";
// primero conexión 
    $servername= "localhost";
    $username= "root";
    $password= "1234";
    $dbname= "entregable_ab";
    
    // Create connection
    $conn= new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    }

    // echo "Hola";


// segunda, sentencia de SQL

$query= "select *
        from libro
";


// Tercero, mostrar datos
$result= $conn->query($query);

?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Intermedia_3__CRUD PHP_BBDD</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }
        table td{
            border: 1px solid blue;
            text-align: center;
            padding: 1.3rem;
        }
        .button{
            border-radius: .5rem;
            color: white;
            background-color: green;
            padding: 1rem;
            text-decoration: none;
        }

        .titulo{
            color: blue;
        }

        .button.right{
            float: right;
        }
    </style>
</head>

<body>
    <p><a class="button" href="crear.php">Crear</a></p>
    <p><a class="button right" href="1-n.php">Relacion 1-N</a></p>
    <br>

    <table>
        <tr>
            <th class="titulo">ID Libro</th>
            <th class="titulo">Título</th>
            <th class="titulo">Idioma</th>
            <th class="titulo">Nº Páginas</th>
            <th class="titulo">ID Autor</th>
        </tr>
    

        <?php 

        if ($result->num_rows > 0){
            
            
            while($row = $result->fetch_assoc()){
                echo "<tr>";

                echo "<td>".$row['ID_libro']."</td>";
                echo "<td>".$row['titulo']."</td>";
                echo "<td>".$row['idioma']."</td>";
                echo "<td>".$row['paginas']."</td>";
                echo "<td>".$row['ID_autor']."</td>";
                echo "<td><a class='button' href='modificar.php?codigo={$row['ID_libro']}'>Modificar</a></td>";
                echo "<td><a class='button' href='eliminar.php?codigo={$row['ID_libro']}'>Eliminar</a></td>";
                
                echo "</tr>";
            }
        } 
 
        else {
            echo "0 results";
        }

        $conn->close();
        
        // fin-------------------------------

        ?>

    </table>
        <br>

    <p><a class="button" href="../index.html">Volver</a></p>
    <br>
</body>

</html>