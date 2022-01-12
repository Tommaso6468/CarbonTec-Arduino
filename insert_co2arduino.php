<?php
if(isset($_GET["id"],$_GET["waarde"])) {
   $id = $_GET["id"];
   $waarde = $_GET["waarde"];


   $servername = "localhost";
   $username = "root";
   $password = "your-root-password";
   $dbname = "CarbonTec";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "INSERT INTO apparaat (serienummer,waarde) VALUES ($id,$waarde)";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $conn->error;
   }

    $conn->close();
}
?>
