<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $message = htmlspecialchars(strip_tags($_POST['message']));
    
    // Prepare message content
    $timestamp = date("Y-m-d H:i:s"); // Current date and time
    $formatted_message = "Date: $timestamp\nName: $name\nEmail: $email\nMessage:\n$message\n\n---\n\n";
    
    // File path where messages will be stored
    $file_path = "messages.txt";
    
    // Save the message to the file
    if (file_put_contents($file_path, $formatted_message, FILE_APPEND | LOCK_EX)) {
        echo "Thank you! Your message has been saved.";
    } else {
        echo "Error: Unable to save your message. Please try again later.";
    }
} else {
    echo "Please submit the form.";
}
?>