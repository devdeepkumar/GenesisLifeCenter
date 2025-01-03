<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $city = htmlspecialchars(trim($_POST['city']));
    $country = htmlspecialchars(trim($_POST['country']));

    // Recipient email address (change this to your desired email)
    $to = "devdeepkr734@gmail.com"; // Replace with your email address

    // Email subject
    $subject = "New Schedule Request Form Submission";

    // Email body content
    $message = "You have received a new schedule request form submission:\n\n";
    $message .= "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Phone: " . $phone . "\n";
    $message .= "City: " . $city . "\n";
    $message .= "Country: " . $country . "\n";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";
    $headers .= "From: info@babystepsivf.com" . "\r\n"; // Use your domain email

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Show thank you message on success
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
                            background-color: #E6237C;
                            color: white;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            margin: 10px;
                        }

                        .thank-you-container button:hover {
                            opacity: 0.8;
                        }

                        .thank-you-container .exit-btn {
                            background-color: #f44336;
                        }
                    </style>
                </head>
                <body>
                    <div class='thank-you-container'>
                        <h2>Thank You for Scheduling!</h2>
                        <p>We will get back to you as soon as possible.</p>
                        <button onclick='window.location.href=\"index.html\"'>Back to Home</button>
                        <button class='exit-btn' onclick='window.location.href=\"exit.html\"'>Exit</button>
                    </div>

                    <script>
                        // Redirect to the homepage after 5 seconds
                        setTimeout(function() {
                            window.location.href = 'https://genesislifecenter.com'; // Replace with your homepage URL
                        }, 5000);
                    </script>
                </body>
              </html>";
    } else {
        // If the email fails to send, show an error message
        echo "<html><body><h2>Error occurred while sending email. Please try again later.</h2></body></html>";
    }
} else {
    // If form is not submitted using POST
    echo "<html><body><h2>Invalid Request</h2><p>Form submission error occurred.</p></body></html>";
}
?>
