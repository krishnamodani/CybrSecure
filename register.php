<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Register (CybrSecure)</title>
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

<form class="smoke" id="signUp" name="signUp" action="signup.php" method="post"
style="background-color: rgb(80,137,145);">
<section class="vh-200" style="padding: 50px" style="">
<div class="container h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
<div class="col-xl-9">
<h1 class="text-white mb-4" style="text-align: center;margin-top:80px;">
Register
</h1>

<div class="card" style="border-radius: 15px">
<div class="card-body">
<div class="row align-items-center pt-4 pb-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">First name</h6>
</div>
<div class="col-md-9 pe-5">
<input type="text" class="form-control form-control-lg" id="firstName" name="firstName"
placeholder="Enter your first name" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Last name</h6>
</div>
<div class="col-md-9 pe-5">
<input type="text" class="form-control form-control-lg" id="lastName" name="lastName"
placeholder="Enter your last name" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Email address</h6>
</div>
<div class="col-md-9 pe-5">
<input type="email" class="form-control form-control-lg" id="email" name="email"
placeholder="Enter your email address" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Mobile number</h6>
</div>
<div class="col-md-9 pe-5">
<input type="tel" class="form-control form-control-lg" id="mobile" name="mobile"
placeholder="Enter your mobile number" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Date of Birth</h6>
</div>
<div class="col-md-9 pe-5">
<input type="date" class="form-control form-control-lg" id="dob" name="dob"
placeholder="Enter your date of birth" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Gender</h6>
</div>
<div class="col-md-9 pe-5">
<select class="form-select form-select-lg" aria-label="Select gender" id="gender" name="gender"
required>
<option disabled selected value="">Select your gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Address Line 1</h6>
</div>
<div class="col-md-9 pe-5">
<input type="text" class="form-control form-control-lg" id="addressLine1" name="addressLine1"
placeholder="Enter your address line 1" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Address Line 2</h6>
</div>
<div class="col-md-9 pe-5">
<input type="text" class="form-control form-control-lg" id="addressLine2" name="addressLine2"
placeholder="Enter your address line 2" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">City</h6>
</div>
<div class="col-md-9 pe-5">
<input type="text" class="form-control form-control-lg" id="city" name="city"
placeholder="Enter your city" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">State</h6>
</div>
<div class="col-md-9 pe-5">
<input type="text" class="form-control form-control-lg" id="state" name="state"
placeholder="Enter your state" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Pin Code</h6>
</div>
<div class="col-md-9 pe-5">
<input type="text" class="form-control form-control-lg" id="pinCode" name="pinCode"
placeholder="Enter your pin code" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Country</h6>
</div>
<div class="col-md-9 pe-5">
<input type="text" class="form-control form-control-lg" id="country" name="country"
placeholder="Enter your country" required />
</div>
</div>

<hr class="mx-n3" />

<div class="row align-items-center py-3">
<div class="col-md-3 ps-5">
<h6 class="mb-0">Password</h6>
</div>
<div class="col-md-9 pe-5">
<input type="password" class="form-control form-control-lg" id="password" name="password"
placeholder="Enter your password" required />
</div>
</div>

<hr class="mx-n3" />

<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
<button type="submit" class="btn btn-primary btn-lg" id="submit">
Register
</button>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</form>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>