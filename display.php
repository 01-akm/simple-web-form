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
