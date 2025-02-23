<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body> 

    <?php include './lib/navbar.html';?>
    <?php include './lib/slider.html';?>


    <?php include './components/outsource.php';?>
    <?php include './components/taskManager.php';?>
    <?php include './components/contacts.php';?>
   
    <?php include './lib/footer.html';?> 
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./lib/taskScript.js"></script>
<script src="./contactScript/contactScript.js"></script>
<script src="./script.js"></script>
</html>