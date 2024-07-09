<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>backend</title>
</head>
<body>
    <a href="index.php">back to home page</a>
    <h4><center>upload the images and description for homepage awareness flyers</center></h4>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cybrsecure";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get image details from form
    $imageName = $_FILES["image"]["name"];
    $imagePath = "awareness/" . $imageName; // Change "awareness/" to your desired directory
    $imageDescription = $_POST["description"];

    // Move uploaded file to the specified directory
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    // Prepare mysqli query
    $query = "INSERT INTO images (image_name, image_path, image_description) VALUES ('$imageName', '$imagePath', '$imageDescription')";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!-- HTML form for uploading image and description -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*" required><br>
    <textarea name="description" rows="4" cols="50" placeholder="Enter description..." required></textarea><br>
    <input type="submit" value="Upload Image">
</form>
</body>
</html>