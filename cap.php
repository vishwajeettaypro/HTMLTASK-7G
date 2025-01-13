<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $secretKey = "YOUR_SECRET_KEY"; // Replace with your secret key
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Verify reCAPTCHA response
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {
        // reCAPTCHA validation successful
        echo "Form submitted successfully!";
    } else {
        // reCAPTCHA validation failed
        echo "Please complete the CAPTCHA verification.";
    }
}
?>
