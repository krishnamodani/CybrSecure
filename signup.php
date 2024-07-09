<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'cybrsecure');

// Check if the connection was successful
if (!$conn) {
    die('Could not connect to the database: ' . mysqli_connect_error());
}

// Get the input data from the login form
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$addressLine1 = $_POST['addressLine1'];
$addressLine2 = $_POST['addressLine2'];
$city = $_POST['city'];
$state = $_POST['state'];
$pinCode = $_POST['pinCode'];
$country = $_POST['country'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);

// $dob_formatted = "STR_TO_DATE('$dob', '%d-%m-%Y')";
// Insert the data into the database
$sql = "INSERT INTO customers (first_name, last_name, email_id, mob_no, dob, gender, address_line1, address_line2, city, state1, pin_code, country, password1) 
        VALUES ('$firstname', '$lastname', '$email', '$mobile', '$dob', '$gender', '$addressLine1', '$addressLine2', '$city', '$state', '$pinCode', '$country', '$password')";

if ($conn->query($sql) === true) {
  echo "<script>alert('Account Created Successfully');</script>";
  echo "<script>window.location.href='forumpresignup.php';</script>";
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
mysqli_close($conn);
?>
