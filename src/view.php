<?php

require 'FileUtility.php';

// Path to the CSV file
$filePath = 'persons.csv';

// Create an instance of FileUtility
$fileUtility = new FileUtility($filePath);

// Convert CSV to an array
$data = $fileUtility->csvToArray();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Persons</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        td {
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Generated Persons Data</h1>
    <table>
        <thead>
            <tr>
                <?php
                // Display table headers
                if (!empty($data)) {
                    foreach (array_keys($data[0]) as $header) {
                        echo "<th>{$header}</th>";
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display table rows
            foreach ($data as $row) {
                echo '<tr>';
                foreach ($row as $cell) {
                    echo "<td>{$cell}</td>";
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
