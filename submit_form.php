<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = htmlspecialchars(trim($_POST['author']));
    $email = htmlspecialchars(trim($_POST['email'])); // Corrected field name for email
    $story = htmlspecialchars(trim($_POST['story']));
    
    // Define recipient email
    $to = "csteamimperials@gmail.com";
    
    // Email subject
    $subject = "New Story Submission from $name";
    
    // Email body
    $message = "
    <html>
    <head>
        <title>New Story Submission</title>
    </head>
    <body>
        <h2>You received a new story submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Story:</strong></p>
        <p>$story</p>
    </body>
    </html>
    ";
    
    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you, your story has been submitted successfully!";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
