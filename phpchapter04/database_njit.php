<?php
  // Slide 24 (sort of)

  $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=YOURUCID';
  $username = 'YOURUCID';
  $password = 'YOURDBPASSWORD';

  try {
    $db = new PDO($dsn, $username, $password);
    echo '<p>You are connected to the NJIT database!</p>';
  } catch (PDOException $ex) {
    $error_message = $ex->getMessage();
    include("database_error.php");
    exit();
  }

?>