<?php

include './functions.php';

// update th task
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    
    $status = isset($_POST['status']) ? $_POST['status'] : null;
    
    $title = isset($_POST['title']) ? $_POST['title'] : null;

    if (updateTask($conn, $id, $status, $title)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
