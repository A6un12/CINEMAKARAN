<?php
// Simple password check
$password = "yourpassword";  // Set your desired password here

if (isset($_POST['password']) && $_POST['password'] == $password) {
    // Password is correct, show content
} else {
    // Password is not correct, show password form
    if (!isset($_POST['password'])) {
        // If password is not entered, show the form
        echo '<form method="POST">
                <label for="password">Enter Password:</label>
                <input type="password" name="password" id="password" required>
                <button type="submit">Submit</button>
              </form>';
    }
    exit();  // Stops the rest of the page from rendering if the password is incorrect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin - MovieStellar</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <div class="logo">MovieStellar Admin</div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="#action">Add Movie</a></li>
      </ul>
    </nav>
  </header>

  <section id="add-movie" class="movie-upload">
    <h2>Add a New Movie</h2>
    <form action="upload_movie.php" method="POST" enctype="multipart/form-data">
      <div>
        <label for="movie-name">Movie Name:</label>
        <input type="text" id="movie-name" name="movie-name" required>
      </div>
      <div>
        <label for="movie-image">Movie Image:</label>
        <input type="file" id="movie-image" name="movie-image" accept="image/*" required>
      </div>
      <div>
        <label for="download-link">Download Link:</label>
        <input type="url" id="download-link" name="download-link" required>
      </div>
      <div>
        <button type="submit">Upload Movie</button>
      </div>
    </form>
  </section>

  <footer id="contact">
    <p>&copy; 2025 MovieStellar. All Rights Reserved.</p>
  </footer>
</body>
</html>
