<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $github = $_POST['github'];
    $linkedin = $_POST['linkedin'];
    $about = $_POST['about'];

    $sql = "INSERT INTO profile (name, age, gender, github, linkedin, about)
            VALUES ('$name', '$age', '$gender', '$github', '$linkedin', '$about')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.<br>";
        echo "<a href='listing.php'>Go to Listing Page</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enter Details</title>
</head>
<body>
    <h2>Enter Your Details</h2>
    <form method="POST" action="">
        Name: <input type="text" name="name" required><br><br>
        Age: <input type="number" name="age" required><br><br>
        Gender:
        <select name="gender" required>
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select><br><br>
        GitHub Profile Link: <input type="url" name="github" required><br><br>
        LinkedIn Profile Link: <input type="url" name="linkedin" required><br><br>
        About:<br>
        <textarea name="about" rows="5" cols="40" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
