<?php 
include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Task Manager</h1>
    <form action="add_task.php" method="post">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Task Description"></textarea>
        <input type="date" name="due_date" required>
        <button type="submit">Add Task</button>
    </form>

    <h2>Tasks</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM tasks");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
            echo "<td>" . htmlspecialchars($row['due_date']) . "</td>";
            echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <footer>
        <p>&copy; 2023 Task Manager</p>
    </footer>
</body>
</html>
<?php
$conn->close();
// End of index.php
// This file serves as the main entry point for the Task Manager application.
// It includes the database connection, displays a form to add tasks, and lists existing tasks.
// The tasks can be deleted using the delete.php script.
// The HTML structure includes a header, a form for adding tasks, and a table to display the tasks.
// The footer contains a copyright notice.
// The PHP code fetches tasks from the database and displays them in a table format.
// The code uses prepared statements to prevent SQL injection when adding tasks.
// The script also includes basic error handling for database connections.
// The tasks are displayed with their title, description, due date, and a delete link.
// The delete link points to delete.php, which handles the deletion of tasks from the database.
// The script uses basic HTML and CSS for styling, which can be customized further.
// The application is designed to be simple and easy to use, allowing users to manage their tasks effectively.
// The code is structured to be modular, with separate files for database connection, task addition, and deletion.
// The application can be extended with additional features such as task editing, user authentication, and more.
// The code is ready to be deployed on a web server with PHP and MySQL support.
// The application can be tested locally using tools like XAMPP or MAMP.