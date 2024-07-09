<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="javascript" href="./script.js">
  <title>CybrSecure</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
  <link rel="icon" href="images/symbol-removebg-preview.png" />
  <style>
    .newscontainer {
      display: inline;
    }

    .news-item {
      border-bottom: 1px solid #ccc;
      padding: 20px;
      overflow: hidden;
    }

    .news-item img {
      float: left;
      margin-right: 20px;
      width: 200px;
      /* Adjust the image width as needed */
      height: auto;
      border-radius: 5px;
      vertical-align: middle;
    }

    .news-item-content {
      overflow: hidden;
    }

    .news-item h4 {
      margin-top: 0;
    }

    .news-link {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>

<body style="background-color:rgb(223,240,242)">

  <?php include 'navbar.php' ?>

  <!-- carousel -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="top: 35px;width: 99.2vw;
    height: 97vh">
    <!-- <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div> -->
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="4000">
        <img src="hero_image/hero1.png" class="d-block w-100" alt="..." style="height:97vh;max-width:99.2vw" />
      </div>
      <div class="carousel-item" data-bs-interval="4000">
        <img src="hero_image/hero2.png" class="d-block w-100" alt="..." style="height:97vh;max-width:99.2vw" />
      </div>
      <div class="carousel-item" data-bs-interval="4000">
        <img src="hero_image/hero3.png" class="d-block w-100" alt="..." style="height:97vh;max-width:99.2vw" />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div style="margin-top:80px;">
    <h2 style='text-align:center;'>News</h2>
    <div class="newscontainer" style="margin:20px;padding:10px;">

      <?php
      $api_key = "db2d82f3467d431196eccd09cd3befcb"; // Enter your Google News API key here
      
      if (empty($api_key)) {
        echo "<p>Please enter your Google News API key.</p>";
      } else {
        $keyword = "cybersecurity"; // Specify the keyword for cybersecurity news
        $url = "https://newsapi.org/v2/everything?q=$keyword&sortBy=publishedAt&apiKey=$api_key";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data && isset($data['articles'])) {
          // Shuffle the array of articles randomly
          shuffle($data['articles']);
          // Limit to the first 15 articles
          $articles = array_slice($data['articles'], 0, 15);
          foreach ($articles as $article) {
            $title = $article['title'];
            $content = $article['description'];
            $publisher = $article['source']['name'];
            $image = $article['urlToImage'];
            $news_url = $article['url'];

            echo "<a href='$news_url' class='news-link'>";
            echo "<div class='news-item'>";
            if ($image) {
              echo "<img src='$image' alt='Article Image'>";
            }
            echo "<div class='news-item-content'>";
            echo "<h4>$title</h4>";
            echo "<p>$content</p>";
            echo "<p>Publisher: $publisher</p>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
          }
        } else {
          echo "<p>No articles found.</p>";
        }
      }
      ?>

    </div>
  </div>

  <!-- Grid cards -->
  <h3 style="text-align:center;">Social Awareness</h3>
  <div class="row row-cols-1 row-cols-md-4 g-4" style="margin: 10px;margin-top:30px;">
    <?php

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'cybrsecure');

    // Check if the connection was successful
    if (!$conn) {
      die('Could not connect to the database: ' . mysqli_connect_error());
    }

    // Fetch images from the database
    $query = "SELECT * FROM images";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $imagePath = $row['image_path'];
        $imageName = $row['image_name'];
        $imageDescription = $row['image_description'];

        // HTML structure for image display
        echo '<div id="col" class="col">';
        echo '<div class="card h-100">';
        echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . $imageName . '" />';
        echo '<div id="homepage-flyers" class="card-body" style="width:100%;height:100%;">';
        // echo '<h5 class="card-title">' . $imageName . '</h5>';
        echo '<p class="card-text" style="text-align: center;vertical-align: middle;color: white;font-size:1.5rem;">' . $imageDescription . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }

      // Free result set
      mysqli_free_result($result);
    } else {
      echo "No images found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </div>

  <?php include 'footer.php' ?>
  </div>
  <!-- <p style="font-size: 500px;">hello world</p> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>