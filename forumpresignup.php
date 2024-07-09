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
    <title>Forum (CybrSecure)</title>
    <link rel="icon" href="images/symbol-removebg-preview.png" />
</head>

<body style="background-color:rgb(223,240,242);">
    <?php include 'navbar.php' ?>

    <p style="margin-top: 100px"></p>

    <!-- sign up sign in -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-right: 15px">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight" style="margin-right: 15px; max-width: 120px; margin-left: 5px">
            Sign In
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" data-bs-backdrop="static" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel" style="
min-width: 25%;
height: 100%;
background-image: url('images/register_backdrop.png');
background-size:cover; ">
            <div class="offcanvas-header">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="max-width:500px;min-width:300px;">
                <br /><br />
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card text-black" style="border-radius: 25px">
                                <div class="card-body p-md-5">
                                    <div class="row justify-content-center">
                                        <div class="row-md-10 row-lg-6 row-xl-5 order-2 order-lg-1">
                                            <p class="text-center h4 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                                                Sign In
                                            </p>

                                            <form id="signIn" name="signIn" action="signin.php" method="post">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="Email" name="Email"
                                                            placeholder="name@example.com">
                                                        <label class="form-label" for="floatingInput">Email
                                                            address</label>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-floating">
                                                        <input type="password" class="form-control" id="Password"
                                                            name="Password" placeholder="Password">
                                                        <label class="form-label"
                                                            for="floatingPassword">Password</label>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="submit" class="btn btn-primary btn-lg" id="submit">
                                                        Login
                                                    </button>
                                                </div>
                                            </form>
                                            <p class="register">
                                                Not a member?<a href="/register.php">&nbspRegister here!</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- forum blogs -->
    <div class="row row-cols-1 row-cols-md-1 g-4" style="margin: 15px; margin-top: 0">
        <!-- php code to load forums -->
        <?php
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
        // Define constants
        define('PER_PAGE', 10); // Number of entries per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
        
        // Calculate total pages and offset
        $sqlCount = "SELECT COUNT(*) AS totalEntries FROM forum";
        $countResult = $conn->query($sqlCount);
        $rowCount = $countResult->fetch_assoc();
        $totalEntries = $rowCount['totalEntries'];
        $totalPages = ceil($totalEntries / PER_PAGE); // Calculate total pages
        $offset = ($page - 1) * PER_PAGE;

        // Fetching data from the forum table
        $sql = "SELECT title, LEFT(content, 900) AS truncated_content, img1, date_time FROM forum ORDER BY date_time DESC";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Generating HTML content based on fetched data
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<button onclick="alert(\'Sign In to view more\')" style="text-decoration: none;padding: 0;text-align: justify;border: none;">';
            echo '<div class="col">';
            echo '<div class="card h-100">';
            echo '<table>';
            echo '<tr>';
            echo '<td style="width: 150px; margin: 0; padding: 15px">';
            echo '<img src="uploads/' . $row['img1'] . '" class="card-img" alt="..." style="width: 150px; margin: 0; padding: 0" />';
            echo '</td>';
            echo '<td>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . ucwords(strtolower($row['title'])) . '</h5>';
            echo '<p class="card-text">' . ucfirst(strtolower($row['truncated_content'])) . '...</p>';
            echo '<p class="card-text" style="margin:0;padding:0;">Posted on : ' . date('d-M-Y', strtotime($row['date_time'])) . '</p>';
            echo '<p style="position: absolute; right: 2%;bottom: 2%;color: red;font-weight: bold;">Read more</p>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</button>';
        }

        // Free result set
        mysqli_free_result($result);

        // Close connection
        mysqli_close($conn);
        ?>

    </div>

    <?php include 'pages.php' ?>

    <?php include 'footer.php' ?>
    </div>
    <!-- <p style="font-size: 500px;">hello world</p> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>