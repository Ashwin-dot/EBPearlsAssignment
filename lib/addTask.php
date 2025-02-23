<?php
include './functions.php';
// Call the addTask function to add the new task to the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['task'];

    if (addTask($conn, $title)) {
       
        echo json_encode(['status' => 'success']);
    } else {
             echo json_encode(['status' => 'error']);
    }
}
?>
