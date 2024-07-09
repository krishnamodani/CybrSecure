<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to MySQL database
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $database = "cybrsecure"; // Change to your MySQL database name

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from form
    $url = $_POST['url'];
    $srno = $_POST['srno'];
    $content = $_POST['content'];
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $description1 = $_POST['description1'];
    $description2 = $_POST['description2'];
    $description3 = $_POST['description3'];


    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO furthercomment (srno, content, img1, description_of_img1, img2, description_of_img2, img3, description_of_img3)
        VALUES ('$srno', '$content', '$image1', '$description1', '$image2', '$description2', '$image3', '$description3')";

    // Upload images to server
    $target_dir = "uploads/";
    $target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["image3"]["name"]);

    // Upload image1
    move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file1);

    // Upload image2
    move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2);

    // Upload image3
    move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file3);

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        header("Location: $url");
    }
     else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>