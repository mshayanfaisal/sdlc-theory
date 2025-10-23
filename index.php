<?php
include 'db.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'list';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $conn->query("INSERT INTO tasks (title, description, due_date) VALUES ('$title', '$description', '$due_date')");
    header("Location: ?page=list");
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM tasks WHERE id=$id");
    header("Location: ?page=list");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Project Management App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="?page=list" class="<?php if($page=='list') echo 'active'; ?>">Show Task List</a>
            <a href="?page=add" class="<?php if($page=='add') echo 'active'; ?>">Add New Task</a>
        </nav>

        <?php if ($page == 'add') { ?>
            <h1>Add New Task</h1>
            <div class="form-box">
            <form method="POST" action="">
                <input type="hidden" name="add_task" value="1">
                <label>Title</label>
                <input type="text" name="title" required>
                <label>Description</label>
                <input type="text" name="description" required>
                <label>Due Date</label>
                <input type="date" name="due_date" required>
                <button type="submit">Add Task</button>
            </form>
            </div>

        <?php } elseif ($page == 'detail' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $task = $conn->query("SELECT * FROM tasks WHERE id=$id")->fetch_assoc();
            $statuses = $conn->query("SELECT * FROM task_status WHERE task_id=$id ORDER BY id DESC");
        ?>
            <h1>Task Detail</h1>
            <div class="detail-box">
                <p><strong>Title:</strong> <?php echo $task['title']; ?></p>
                <p><strong>Description:</strong> <?php echo $task['description']; ?></p>
                <p><strong>Due Date:</strong> <?php echo $task['due_date']; ?></p>
            </div>

            <h2>Status History</h2>
            <table>
                <tr>
                    <th>Status</th>
                    <th>Comment</th>
                </tr>
                <?php while($row = $statuses->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['status']."</td>
                            <td>".$row['comment']."</td>
                          </tr>";
                } ?>
            </table>
            <a href="?page=list" class="back-btn">← Back</a>

        <?php } else { ?>
            <h1>Task List</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['title']."</td>
                            <td>".$row['description']."</td>
                            <td>".$row['due_date']."</td>
                            <td>
                                <a href='?page=detail&id=".$row['id']."' class='btn detail'>Show Detail</a>
                                <a href='?delete=".$row['id']."' class='btn delete' onclick='return confirm(\"Delete this task?\")'>Delete</a>
                                <a href='status.php?task_id=".$row['id']."' class='btn status'>Change Status</a>
                            </td>
                          </tr>";
                }
                ?>
            </table>
        <?php } ?>
    </div>
</body>
</html>
