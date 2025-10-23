<?php
include 'db.php';

if (!isset($_GET['task_id'])) {
    header("Location: index.php?page=list");
    exit;
}

$task_id = $_GET['task_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $comment = $_POST['comment'];
    $conn->query("INSERT INTO task_status (task_id, status, comment) VALUES ('$task_id', '$status', '$comment')");
    header("Location: index.php?page=detail&id=$task_id");
    exit;
}

$task = $conn->query("SELECT * FROM tasks WHERE id=$task_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Status - <?php echo htmlspecialchars($task['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php?page=list">Show Task List</a>
            <a href="index.php?page=add">Add New Task</a>
        </nav>

        <h1>Change Status</h1>

        <div class="form-box">
            <form method="POST" action="">
                <p><strong>Task:</strong> <?php echo htmlspecialchars($task['title']); ?></p>
                <label>Status</label>
                <input type="text" name="status" required>
                <label>Comment</label>
                <input type="text" name="comment" required>
                <button type="submit">Save Status</button>
            </form>
        </div>

        <a href="index.php?page=detail&id=<?php echo $task_id; ?>" class="back-btn">← Back to Task</a>
    </div>
</body>
</html>
