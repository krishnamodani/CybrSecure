<?php
session_start();
// Database connection parameters
$servername = "localhost";
$username = "root"; // Updated username
$password = ""; // Updated password
$dbname = "cybrsecure"; // Updated database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$srno = $_POST['srno'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];

// Prepare SQL query
$sql = "SELECT * FROM complaint WHERE CONCAT(prefix, srno) = '$srno' AND email_id = '$email' AND mob_no = '$phone' AND dob = '$dob'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize an empty array to store the data

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Assign each value to its corresponding key in the status array
        $status = $row['status'];
        $status = $row['status'];
        $prefix = $row['prefix'];
        $srno = $row['srno'];
        $custno = $row['custno'];
        $victim = $row['victim'];
        $name = $row['name'];
        $dob = $row['dob'];
        $age = $row['age'];
        $gender = $row['gender'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $pincode = $row['pincode'];
        $country = $row['country'];
        $mob_no = $row['mob_no'];
        $email_id = $row['email_id'];
        $financial_trn_type = $row['financial_trn_type'];
        $trn_amt = $row['trn_amt'];
        $trn_date = $row['trn_date'];
        $victim_bank_name = $row['victim_bank_name'];
        $victim_bank_branch_address = $row['victim_bank_branch_address'];
        $victim_name_on_account = $row['victim_name_on_account'];
        $victim_account_number = $row['victim_account_number'];
        $recipients_bank_name = $row['recipients_bank_name'];
        $recipients_bank_address = $row['recipients_bank_address'];
        $recipients_name_on_account = $row['recipients_name_on_account'];
        $recipients_account_number = $row['recipients_account_number'];
        $description_of_situation = $row['description_of_situation'];
        $date_time_of_complaint = $row['date_time_of_complaint'];

    }

    $complaint = array(
        'status' => $status,
        'prefix' => $prefix,
        'srno' => $srno,
        'custno' => $custno,
        'victim' => $victim,
        'name' => $name,
        'dob' => $dob,
        'age' => $age,
        'gender' => $gender,
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'pincode' => $pincode,
        'country' => $country,
        'mob_no' => $mob_no,
        'email_id' => $email_id,
        'financial_trn_type' => $financial_trn_type,
        'trn_amt' => $trn_amt,
        'trn_date' => $trn_date,
        'victim_bank_name' => $victim_bank_name,
        'victim_bank_branch_address' => $victim_bank_branch_address,
        'victim_name_on_account' => $victim_name_on_account,
        'victim_account_number' => $victim_account_number,
        'recipients_bank_name' => $recipients_bank_name,
        'recipients_bank_address' => $recipients_bank_address,
        'recipients_name_on_account' => $recipients_name_on_account,
        'recipients_account_number' => $recipients_account_number,
        'description_of_situation' => $description_of_situation,
        'date_time_of_complaint' => $date_time_of_complaint
    );
    // Store $complaint array in session
    $_SESSION['complaint'] = $complaint;

    // Redirect to trackcomplaint.php
    header('Location: trackcomplaint.php?success=1');
    exit();
} 
else {
    // No matching records found
    unset($_SESSION['complaint']);
    header('Location: trackcomplaint.php?error=1');
    exit();
}

$conn->close();
?>