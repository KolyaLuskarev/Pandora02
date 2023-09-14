<?php
$user = "username";
$password = "password";
$database = "mysite1";
$table = "bookings";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>";
  foreach($db->query("SELECT name FROM $table") as $row) {
    echo "<li>" . $row['name'] . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}