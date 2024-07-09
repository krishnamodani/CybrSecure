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
    <title>Forum (CybrSecure)</title>
    <link rel="icon" href="images/symbol-removebg-preview.png" />
</head>

<body style="background-color:rgb(223,240,242);">
    <?php include 'navbar.php' ?>

    <p style="margin-top: 100px"></p>
    <p style="position:absolute;margin-buttom:10px;font-weight:bold;left:1%;">Welcome :
        <?php echo $_SESSION['firstname'], " ", $_SESSION['lastname'] ?>
    </p>

    <div class="btn-group-end" style="position:absolute;right:2%">
        <a href="mypage.php" class="btn btn-primary">My Post</a>
        <a href="newpost.php" class="btn btn-primary">New Post</a>
    </div>

    <!-- forum blogs -->
    <div class="row row-cols-1 row-cols-md-1 g-4" style="margin: 15px; margin-top: 0">
        <p style="margin-top: 0">&nbsp;</p>
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
        $sqlCount = "SELECT COUNT(*) AS totalEntries FROM forum ";
        $countResult = $conn->query($sqlCount);
        $rowCount = $countResult->fetch_assoc();
        $totalEntries = $rowCount['totalEntries'];
        $totalPages = ceil($totalEntries / PER_PAGE); // Calculate total pages
        $offset = ($page - 1) * PER_PAGE;

        // Fetching data from the forum table
        $sql = "SELECT srno, title, LEFT(content, 900) AS truncated_content, img1, date_time FROM forum ORDER BY date_time DESC";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Generating HTML content based on fetched data
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="fullpost.php?title=' . urlencode($row['title']) . '&id=' . $row['srno'] . '">';
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
            echo '</a>';
        }

        // Free result set
        mysqli_free_result($result);

        // Close connection
        mysqli_close($conn);
        ?>

    </div>


    <?php include 'pages.php' ?>
    </div>
    <?php include 'footer.php' ?>
    <!-- <p style="font-size: 500px;">hello world</p> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>