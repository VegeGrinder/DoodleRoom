<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "nthnth123";
$dbname = "doodleroom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $sql = "INSERT INTO record (firstname, lastname, gender, message)
// VALUES ('$fname ', ' $lname', '$gender','$message')";

// if ($conn->query($sql) === TRUE) {
 
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$sql = "SELECT sender, email, type, message FROM contact";
$result = $conn->query($sql);
echo "<table border='1'>
<tr>
<th>Sender's Name</th>
<th>Email</th>
<th>Message Type</th>
<th>Message</th>
</tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "<tr>";
echo "<td>" . $row['sender'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['message'] . "</td>";
echo "</tr>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>
</body>
</html>