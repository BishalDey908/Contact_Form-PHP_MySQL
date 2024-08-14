<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Users</h1>
    <?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "trip";
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   
   $sql = "SELECT sl_no,Name,Email,Phone,Text FROM trip";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
       echo "id: " . $row["sl_no"]." Name- ". $row["Name"]." Email- " . $row["Email"]. " Phone- ". $row["Phone"]. " Text- " . $row["Text"]. "<br>";
     }
   } else {
     echo "0 results";
   }
   $conn->close();
   ?>
</body>
</html>