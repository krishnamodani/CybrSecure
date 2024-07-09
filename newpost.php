<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Post (CybrSecure)</title>
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
    <?php

    // Check if the user is logged in and has a customer ID in the session
    if (!isset($_SESSION['custno'])) {
        // Redirect to the login page or handle the scenario where the user is not logged in
        header("Location: forumpresignup.php");
        exit(); // Stop further execution of the script
    }

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
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image1 = $_FILES['image1']['name'];
        $image2 = $_FILES['image2']['name'];
        $image3 = $_FILES['image3']['name'];
        $description1 = $_POST['description1'];
        $description2 = $_POST['description2'];
        $description3 = $_POST['description3'];

        // Get customer ID from session data
        $customer_id = $_SESSION['custno'];
        // Prepare SQL statement to insert data into database
        $sql = "INSERT INTO forum (custno, title, content, img1, img2, img3, description_of_img1, description_of_img2, description_of_img3)
            VALUES ('$customer_id', '$title', '$content', '$image1', '$image2', '$image3', '$description1', '$description2', '$description3')";

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
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>

    <form class="smoke" id="newPost" name="newPost" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        method="post" enctype="multipart/form-data" style="background-color: rgb(80,137,145);">
        <section class="vh-200" style="padding: 50px" style="">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4" style="text-align: center;margin-top:80px;">
                            New Post
                        </h1>

                        <div class="card" style="border-radius: 15px">
                            <div class="card-body">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Title</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" class="form-control form-control-lg" id="title" name="title"
                                            placeholder="Enter post title" required />
                                    </div>
                                </div>

                                <hr class="mx-n3" />

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Content</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control form-control-lg" id="content" name="content"
                                            placeholder="Enter post content" rows="4" required></textarea>
                                    </div>
                                </div>

                                <hr class="mx-n3" />

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Image 1</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="file" class="form-control form-control-lg" id="myInput"
                                            name="image1" accept="image/*" required />
                                    </div>
                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Description for Image 1</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" class="form-control form-control-lg" id="myInput"
                                            name="description1" placeholder="Enter description for image 1" />
                                    </div>
                                </div>

                                <hr class="mx-n3" />

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Image 2</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="file" class="form-control form-control-lg" id="myInput"
                                            name="image2" accept="image/*" />
                                    </div>
                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Description for Image 2</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" class="form-control form-control-lg" id="myInput"
                                            name="description2" placeholder="Enter description for image 2" />
                                    </div>
                                </div>

                                <hr class="mx-n3" />

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Image 3</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="file" class="form-control form-control-lg" id="myInput"
                                            name="image3" accept="image/*" />
                                    </div>
                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Description for Image 3</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" class="form-control form-control-lg" id="myInput"
                                            name="description3" placeholder="Enter description for image 3" />
                                    </div>
                                </div>

                                <hr class="mx-n3" />

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary btn-lg" id="submit">
                                        Submit
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
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

    <script>
        document.getElementById("myForm").addEventListener("submit", function (event) {
            var inputs = document.querySelectorAll("#myForm input[type='text']");
            inputs.forEach(function (input) {
                if (input.value.trim() === "") {
                    input.value = null;
                }
            });
        });
    </script>
</body>

</html>