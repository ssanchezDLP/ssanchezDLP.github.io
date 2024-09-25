<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autores y sus libros</title>
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
    </style>
</head>
<body>
    <h1>Autores y sus libros</h1>


    <?php
    
    $servername= "localhost";
    $username= "root";
    $password= "1234";
    $dbname= "entregable_ab";

    $conn= new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    
    $query= "SELECT a.ID_autor, a.nombre, l.ID_libro, l.titulo
        FROM autor a
        LEFT JOIN libro l ON a.ID_autor = l.ID_autor";

    $result= $conn->query($query);

    ?>
    <table>
        <tr>
            <th class="titulo">ID Autor</th>
            <th class="titulo">Nombre Autor</th>
            <th class="titulo">ID Libro</th>
            <th class="titulo">Título</th>
        </tr>

        <?php
        if ($result->num_rows> 0){
            while ($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['ID_autor']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['ID_libro']."</td>";
                echo "<td>".$row['titulo']."</td>";
                echo "</tr>";
            }
        } 
        
        else{
            echo "0 results";
        }

        $conn->close();
        
        ?>
    </table>
    <br>
    <p><a class="button" href="ejer_TABLA.php">Volver</a></p>
    <br>
</body>
</html>
