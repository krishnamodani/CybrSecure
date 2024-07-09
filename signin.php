<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'cybrsecure');

// Check if the connection was successful
if (!$conn) {
    echo "<script>alert('Incorrect Details');</script>";
    die('Could not connect to the database: ' . mysqli_connect_error());
}

// Get the input data from the login form
$username = $_POST['Email'];
$password = $_POST['Password'];
// $password = password_verify($password,password1);

// Prepare the SQL query
$query = "SELECT * FROM customers WHERE email_id='$username'";

// Execute the query and get the result
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Fetch user details
    $row = mysqli_fetch_assoc($result); // Fetch the row
    
    // Check if entered password matches hashed password from the database
    if (password_verify($password, $row['password1'])) {
        // Passwords match, login successful
        session_start();
        $_SESSION['custno'] = $row['custno'];
        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $row['first_name']; // Store first name in session variable
        $_SESSION['lastname'] = $row['last_name'];   // Store last name in session variable
        echo "<script>window.location.href='/forum.php';</script>";
        exit();
    } else {
        // Passwords do not match, login failed
        echo "<script>alert('Incorrect Password');</script>";
        echo "<script>window.location.href='forumpresignup.php';</script>";
        exit();
    }
} else {
    // No user found with the given email, login failed
    echo "<script>alert('User not found');</script>";
    echo "<script>window.location.href='forumpresignup.php';</script>";
    exit();
}


// Close the database connection
mysqli_close($conn);
?>
