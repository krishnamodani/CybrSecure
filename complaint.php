<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report Complaint (CybrSecure)</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="icon" href="images/symbol-removebg-preview.png" />
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div>
        <form class="smoke" id="complaint" name="complaint" action="postcomplaints.php" method="post"
            style="background-color: rgb(80,137,145)">
            <section class="vh-200" style="padding: 50px" style="">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-xl-9">
                            <h1 class="text-white mb-4" style="text-align: center;margin-top:80px;">
                                Report Cyber-Crime
                            </h1>
                            <div class="card-body">
                                <div class="card" style="border-radius: 15px">

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Were you the victim?</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="victim"
                                                    id="victim_yes" value="yes" required>
                                                <label class="form-check-label" for="victim_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="victim"
                                                    id="victim_no" value="no" required>
                                                <label class="form-check-label" for="victim_no">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your Name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" id="Name"
                                                name="Name" placeholder="Enter your Name" required />
                                        </div>
                                    </div>

                                    <hr class="mx-n0" />

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your Date of Birth</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="date" class="form-control form-control-lg" id="dob" name="dob"
                                                placeholder="Enter your date of birth" required />
                                        </div>
                                    </div>

                                    <hr class="mx-n0" />

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your Age</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="number" class="form-control form-control-lg" id="age"
                                                name="age" placeholder="Enter your Age" required />
                                        </div>
                                    </div>

                                    <hr class="mx-n0" />

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Gender</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select class="form-select form-select-lg" aria-label="Select gender"
                                                id="gender" name="gender" required>
                                                <option disabled selected value="">Select your gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your Address</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" id="Address"
                                                name="Address" placeholder="Enter your Address" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your City</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" id="City"
                                                name="City" placeholder="Enter your City" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your State</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" id="State"
                                                name="State" placeholder="Enter your State" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your Pincode</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="number" class="form-control form-control-lg" id="Pincode"
                                                name="Pincode" placeholder="Enter your Pincode" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your Country</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" id="Country"
                                                name="Country" placeholder="Enter your Country" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your Mobile Number</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="tel" class="form-control form-control-lg" id="Mobile"
                                                name="Mobile" placeholder="Enter your Mobile Number" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Enter your Email Address</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="email" class="form-control form-control-lg" id="Email"
                                                name="Email" placeholder="Enter your Email Address" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center py-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Select the type of Financial Transaction</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <select class="form-select form-select-lg" aria-label="Select transaction"
                                                id="transactiontype" name="transactiontype" required>
                                                <option disabled selected value="">Select Transaction Type</option>
                                                <option value="cash">Cash</option>
                                                <option value="check">Check</option>
                                                <option value="credit card">Credit Card</option>
                                                <option value="virtal currency">Virtal Currency</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Transaction Amount</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" id="TransactionAmt"
                                                name="TransactionAmt" placeholder="Enter Transaction Amount" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Transaction Date</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="date" class="form-control form-control-lg" id="TransactionDate"
                                                name="TransactionDate" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Victim Bank Name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg" id="VictimBankName"
                                                name="VictimBankName" placeholder="Enter Victim Bank Name" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Victim Branch Address</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg"
                                                id="VictimBranchAddress" name="VictimBranchAddress"
                                                placeholder="Enter Victim Branch Address" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Victim Name on Account</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg"
                                                id="VictimNameOnAccount" name="VictimNameOnAccount"
                                                placeholder="Enter Victim Name on Account" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Victim Account Number</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg"
                                                id="VictimAccountNumber" name="VictimAccountNumber"
                                                placeholder="Enter Victim Account Number" required />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Recipient's Bank Name</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg"
                                                id="RecipientsBankName" name="RecipientsBankName"
                                                placeholder="Enter Recipient's Bank Name" />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Recipient's Bank Address</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg"
                                                id="RecipientsBankAddress" name="RecipientsBankAddress"
                                                placeholder="Enter Recipient's Bank Address" />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Recipient's Name on Account</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg"
                                                id="RecipientsNameOnAccount" name="RecipientsNameOnAccount"
                                                placeholder="Enter Recipient's Name on Account" />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Recipient's Account Number</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <input type="text" class="form-control form-control-lg"
                                                id="RecipientsAccountNumber" name="RecipientsAccountNumber"
                                                placeholder="Enter Recipient's Account Number" />
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />
                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Description of Situation</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <textarea class="form-control form-control-lg" id="DescriptionOfSituation"
                                                name="DescriptionOfSituation"
                                                placeholder="Enter Description of Situation" required></textarea>
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />

                                    <div class="row align-items-center pt-4 pb-3">
                                        <div class="col-md-3 ps-5">
                                            <h6 class="mb-0">Declaration</h6>
                                        </div>
                                        <div class="col-md-9 pe-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaration"
                                                    id="declaration" value="true" required>
                                                <label class="form-check-label" for="declaration">
                                                    I hereby declare that all the data provided is true to my knowledge.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mx-n0" />


                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg" id="submit">
                                            Lodge Complaint
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- MDB -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>