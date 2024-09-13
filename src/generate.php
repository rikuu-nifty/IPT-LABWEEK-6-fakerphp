<?php

require 'Random.php';

$random = new Random();
$people = $random->generatePeople(300);

// Create a CSV file
$file = fopen('persons.csv', 'w');

// Add headers to the CSV file
fputcsv($file, array_keys($people[0]));

// Add records to the CSV file
foreach ($people as $person) {
    fputcsv($file, $person);
}

fclose($file);

echo "CSV file 'persons.csv' has been generated successfully.\n";
