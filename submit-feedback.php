<?php
// Handle feedback submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = htmlspecialchars($_POST['user-name']);
    $user_feedback = htmlspecialchars($_POST['user-feedback']);
    
    // Validate data
    if (!empty($user_name) && !empty($user_feedback)) {
        // Save feedback to a text file (or database)
        $file = 'feedback.txt';
        $feedback_entry = "Name: " . $user_name . "\n";
        $feedback_entry .= "Feedback: " . $user_feedback . "\n";
        $feedback_entry .= "--------------------------------------------\n";
        
        if (file_put_contents($file, $feedback_entry, FILE_APPEND)) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error saving feedback.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
