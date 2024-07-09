<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="javascript" href="./script.js">
    <title>About (CybrSecure)</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="icon" href="images/symbol-removebg-preview.png" />
    <style>
        /* Split page into two parts */
        .container {
            display: flex;
            height: 80vh;
            /* Vertical centering */
        }

        .row {
            border-top: 1px solid #ccc;
        }

        /* Left part (form) */
        .left {
            flex: 100px 0 400px;
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

<body style="background-color:rgb(223,240,242)">
    <?php include 'navbar.php' ?>
    <p style="margin-top: 100px"></p>
    <div class="container" style="">
        <div style="align-content:center;">
            <p style="margin-top: -35px;"></p>
            <div class="left" style="">
                <div style="position:relative;">
                    <h4 style="text-align:center;">Meet The Team</h4>
                    <br>
                    <a href="https://www.linkedin.com/in/chinmey-jain/"><img src="team/chinmeyjain.png" alt=""
                            style="border-radius:50%;justify-content:center;height:200px;"></a>
                    <p style="text-align:center;font-weight:bold;">Chinmey Jain</p>
                    <a href="https://www.linkedin.com/in/krishna-modani/"><img src="team/krishnamodani.jpeg" alt=""
                            style="border-radius:50%;justify-content:center;height:200px;"></a>
                    <p style="text-align:center;font-weight:bold;">Krishna Modani</p>
                </div>
            </div>
        </div>

        <div class="right" id="output">
            <div class="" id="output">
                <h3 style="text-align:center;text-decoration:underline;">CybrSecure</h3>
                <h5 style="text-align:center;font-style: italic;">Cybercrime Reporting Portal</h5>
                <br>
                <p style="text-align:justify;">
                    CybrSecure is a comprehensive platform designed to empower individuals and organizations in the
                    fight against cybercrime. Whether you are a victim of online fraud, hacking, identity theft, or any
                    other form of cyber threat, CybrSecure offers a streamlined and secure way to report incidents,
                    track complaints, engage with a community of cybersecurity enthusiasts, and enhance your knowledge
                    about online safety.
                    <br>
                <h6>Key Features</h6>
                <ol>
                    <li>Report Cybercrimes</li>
                    <li>Track Complaints</li>
                    <li>CyberSecurity Forum</li>
                    <li>Awareness &amp; Education</li>
                </ol>
                <br>
                <h6>Technology Stack Used</h6>
                <ol>
                    <li>HTML, CSS &amp; Javascript</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>XAMPP</li>
                </ol>
                </p>
                <br>
                <p>This project has the implementation of HTML, CSS & Javascript. The backend has a Relational Database
                    made with MySQL in XAMPP, backend scripting is done using PHP.</p>
                <p style="text-align:center;font-style:italic;font-weight:bold;">Hope it helps!!!</p>
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