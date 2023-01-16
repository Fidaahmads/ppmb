<?php
  // Connect to MySQL database
  $host = "localhost";
  $username = "username";
  $password = "password";
  $database = "idbc";
  $conn = mysqli_connect($host, $username, $password, $database);

  // Query database for data
  $query = "SELECT * FROM mitq";
  $result = mysqli_query($conn, $query);

  // Convert data to JSON format
  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  header("Content-Type: application/json");
  echo json_encode($data);
?>