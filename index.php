<?php

$SuccessMessage = false;

if(isset($_POST["name"])){


$server = "localhost";
$user = "root";
$pass = "";

$con = mysqli_connect($server, $user, $pass);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "DB CONNECTED";

$Name = $_POST['name'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];
$Text = $_POST['text'];

$sql = "INSERT INTO `trip`.`trip` ( `Name`, `Email`, `Phone`, `Text`, `Time`) VALUES ( '$Name', '$Email', '$Phone', '$Text', current_timestamp());";

if($con ->query($sql) == true){
    $SuccessMessage = true;
}else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();

// echo $sql;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>
<body>

<div class="bg-white border rounded-lg px-8 py-6 mx-auto my-8 max-w-2xl">
    <h2 class="text-2xl font-medium mb-4">Survey</h2>
    <?php
    if($SuccessMessage == true){
      echo "Successfully inserted data";
    }
    ?>
    <form action="index.php" method="POST">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" id="name" name="name"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>
        
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone no.</label>
            <input type="number" id="phone" name="phone"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
        </div>
        
        
        <div class="mb-4">
            <label for="text" class="block text-gray-700 font-medium mb-2">Message</label>
            <textarea id="text" name="text"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" rows="5"></textarea>
        </div>
        <div>
            <button  class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
        </div>

    </form>
</div>
  
</body>
</html>