<?php
    $servername = "localhost";
    $name = "root";
    $pass = "";
    $database = "doodleroom";
    
    // Create connection
    $conn = mysqli_connect ($servername, $name, $pass, $database);
    
    // Check connection
    if (!$conn) {
        die ("Connection failed: " . mysqli_connect_error());
    }
?>