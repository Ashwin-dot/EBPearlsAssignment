// When the document is fully loaded and ready
$(document).ready(function() {
    // Attach a submit event handler to the form with ID 'addTaskForm'
    $('#addTaskForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission behavior

        // Send an AJAX POST request to add_task.php
        $.ajax({
            url: './lib/addTask.php', // URL of the PHP file to handle the request
            method: 'POST', // HTTP method for the request
            data: $(this).serialize(), // Serialize the form data
            success: function(response) { // Callback function to handle success
                let res = JSON.parse(response); // Parse the JSON response
                if (res.status == 'success') {
                    location.reload(); // Reload the page if the task was added successfully
                } else {
                    alert('Failed to add task'); // Show an error message if the task addition failed
                }
            }
        });
    });
});

// Function to delete a task
function deleteTask(id) {
    // Send an AJAX POST request to delete_task.php
    $.ajax({
        url: './lib/deleteTask.php', // URL of the PHP file to handle the request
        method: 'POST', // HTTP method for the request
        data: { id: id }, // Data to be sent to the server (task ID)
        success: function(response) { // Callback function to handle success
            let res = JSON.parse(response); // Parse the JSON response
            if (res.status == 'success') {
                location.reload(); // Reload the page if the task was deleted successfully
            } else {
                alert('Failed to delete task'); // Show an error message if the task deletion failed
            }
        }
    });
}

// Function to update a task's status (based on checkbox state)
function updateTask(id, status) {
    // Send an AJAX POST request to update_task.php
    $.ajax({
        url: './lib/updateTask.php', // URL of the PHP file to handle the request
        method: 'POST', // HTTP method for the request
        data: { id: id, status: status }, // Data to be sent to the server (task ID and new status)
        success: function(response) { // Callback function to handle success
            let res = JSON.parse(response); // Parse the JSON response
            if (res.status == 'success') {
                // You can add any additional updates or styling here if necessary
                if (status == 'completed') {
                    $('#task-' + id + ' .task-title').css('text-decoration', 'line-through');
                } else {
                    $('#task-' + id + ' .task-title').css('text-decoration', 'none');
                }
            } else {
                alert('Failed to update task'); // Show an error message if the task update failed
            }
        }
    });
}
