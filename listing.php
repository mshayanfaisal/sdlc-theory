<?php
include 'db.php';

$sql = "SELECT * FROM profile";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listing Page</title>
</head>
<body>
    <h2>User Listing</h2>
    <a href="form.php">Add New User</a><br><br>

<?php
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>GitHub</th><th>LinkedIn</th><th>About</th><th>CV</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["age"]."</td>";
        echo "<td>".$row["gender"]."</td>";
        echo "<td><a href='".$row["github"]."' target='_blank'>GitHub</a></td>";
        echo "<td><a href='".$row["linkedin"]."' target='_blank'>LinkedIn</a></td>";
        echo "<td>".$row["about"]."</td>";
        echo "<td><a href='cv.php?id=".$row["id"]."'>Generate CV</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
</body>
</html>
