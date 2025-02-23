<?php

include __DIR__ . '/../db/connection.php';

// SQL query to select all tasks
function getTasks($conn) {
    $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
    // Execute the query and return the result
    $result = $conn->query($sql);
    return $result;
}


//adding task in database
function addTask($conn, $title) {
    
    $stmt = $conn->prepare("INSERT INTO tasks (title) VALUES (?)");
    $stmt->bind_param("s", $title);
   
    return $stmt->execute();
}

//delete task 
function deleteTask($conn, $id) {

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");

    $stmt->bind_param("i", $id);
  
    return $stmt->execute();
}

//update task
function updateTask($conn, $id, $status = null, $title = null) {
  
    if ($status !== null) {
        
        $stmt = $conn->prepare("UPDATE tasks SET status = ? WHERE id = ?");
      
        $stmt->bind_param("si", $status, $id);
    } 
  
    elseif ($title !== null) {
        
        $stmt = $conn->prepare("UPDATE tasks SET title = ? WHERE id = ?");
    
        $stmt->bind_param("si", $title, $id);
    }
  
    return $stmt->execute();
}
?>
