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
    