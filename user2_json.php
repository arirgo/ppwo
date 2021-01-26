<?php
  // File: response.php

  // Get POST gender value
  $section = $_POST["section"];

  // Connect to the database
  // replace the parameters with your proper credentials
  $connection = mysqli_connect("192.168.20.9", "robby", "plasindo123", "ppwo_it");

  // Query to run
  $query = mysqli_query($connection,
           "SELECT * FROM section WHERE nama_section = '" . $section . "'");

  // Create empty array to hold query results
  $someArray = [];

  // Loop through query and push results into $someArray;
  while ($row = mysqli_fetch_assoc($query)) {
    array_push($someArray, [
      'singkatan'   => $row['singkatan']
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($someArray);
  echo $someJSON;
?>

