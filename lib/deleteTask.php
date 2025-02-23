<?php
include './functions.php';

// Call the deleteTask function to delete the task from the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    if (deleteTask($conn, $id)) {
    
        echo json_encode(['status' => 'success']);
    } else {
  
        echo json_encode(['status' => 'error']);
    }
}
?>
