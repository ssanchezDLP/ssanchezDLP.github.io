
<?php
    if (isset($_GET['codigo'])){

        $id_libro= $_GET['codigo'];

        $servername= "localhost";
        $username= "root";
        $password= "1234";
        $dbname= "entregable_ab";

        $conn= new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }



        $eliminar= "DELETE FROM libro WHERE ID_libro= $id_libro";




        if ($conn->query($eliminar)=== TRUE) {
            echo "Record deleted successfully";
        }
        
        else{
            echo "Error deleting record: " . $conn->error;
        }
    }

    header("Location: ejer_TABLA.php");
    exit();
?>




