<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$sql = "INSERT INTO `form-submissions` (name, age, gender) VALUES ('$name', '$age', '$gender')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
