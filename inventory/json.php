<?php
  // File: response.php

  // Get POST gender value
  $id = $_POST["combo_kode"];

  // Connect to the database
  // replace the parameters with your proper credentials
  $connection = mysqli_connect("192.168.20.9", "robby", "plasindo123", "inventory_it");

  // Query to run
  $query = mysqli_query($connection,
           "SELECT * FROM ms_grup WHERE kode_grup = '" .$id. "'");

  // Create empty array to hold query results
  $someArray = [];

  // Loop through query and push results into $someArray;
  while ($row = mysqli_fetch_assoc($query)) {
    array_push($someArray, [
      'kode'   => $row['kode_grup'],
      'nama' => $row['nama_grup']
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($someArray);
  echo $someJSON;
?>


