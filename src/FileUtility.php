<?php

class FileUtility
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function csvToArray()
    {
        $array = [];
        if (($handle = fopen($this->filePath, 'r')) !== false) {
            $header = fgetcsv($handle);

            if ($header === false) {
                // Handle empty or invalid file
                fclose($handle);
                return $array;
            }

            while (($row = fgetcsv($handle)) !== false) {
                // Ensure that the number of columns in the row matches the header
                if (count($header) === count($row)) {
                    $array[] = array_combine($header, $row);
                } else {
                    // Handle mismatched column count
                    error_log("Warning: Skipping row due to column count mismatch.");
                }
            }
            fclose($handle);
        } else {
            // Handle file open failure
            error_log("Error: Unable to open file at {$this->filePath}");
        }
        return $array;
    }
}
