<?php 
    include("connectDatabase.php");

    $result = mysqli_query($conn,"SELECT * FROM room WHERE roomID=(SELECT max(roomID) FROM room)");  
    $data = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    echo json_encode( $data )   
?>