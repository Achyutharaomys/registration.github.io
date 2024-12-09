<?php
// Define the file containing entries
$file = 'submissions.json';

// Read and decode entries
$entries = [];
if (file_exists($file)) {
    $jsonContent = file_get_contents($file);
    $entries = json_decode($jsonContent, true) ?? [];
}

// Display all submissions
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>All Submissions</title>";
echo "<link rel='stylesheet' href='style.css'>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h1>All Submissions</h1>";

if (!empty($entries)) {
    foreach ($entries as $entry) {
        echo "<div class='submission'>";
        echo "<p><strong>Full Name:</strong> {$entry['fullName']}</p>";
        echo "<p><strong>Email:</strong> {$entry['email']}</p>";
        echo "<p><strong>Phone Number:</strong> {$entry['phone']}</p>";
        echo "<p><strong>Address:</strong> {$entry['address']}</p>";
        echo "<p><strong>Submitted At:</strong> {$entry['timestamp']}</p>";
        echo "<hr>";
        echo "</div>";
    }
} else {
    echo "<p>No submissions found.</p>";
}

echo "</div>";
echo "</body>";
echo "</html>";
?>
