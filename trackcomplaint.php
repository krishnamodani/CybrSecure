<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <title>Track Complaint (CybrSecure)</title>
    <link rel="icon" href="images/symbol-removebg-preview.png" />
    <style>
        /* Split page into two parts */
        .container {
            display: flex;
            height: 100vh;
            /* Vertical centering */
        }

        .row {
            border-top: 1px solid #ccc;
        }

        /* Left part (form) */
        .left {
            flex: 0 0 400px;
            /* Static width for left part */
            background-color: #f2f2f2;
            padding: 20px;
            overflow: hidden;
            /* Hide horizontal overflow */
            border-radius: 10px;
            /* Rounded corners */
            margin-right: 20px;
            /* Add margin to separate from the right side */
        }

        /* Right part (scrollable) */
        .right {
            flex: 1;
            /* Take remaining space */
            overflow-y: auto;
            /* Enable vertical scrolling */
            padding: 20px;
            border-radius: 10px;
            /* Rounded corners */
            background-color: #f2f2f2;
            /* Background color */
        }

        /* Form input fields */
        .left input[type="text"],
        .left input[type="email"],
        .left input[type="date"] {
            width: calc(100% - 20px);
            /* Adjust for padding */
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Form button */
        .left button {
            width: calc(100% - 20px);
            /* Adjust for padding */
            background-color: #4caf50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Form button hover effect */
        .left button:hover {
            background-color: #45a049;
        }

        /* Output area */
        .output-area {
            margin-top: 20px;
        }
    </style>
</head>

<body style="background-color:rgb(223,240,242);">
    <?php include 'navbar.php'; ?>
    <p style="margin-top: 100px"></p>
    <div class="container" style="">
        <div style="align-content:center;">
            <!-- <p style="margin-top: -100px;"></p> -->
            <div class="left" style="">
                <h2 style="text-align:center;margin-bottom:20px;">Enter Details</h2>
                <form action="getcomplaintdetails.php" method="POST" style="max-width:40vh;">
                    <label for="srno">Acknowledgement Number:</label>
                    <input type="text" id="srno" name="srno" placeholder="Enter Acknowledgement Number" />

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter email address" />

                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter phone number" />

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" />

                    <button type="submit">Find</button>
                </form>
            </div>
        </div>

        <div class="right" id="output">
            <div class="" id="output">
                <h2 style="text-align:center;">Complaint Details</h2>
                <?php
                // Check if status array exists in session and is not empty
                if (isset($_SESSION['complaint'])) {
                    // Retrieve status array from session
                    $status = $_SESSION['complaint'];

                    // Output data
                    echo "<div class='space'>";
                    echo "<div class='row' style='border:none;color:red;'>Status: " . ($status['status'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Acknowledgement Number: " . ($status['prefix'] ?? '') . ($status['srno'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Victim: " . ($status['victim'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Name: " . ($status['name'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Date of Birth: " . ($status['dob'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Age: " . ($status['age'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Gender: " . ($status['gender'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Address: " . ($status['address'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>City: " . ($status['city'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>State: " . ($status['state'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Pincode: " . ($status['pincode'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Country: " . ($status['country'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Mobile Number: " . ($status['mob_no'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Email ID: " . ($status['email_id'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Financial Transaction Type: " . ($status['financial_trn_type'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Transaction Amount: " . ($status['trn_amt'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Transaction Date: " . ($status['trn_date'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Victim Bank Name: " . ($status['victim_bank_name'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Victim Bank Branch Address: " . ($status['victim_bank_branch_address'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Victim Name on Account: " . ($status['victim_name_on_account'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Victim Account Number: " . ($status['victim_account_number'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Recipient's Bank Name: " . ($status['recipients_bank_name'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Recipient's Bank Address: " . ($status['recipients_bank_address'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Recipient's Name on Account: " . ($status['recipients_name_on_account'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Recipient's Account Number: " . ($status['recipients_account_number'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Description of Situation: " . ($status['description_of_situation'] ?? '') . "</div>";
                    echo "<div class='space'>&nbsp</div>";
                    echo "<div class='row'>Date & Time of Complaint: " . ($status['date_time_of_complaint'] ?? '') . "</div>";
                    echo "</div>";

                    // Unset status array from session
                    unset($_SESSION['complaint']);
                } else {
                    // No complaints found
                    echo "<p>No complaints found.</p>";
                }
                ?>
            </div>


        </div>
    </div>
    <?php include 'footer.php' ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>