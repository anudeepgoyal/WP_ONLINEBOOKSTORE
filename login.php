<?php

// Check if the form is submitted

  // Get the form data
  $email = $_POST["email"];
  $pass = $_POST["password"];

  // Hash the password
  // Connect to the database
  $host = "localhost"; // Change this to your database host
  $user = "root"; // Change this to your database username
  $password = ""; // Change this to your database password
  $database = "bookstore"; // Change this to your database name
  $conn = mysqli_connect($host, $user, $password, $database);

  // Check if the connection is successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare and execute the SQL query to insert the data
  $sql = "INSERT INTO userdetails ( email, pass) VALUES ( '$email', '$pass')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('New record created successfully!')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
?>
