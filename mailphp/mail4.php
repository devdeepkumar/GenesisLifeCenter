<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    // Recipient email address (replace with your desired email)
    $to = "devdeepkr734@gmail.com"; // Replace with your email address

    // Email subject
    $subject = "New Schedule Request from " . $name;

    // Email body content
    $message = "
    <html>
    <head>
        <title>New Schedule Request</title>
    </head>
    <body>
        <h2>New Schedule Request</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email Address:</strong> {$email}</p>
        <p><strong>Phone Number:</strong> {$phone}</p>
    </body>
    </html>
    ";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: info@yourdomain.com" . "\r\n"; // Replace with your domain email address

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // If the email is sent successfully, show a thank you message
        echo "<html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Thank You</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                            margin: 0;
                            background-color: #f0f0f0;
                        }
                        .thank-you-container {
                            background-color: #fff;
                            padding: 40px;
                            border-radius: 8px;
                            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                            text-align: center;
                            width: 100%;
                            max-width: 500px;
                        }
                        .thank-you-container h2 {
                            font-size: 24px;
                            color: #1D90A5;
                            margin-bottom: 20px;
                        }
                        .thank-you-container p {
                            font-size: 18px;
                            margin-bottom: 30px;
                        }
                        .thank-you-container button {
                            padding: 10px 20px;
                            font-size: 16px;
                            background-color: #4CAF50;
                            color: white;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            margin: 10px;
                        }
                        .thank-you-container button:hover {
                            opacity: 0.8;
                        }
                    </style>
                    <script>
                        // Automatic redirection after 10 seconds if no button is clicked
                        setTimeout(function() {
                            window.location.href = 'index.html'; // Change to your desired redirect URL
                        }, 5000);
                </head>
                <body>
                    <div class='thank-you-container'>
                        <h2>Thank You for Your Request!</h2>
                        <p>We will get back to you as soon as possible.</p>
                        <button onclick='window.location.href=\"index.html\"' disabled>Back to Home</button>
                        <button onclick='window.location.href=\"exit.html\"'>Exit</button>
                    </div>
                </body>
              </html>";
    } else {
        // If the email fails to send, show an error message
        echo "<html><body><h2>Error occurred while sending email. Please try again later.</h2></body></html>";
    }
} else {
    // If the form is not submitted using POST
    echo "<html><body><h2>Invalid Request</h2><p>Form submission error occurred.</p></body></html>";
}
?>
