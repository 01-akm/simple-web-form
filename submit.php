<?php

// --- 1. DATABASE CONNECTION ---
// Replace these details with your actual MySQL database credentials.
$servername = "localhost"; // Usually 'localhost' or an IP address
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "form_db";       // The name of the database we created

// Create a new MySQLi connection.
// The '@' symbol suppresses default PHP errors, allowing us to handle them manually.
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check if the connection failed.
if ($conn->connect_error) {
    // If it fails, stop the script and display a detailed error message.
    // This is crucial for debugging during development.
    die("Connection failed: " . $conn->connect_error);
}

// --- 2. FORM SUBMISSION CHECK ---
// Check if the server request method is 'POST'.
// This ensures that the code inside this block only runs when the form has been submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // --- 3. RETRIEVE AND SANITIZE FORM DATA ---
    // It's good practice to retrieve all expected POST variables.
    // We use the null coalescing operator '??' to provide a default empty string ''
    // if a field was not filled out. This prevents errors.

    // Common Text-Based Inputs
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $password_plain = $_POST['password'] ?? ''; // We get the plain text password first.
    $searchQuery = $_POST['searchQuery'] ?? '';
    $website = $_POST['website'] ?? '';
     // Get the raw phone number input from the form.
    $phone_raw = $_POST['phone'] ?? '';
    // **NEW:** Sanitize the phone number by removing all non-numeric characters.
    // preg_replace('/[^0-9]/', '', $phone_raw) finds anything that is NOT a digit and replaces it with nothing.
    $phone = preg_replace('/[^0-9]/', '', $phone_raw);

    $favColor = $_POST['favColor'] ?? '';
// Date and Time Inputs
    $dob = $_POST['dob'] ?? NULL; // Default to NULL for empty dates
    $appointment = $_POST['appointment'] ?? NULL;
    $meetingTime = $_POST['meetingTime'] ?? NULL;
    $startMonth = $_POST['startMonth'] ?? '';
    $projectWeek = $_POST['projectWeek'] ?? '';

    // Numeric Inputs
    $age = $_POST['age'] ?? NULL;
    $satisfaction = $_POST['satisfaction'] ?? NULL;

    // Choice Inputs
    // For checkboxes ('interests'), the data comes as an array. We need to convert it to a string.
    $interests_array = $_POST['interests'] ?? [];
    $interests = implode(", ", $interests_array); // Joins array elements with a comma and space.

    $gender = $_POST['gender'] ?? '';
    $country = $_POST['country'] ?? '';
    $browser = $_POST['browser'] ?? '';

    // Hidden / Special Inputs
    $userId = $_POST['userId'] ?? '';
    $bio = $_POST['bio'] ?? '';