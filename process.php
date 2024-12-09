<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define the file to store entries
    $file = 'submissions.json';

    // Sanitize input data
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);

    // Prepare the entry as an associative array
    $entry = [
        'fullName' => $fullName,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'timestamp' => date('Y-m-d H:i:s'),
    ];

    // Read existing entries from the file
    $entries = [];
    if (file_exists($file)) {
        $jsonContent = file_get_contents($file);
        $entries = json_decode($jsonContent, true) ?? [];
    }

    // Add the new entry to the array
    $entries[] = $entry;

    // Save all entries back to the file
    file_put_contents($file, json_encode($entries, JSON_PRETTY_PRINT));

    // Display the data in a styled format
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Submission Success</title>";
    echo "<link rel='stylesheet' href='style.css'>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";
    echo "<h1>Submission Successful</h1>";
    echo "<p><strong>Full Name:</strong> $fullName</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone Number:</strong> $phone</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<a href='view_submissions.php'>View All Submissions</a>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
} else {
    echo "Invalid request method.";
}
?>
