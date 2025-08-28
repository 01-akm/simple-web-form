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
    // --- 4. PASSWORD HASHING ---
    // This is a CRITICAL security step. Never store plain text passwords.
    // password_hash() creates a strong, secure hash of the password.
    $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);


    // --- 5. FILE UPLOAD HANDLING ---
    $document_path = NULL; // Default to NULL
    // Check if a file was actually uploaded and there are no errors.
    if (isset($_FILES['documents']) && $_FILES['documents']['error'][0] == UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/'; // Create a folder named 'uploads' in the same directory.
        // Create the directory if it doesn't exist.
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        // Get the original filename.
        $filename = basename($_FILES['documents']['name'][0]);
        // Define the full path for the file to be saved.
        $document_path = $upload_dir . $filename;

        // Move the temporary uploaded file to our 'uploads' directory.
        if (!move_uploaded_file($_FILES['documents']['tmp_name'][0], $document_path)) {
            $document_path = NULL; // If move fails, reset path to NULL.
        }
    }
// --- 6. SQL PREPARED STATEMENT ---
    // Using prepared statements is the best way to prevent SQL injection attacks.
    // The SQL query lists all the columns we want to insert data into.
    // The 'VALUES' clause uses question marks (?) as placeholders for the data.
    $sql = "INSERT INTO users (fullName, email, password, searchQuery, website, phone, favColor, dob, appointment, meetingTime, startMonth, projectWeek, age, satisfaction, interests, gender, country, browser, documents, userId, bio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement for execution.
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
  // --- 7. BIND PARAMETERS ---
    // This step binds the PHP variables to the placeholders (?) in the SQL query.
    // The string "sssssssssssiissssssss" defines the data type for each parameter:
    // s = string, i = integer, d = double, b = blob
    $stmt->bind_param(
        "sssssssssssiissssssss",
        $fullName,
        $email,
        $password_hashed,
        $searchQuery,
        $website,
        $phone, // The newly sanitized phone number is used here.
        $favColor,
        $dob,
        $appointment,
        $meetingTime,
        $startMonth,
        $projectWeek,
        $age,
        $satisfaction,
        $interests,
        $gender,
        $country,
        $browser,
        $document_path,
        $userId,
        $bio
    );

       // --- 8. EXECUTE AND PROVIDE FEEDBACK ---
    // Execute the prepared statement.
    if ($stmt->execute()) {
        // If successful, show a success message.
        echo "<h1>Success!</h1>";
        echo "<p>Your information has been submitted successfully.</p>";
        echo "<a href='display.php'>View All Submissions</a>";
    } else {
        // If it fails, show an error message.
        echo "<h1>Error!</h1>";
        echo "<p>There was a problem with your submission: " . htmlspecialchars($stmt->error) . "</p>";
    }
