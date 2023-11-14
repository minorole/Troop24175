<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
        // Handle the error here
        echo "Please complete the form and try again.";
        exit;
    }

    $recipient = "troop24175@gmail.com"; // Replace with your email address
    $subject = "New contact from $name";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    mail($recipient, $subject, $email_content, $email_headers);

    // Redirect to a thank-you page after mailing
    header("index.html");
    exit;
}
?>
