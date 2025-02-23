<?php include __DIR__ . '/../db/connection.php'; ?>

<?php


// Fetch data from the database
$sql = "SELECT * FROM outsource_payments";
$result = $conn->query($sql);
?>

    <div class="outsource">

    <h1>Outsource payment collection</h1>
    <h4>Faster and flexible access to cash flow from one or all your invoices.</h4>

    <div class="outsource_container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<img src='assets/" . $row['icon'] . "' alt='Icon'>";
            echo "<div>";
            echo "<h1>" . htmlspecialchars($row['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No posts available.</p>";
    }

   
    ?>
    </div>

    </div>
