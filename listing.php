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

$sql = "SELECT * from `form-submissions`";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Form Submissions</title>
  <style>
    body {
      font-family: monospace;
      background-color: #e2fff5;
      padding: 3rem;
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }
    table {
      border-collapse: collapse;
      width: 600px;
      max-width: 100%;
      background: white;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 6px;
      overflow: hidden;
    }
    th, td {
      padding: 12px 15px;
      border: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #04AA6D;
      color: white;
      font-weight: 600;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    .btn-add {
      margin-top: 20px;
      background-color: #04AA6D;
      color: white;
      padding: 10px 25px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      font-family: monospace;
      display: inline-block;
      transition: background-color 0.3s ease;
    }
    .btn-add:hover,
    .btn-add:focus {
      background-color: #037d4a;
      outline: none;
    }
    h3 {
    text-align: center;
    font-size: 30px;
}
  </style>
</head>
<body>
<h3>Form Listings📋</h3>
<?php

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Age</th><th>Gender</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["age"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No results found.</p>";
}

$conn->close();
?>

<a href="index.php" class="btn-add">+ Add New Submission</a>

</body>
</html>
