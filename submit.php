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
