<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <style>
        /* --- General Body Styles --- */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        /* --- Main Container --- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        /* --- Table Styling --- */
        .data-table {
            width: 100%;
            border-collapse: collapse; /* Removes space between table cell borders */
            margin-bottom: 20px;
        }

        .data-table th, .data-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
            word-wrap: break-word; /* Allows long text to wrap */
        }

        .data-table th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Adds a zebra-stripe effect to rows */
        }

        .data-table tbody tr:hover {
            background-color: #e8f4fd; /* Highlight row on hover */
        }
        
        /* --- Responsive Wrapper for the Table --- */
        .table-responsive {
            overflow-x: auto; /* Adds a horizontal scrollbar on small screens */
        }
      /* --- Link/Button Styling --- */
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .back-link:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>All Form Submissions</h1>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <!-- Define all the table headers -->
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Search Query</th>
                        <th>Website</th>
                        <th>Phone</th>
                        <th>Color</th>
                        <th>DOB</th>
                        <th>Appointment</th>
                        <th>Time</th>
                        <th>Month</th>
                        <th>Week</th>
                        <th>Age</th>
                        <th>Satisfaction</th>
                        <th>Interests</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Browser</th>
                        <th>Document</th>
                        <th>User ID</th>
                        <th>Bio</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>