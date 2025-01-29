<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $movieTitle = $_POST['movieTitle'];
    $movieDescription = $_POST['movieDescription'];
    $downloadLink = $_POST['downloadLink'];

    // Handle the file upload
    $targetDir = "uploads/"; // Directory to store images
    $targetFile = $targetDir . basename($_FILES["movieImage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image is an actual image or fake image
    if (getimagesize($_FILES["movieImage"]["tmp_name"]) === false) {
        die("File is not an image.");
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        die("Sorry, the file already exists.");
    }

    // Check file size (limit to 5MB)
    if ($_FILES["movieImage"]["size"] > 5000000) {
        die("Sorry, your file is too large.");
    }

    // Allow certain file formats (optional)
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        die("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
    }

    // Move uploaded file to server directory
    if (move_uploaded_file($_FILES["movieImage"]["tmp_name"], $targetFile)) {
        // Display the movie card with uploaded image
        echo "<div class='movie-card'>
                <img src='$targetFile' alt='$movieTitle'>
                <h3>$movieTitle</h3>
                <p>$movieDescription</p>
                <a href='$downloadLink'>Download</a>
              </div>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
