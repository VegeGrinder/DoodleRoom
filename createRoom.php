<?php 
    include("connectDatabase.php");
    session_start();

    if(isset($_POST["roomName"])){
        $roomName=$_POST["roomName"];
        $password=$_POST["password"];

        $_SESSION['password'] = $password;

        $query="insert into room(password,roomName) values ('$password','$roomName')";
        $result=mysqli_query($conn, $query);

        $query2="SELECT * FROM room WHERE roomID = (SELECT MAX(roomID) FROM room)";
        $result3=mysqli_query($conn, $query2);
        while($row = mysqli_fetch_array($result3)){
            $id = $row['roomID'];
        }

        // $id="00".mysqli_insert_id($conn);
        $_SESSION['roomID'] = $id;

        $url="http://localhost/prototype/board.php?roomID=".$id;

        $query1="UPDATE room SET linkURL= '$url' WHERE roomID='$id'";
        $result1=mysqli_query($conn, $query1);

        $result2 = mysqli_query($conn,"SELECT * FROM room WHERE roomID='$id'");  
    $data = array();
    while($row = mysqli_fetch_assoc($result2))
    {
        $data[] = $row;
    }
    echo json_encode( $data ) ;  

        // if($result){
        //     echo "success";
        // }
        // else{
        //     echo "fail";
        // }
    }
?>

