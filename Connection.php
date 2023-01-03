<!-- <?php
      function OpenCon()
      {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "scholarship";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

        return $conn;
      }

      function CloseCon($conn)
      {
        $conn->close();
      }

      ?> -->


<!-- <?php
      $servername = "localhost";
      $username = "root";
      $password = "";

      // Create connection
      $conn = new mysqli($servername, $username, $password);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
      ?> -->


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scholarship";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>