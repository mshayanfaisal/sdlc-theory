<?php
include 'db.php';

if (!isset($_GET["id"])) {
    die("No ID provided.");
}

$sql = "SELECT * FROM profile WHERE id = " . $_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("No record found.");
}

$row = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CV - <?php echo $row["name"]; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 700px;
            margin: auto;
            border: 2px solid #000;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1><?php echo $row["name"]; ?></h1>
    <div class="section">
        <h3>Personal Information</h3>
        <p><strong>Age:</strong> <?php echo $row["age"]; ?></p>
        <p><strong>Gender:</strong> <?php echo $row["gender"]; ?></p>
    </div>

    <div class="section">
        <h3>Social Links</h3>
        <p><strong>GitHub:</strong> <a href="<?php echo $row["github"]; ?>" target="_blank"><?php echo $row["github"]; ?></a></p>
        <p><strong>LinkedIn:</strong> <a href="<?php echo $row["linkedin"]; ?>" target="_blank"><?php echo $row["linkedin"]; ?></a></p>
    </div>

    <div class="section">
        <h3>About</h3>
        <p><?php echo nl2br($row["about"]); ?></p>
    </div>
</body>
</html>
