<?php
// Read from an existing file
$filename = 'example.txt';
$file = fopen($filename, 'r');

if ($file) {
    echo 'File Contents:<br>';
    while (($line = fgets($file)) !== false) {
        echo $line . '<br>';
    }
    fclose($file);
} else {
    echo 'Failed to open the file for reading.';
}

// Write to a file
$newContent = "This is a new line that will be added to the file.";

$file = fopen($filename, 'a'); // Open the file in append mode

if ($file) {
    fwrite($file, "\n" . $newContent);
    fclose($file);
    echo '<br>File written successfully.';
} else {
    echo 'Failed to open the file for writing.';
}
?>
  