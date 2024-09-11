<?php
//nothing like doing it in php to be really dangerous!

// Create an anonymous file
$tempFile = tempnam(sys_get_temp_dir(), 'prefix');

// Write some content to the file
file_put_contents($tempFile, "Hello, world!");

// Read and output the contents of the file
echo file_get_contents($tempFile);

// Unlink the file
unlink($tempFile);

// Continue using the unlinked file
echo "Still using the unlinked file...\n";
$fileHandle = fopen($tempFile, 'r');
if ($fileHandle) {
    echo fread($fileHandle, filesize($tempFile));
    fclose($fileHandle);
} else {
    echo "File no longer exists.";
}


?>
