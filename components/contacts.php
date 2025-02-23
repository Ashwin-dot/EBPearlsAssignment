<?php
//Cotact Form
$response = ["success" => false, "message" => ""];
include __DIR__ . '/../db/connection.php';
require __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);
    $honeypot = $_POST['honeypot'];

    // Check if honeypot is filled 
    if (!empty($honeypot)) {
        $response['message'] = "Spam detected!";
        error_log("Spam detected in honeypot field.");
    } elseif (empty($name) || empty($email) || empty($phone) || empty($message)) {
        $response['message'] = "All fields are required!";
        error_log("One or more fields are empty.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = "Invalid email format!";
        error_log("Invalid email format: " . $email);
    } elseif (!preg_match("/^\d{10}$/", $phone)) {
        $response['message'] = "Invalid phone number! Enter a 10-digit number.";
        error_log("Invalid phone number: " . $phone);
    } else {
        //saving in database
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);

        // Send Email Notification using PHPMailer
        if ($stmt->execute()) {
            $mail = new PHPMailer(true);
            try {
                
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; 
                $mail->SMTPAuth = true;
                $mail->Username = 'khatiwadaashwin5@gmail.com'; 
                $mail->Password = 'npkv xwxs kecf huxj'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

              
                $mail->setFrom($email, $name);
                $mail->addAddress('khatiwadaashwin5@gmail.com'); 

          
                $mail->isHTML(true);
                $mail->Subject = 'New Contact Form Submission';
                $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phone<br>Message:<br>$message";

                $mail->send();
                $response['success'] = true;
                $response['message'] = "✅ Your message has been sent successfully!";
            } catch (Exception $e) {
                $response['message'] = "❌ Failed to send email. Mailer Error: {$mail->ErrorInfo}";
                error_log("Mailer error: " . $mail->ErrorInfo);
            }
        } else {
            $response['message'] = "❌ Error saving data. Try again.";
            error_log("Error saving data to database.");
        }
        $stmt->close();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

</head>
<body>

<div class="contact-container">
    <div class="contact-text">
    <h1>Contact Us</h1>
    <h4>Speak with our team to see how we can help your business.</h4>

    </div>

    <?php if ($response['success']): ?>
        <p class="success"><?php echo $response['message']; ?></p>
    <?php elseif ($response['message']): ?>
        <p class="error"><?php echo $response['message']; ?></p>
    <?php endif; ?>

    <form id="contactForm" method="POST">
        <input type="text" id="name" name="name" placeholder="Your Name" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="text" id="phone" name="phone" placeholder="Your Best Contact Number" required>
        <textarea id="message" name="message" placeholder="Business or Company Name" style="padding: 70px" required></textarea>

      
        <input type="text" id="honeypot" name="honeypot" style="display: none;">

        <button type="submit">submit</button>
    </form>
</div>

</body>
</html>
