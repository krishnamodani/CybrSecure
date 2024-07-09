<?php session_start() ?>

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

    <title>Post - CybrSecure</title>
    <link rel="icon" href="images/symbol-removebg-preview.png" />
</head>

<body style="background-color:rgb(223,240,242);">
    <?php include 'navbar.php' ?>

    <!-- get url -->
    <?php
    // Get the protocol (HTTP or HTTPS)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

    // Get the hostname
    $hostname = $_SERVER['HTTP_HOST'];

    // Get the current path and query string
    $path = $_SERVER['REQUEST_URI'];

    // Construct the full URL
    $current_url = $protocol . '://' . $hostname . $path;

    ?>
    <p style="margin-top:50px;">&nbsp;</p>
    <!-- Button trigger modal -->
    <div style="float:right;margin-right:50px;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#comment">
            Comment
        </button>
    </div>

    <!-- forum blogs -->
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

    if (isset($_GET['id'])) {
        $srno = $_GET['id'];
        // Fetching data from the forum table
        $sql = "SELECT * FROM forum where srno = '$srno'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Generating HTML content based on fetched data
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div style="margin:80px 100px 0 100px;border-radius:20px;background-color: #f2f2f2;padding:20px 10px 10px 10px;">';
            echo '<div class="" style="margin: 15px; margin-top: 0;text-align:justify;">';
            if (isset($row['title'])) {
                echo '<h2 style="text-align:center;text-decoration:underline;">' . htmlspecialchars($row['title']) . '</h2>';
            }
            echo '<div class="row row-cols-1 row-cols-md-3 g-4" style="margin: 0 10% 30px 10%;">';
            if (isset($row['img1'])) {
                echo '<div class="col">';
                echo '<div class="card">';
                echo '<img src="uploads/' . htmlspecialchars($row['img1']) . '" class="card-img-top rounded" alt="" style="" title="Image 1">';
                echo '</div>';
                echo '</div>';
            }
            if (isset($row['img2'])) {
                echo '<div class="col">';
                echo '<div class="card">';
                echo '<img src="uploads/' . htmlspecialchars($row['img2']) . '" class="card-img-top rounded" alt="" style="" title="Image 2">';
                echo '</div>';
                echo '</div>';
            }
            if (isset($row['img3'])) {
                echo '<div class="col">';
                echo '<div class="card">';
                echo '<img src="uploads/' . htmlspecialchars($row['img3']) . '" class="card-img-top rounded" alt="" style="" title="Image 3">';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            if (isset($row['description_of_img1'])) {
                echo '<p >' . htmlspecialchars($row['description_of_img1']) . '</p>';
            }
            if (isset($row['description_of_img2'])) {
                echo '<p>' . htmlspecialchars($row['description_of_img2']) . '</p>';
            }
            if (isset($row['description_of_img3'])) {
                echo '<p>' . htmlspecialchars($row['description_of_img3']) . '</p>';
            }
            if (isset($row['content'])) {
                echo '<p>' . htmlspecialchars($row['content']) . '</p>';
            }
            echo '</div>';
            echo '</div>';
        }

    }
    // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);
    ?>


    <!-- forum blog comments -->
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

    if (isset($_GET['id'])) {
        $srno = $_GET['id'];
        // Fetching data from the forum table
        $sql = "SELECT * FROM furthercomment WHERE srno = '$srno' ORDER BY date_time DESC;
        ";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Generating HTML content based on fetched data
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div style="margin:50px 100px 0 100px ;border-radius:20px;background-color: #f2f2f2;padding:20px 10px 10px 10px;">';
            echo '<div class="" style="margin: 15px; margin-top: 0;text-align:justify;position:relative;">';
            echo '<p style="position:absolute;left:0;color: red;font-weight: bold;">Replied to Post</p>';
            echo '<div class="row row-cols-1 row-cols-md-3 g-4" style="margin: 0 10% 30px 10%;">';
            if (isset($row['img1'])) {
                echo '<div class="col">';
                echo '<div class="card">';
                echo '<img src="uploads/' . htmlspecialchars($row['img1']) . '" class="card-img-top rounded" alt="" style="" title="Image 1">';
                echo '</div>';
                echo '</div>';
            }
            if (isset($row['img2'])) {
                echo '<div class="col">';
                echo '<div class="card">';
                echo '<img src="uploads/' . htmlspecialchars($row['img2']) . '" class="card-img-top rounded" alt="" style="" title="Image 2">';
                echo '</div>';
                echo '</div>';
            }
            if (isset($row['img3'])) {
                echo '<div class="col">';
                echo '<div class="card">';
                echo '<img src="uploads/' . htmlspecialchars($row['img3']) . '" class="card-img-top rounded" alt="" style="" title="Image 3">';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';



            if (isset($row['description_of_img1'])) {
                echo '<p >' . htmlspecialchars($row['description_of_img1']) . '</p>';
            }
            if (isset($row['description_of_img2'])) {
                echo '<p>' . htmlspecialchars($row['description_of_img2']) . '</p>';
            }
            if (isset($row['description_of_img3'])) {
                echo '<p>' . htmlspecialchars($row['description_of_img3']) . '</p>';
            }
            if (isset($row['content'])) {
                echo '<p>' . htmlspecialchars($row['content']) . '</p>';
            }
            echo '<br>';
            if (isset($row['date_time'])) {
                echo '<p style="margin-top:0;padding:0;position:absolute;right:0;">Posted on : ' . date('d-M-Y', strtotime($row['date_time'])) . '</p>';
            }
            echo '</div>';
            echo '</div>';
        }

    }
    // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn);
    ?>


    <!-- Modal -->
    <div class="modal fade" id="comment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Comment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin:20px;postion:relative;">
                        <form id="postcontent" name="postcontent" action="postcomment.php" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo htmlspecialchars($current_url ?? '', ENT_QUOTES); ?>"
                                id="myInput" name="url">
                            <input type="hidden" value="<?php echo htmlspecialchars($_GET['id'] ?? '', ENT_QUOTES); ?>"
                                id="myInput" name="srno">
                            <div>
                                <div>
                                    <h5>Content</h5>
                                </div>
                                <div>
                                    <textarea class="form-control form-control-lg" name="content" id="content"
                                        placeholder="Enter Content" style="height:200px;" required></textarea>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div>
                                    <h5>Image 1</h5>
                                </div>
                                <div>
                                    <input type="file" class="form-control form-control-lg" id="myInput" name="image1"
                                        accept="image/*" />
                                </div>
                            </div>
                            <div>
                                <textarea type="text" class="form-control form-control-lg" id="myInput"
                                    name="description1" placeholder="Enter description for image 1"
                                    style="height: 100px;;"></textarea>
                            </div>
                            <hr>
                            <div>
                                <div>
                                    <h5>Image 2</h5>
                                </div>
                                <div>
                                    <input type="file" class="form-control form-control-lg" id="myInput" name="image2"
                                        accept="image/*" />
                                </div>
                            </div>
                            <div>
                                <textarea type="text" class="form-control form-control-lg" id="myInput"
                                    name="description2" placeholder="Enter description for image 2"
                                    style="height: 100px;;"></textarea>
                            </div>
                            <hr>
                            <div>
                                <div>
                                    <h5>Image 3</h5>
                                </div>
                                <div>
                                    <input type="file" class="form-control form-control-lg" id="myInput" name="image3"
                                        accept="image/*" />
                                </div>
                            </div>
                            <div>
                                <textarea type="text" class="form-control form-control-lg" id="myInput"
                                    name="description3" placeholder="Enter description for image 3"
                                    style="height: 100px;;"></textarea>
                            </div>
                            <div style="position:absolute; margin-top:10px; right:50%;left:40%;">
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include 'footer.php' ?>
    </div>
    <!-- <p style="font-size: 500px;">hello world</p> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>