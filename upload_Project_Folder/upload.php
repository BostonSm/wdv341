<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    // file will be uploaded here
    $uploadDir = "uploads/";
	
    // Ensure the folder exists
    if (!is_dir($uploadDir)) {
        die("Error: The target folder does not exist on the server.");
    }

    // File information
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $uploadDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow only these file formats
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array(strtolower($fileType), $allowedTypes)) {
        // Attempt to move the uploaded file 
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded successfully.";
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "Only image files (JPG, JPEG, PNG, GIF) are allowed.";
    }
} else {
    echo "Invalid request. Please select a file to upload.";
}
?> 