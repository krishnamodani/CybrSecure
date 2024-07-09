<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Your database password
$dbname = "cybrsecure"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $victim = $_POST['victim'];
    $name = $_POST['Name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $pincode = $_POST['Pincode'];
    $country = $_POST['Country'];
    $mobile = $_POST['Mobile'];
    $email = $_POST['Email'];
    $transactionType = $_POST['transactiontype'];
    $transactionAmt = $_POST['TransactionAmt'];
    $transactionDate = $_POST['TransactionDate'];
    $victimBankName = $_POST['VictimBankName'];
    $victimBranchAddress = $_POST['VictimBranchAddress'];
    $victimNameOnAccount = $_POST['VictimNameOnAccount'];
    $victimAccountNumber = $_POST['VictimAccountNumber'];
    $recipientsBankName = isset($_POST['RecipientsBankName']) ? $_POST['RecipientsBankName'] : NULL;
    $recipientsBankAddress = isset($_POST['RecipientsBankAddress']) ? $_POST['RecipientsBankAddress'] : NULL;
    $recipientsNameOnAccount = isset($_POST['RecipientsNameOnAccount']) ? $_POST['RecipientsNameOnAccount'] : NULL;
    $recipientsAccountNumber = isset($_POST['RecipientsAccountNumber']) ? $_POST['RecipientsAccountNumber'] : NULL;
    $descriptionOfSituation = $_POST['DescriptionOfSituation'];
    $declaration = $_POST['declaration'];

    // Prepare and bind SQL statement
    // Assuming $custno is retrieved from the session
    $custno = $_SESSION['custno'];

    $sql = "INSERT INTO complaint (custno, victim, name, dob, age, gender, address, city, state, pincode, country, mob_no, email_id, financial_trn_type, trn_amt, trn_date, victim_bank_name, victim_bank_branch_address, victim_name_on_account, victim_account_number, recipients_bank_name, recipients_bank_address, recipients_name_on_account, recipients_account_number, description_of_situation) VALUES ('$custno', '$victim', '$name', '$dob', '$age', '$gender', '$address', '$city', '$state', '$pincode', '$country', '$mobile', '$email', '$transactionType', '$transactionAmt', '$transactionDate', '$victimBankName', '$victimBranchAddress', '$victimNameOnAccount', '$victimAccountNumber', '$recipientsBankName', '$recipientsBankAddress', '$recipientsNameOnAccount', '$recipientsAccountNumber', '$descriptionOfSituation')";

    $result = $conn->query($sql);
    $sql = "SELECT srno FROM complaint ORDER BY srno DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $currsrno = $row["srno"];
            // Use $currsrno as needed
            echo "<script>alert('Complaint Registered Successfully with temporary Reference No cybr$currsrno');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}
?>