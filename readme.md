## Task 1
### Steps for making home page with HTML, CSS, JS, PHP

**Step 1: Folder Structure**  
**Step 2: Download PHP, MySQL, VS Code**  
**Step 3: Setup MySQL and PHP**  
- Download PHP and setup manually or download XAMPP for easy access.  
- Download MySQL for database connection (for more interaction with GUI, download dbGate too).  
- Add PHP extension in VS Code.  

**Step 4: Create `index.php` and connect a database**  
- Remember: In `php.ini`  
  - Change `extension_dir = "C:\Program Files\php\ext"`  
  - Remove semicolon `;` from `extension=mysqli`  

**Step 5: Create `lib` folder and `navbar.html`**  
- Write code to add navbar.  

**Step 6: Create Image Slider**  
- Add `script.js` and code to add an image slider.  

**Step 7: Create Footer in `lib` folder**  
- Add footer in `index.php`.  

**Step 8: Create a database and add tables and values**  

**Step 9: Create Outsource Section and Fetch Data from Database using `fetch_assoc`**  
```php
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "db";
```
- Change the password and database name accordingly.  

---
## Task 2
### Task Manager

**Step 1: Create `taskManager.php` and include it in `index.php`**  
**Step 2: Add Schema in a Database**  
**Step 3: Create `addTask`, `deleteTask`, `editTask`**  
- Implement the database code to add, delete a task, and update a task for completed and pending status.  

**Step 4: Add Event Handler to Handle Events and Interact Dynamically**  
**Step 5: Add jQuery and AJAX for Better POST and GET Requests**  

---
## Task 3
### Contact Form

**Step 1: Create `contactForm.php` and include it in `index.php`**  
**Step 2: Add Tables in Database**  
**Step 3: Add Composer in the Project and Include SMTP for Better Mail Handling**  
**Step 4: Send Email Notification using PHPMailer**  
**Step 5: Add Event Listener to Interact Dynamically**
