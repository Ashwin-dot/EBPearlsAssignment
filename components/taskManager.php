<?php
include 'lib/functions.php';
$tasks = getTasks($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="task-main-container">
    <div class="task-text">
        <h1>Task Manager</h1>
        <h4>Your daily to-do list</h4>
    </div>
    <div class="task-container">
        <ul class="task-list" id="taskList">
            <?php if ($tasks->num_rows > 0): ?>
                <?php while($task = $tasks->fetch_assoc()): ?>
                    <li class="task-item" id="task-<?php echo $task['id']; ?>">
                        <input type="checkbox" class="task-checkbox" 
                               id="checkbox-<?php echo $task['id']; ?>" 
                               <?php echo $task['status'] == 'completed' ? 'checked' : ''; ?> 
                               onclick="updateTask(<?php echo $task['id']; ?>, this.checked ? 'completed' : 'pending')">
                        <span class="task-title" >
                            <?php echo htmlspecialchars($task['title']); ?>
                        </span>
                        <div class="task-actions">
                            <button class="delete-btn" onclick="deleteTask(<?php echo $task['id']; ?>)">Delete</button>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No tasks available.</p>
            <?php endif; ?>
        </ul>
        <form id="addTaskForm" class="task-form">
            <input type="text" class="task-input" placeholder="New Task" name="task" required>
            <button class="task-button" type="submit">Add Task</button>
        </form>
    </div>
</div>
<script src="path/to/your/script.js"></script> <!-- Add the path to your script -->
</body>
</html>
