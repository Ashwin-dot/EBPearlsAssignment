
$(document).ready(function() {
    
    $('#addTaskForm').on('submit', function(e) {
        e.preventDefault(); 

        // Send an AJAX POST request to add_task.php
        $.ajax({
            url: './lib/addTask.php', 
            method: 'POST', 
            data: $(this).serialize(), 
            success: function(response) { 
                let res = JSON.parse(response); 
                if (res.status == 'success') {
                    location.reload();
                } else {
                    alert('Failed to add task'); 
                }
            }
        });
    });
});

// Function to delete a task
function deleteTask(id) {
    $.ajax({
        url: './lib/deleteTask.php', 
        method: 'POST', 
        data: { id: id }, 
        success: function(response) { 
            let res = JSON.parse(response); 
            if (res.status == 'success') {
                location.reload(); 
            } else {
                alert('Failed to delete task'); 
            }
        }
    });
}


function updateTask(id, status) {
   
    $.ajax({
        url: './lib/updateTask.php', 
        method: 'POST', 
        data: { id: id, status: status }, 
        success: function(response) { 
            let res = JSON.parse(response); 
            if (res.status == 'success') {
               
                if (status == 'completed') {
                    $('#task-' + id + ' .task-title').css('text-decoration', 'line-through');
                } else {
                    $('#task-' + id + ' .task-title').css('text-decoration', 'none');
                }
            } else {
                alert('Failed to update task'); 
            }
        }
    });
}
