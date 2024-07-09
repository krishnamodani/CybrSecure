<!-- Navigation bar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php"><img src="images/logo-removebg-preview.png" alt="logo" height="50px" />
    <div >
      <a class="forumBtn" href="/checksessionforum.php">Forum</a>
      <a href="logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"
      style="color:white;font-size:1.2rem;position:absolute;right:2%;top:42%;"></i></a>
    </div>

      <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"
              style="">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="" onclick="checkSession()">File a
              Complaint</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="trackcomplaint.php" style="">Track a Complaint</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#" style="">Resources</a>
          </li> -->
          <li class="nav-items">
            <a href="./insertimgtosql.php" class="nav-link">Upload Image</a>
          </li>
        </ul>
      </div>
  </div>
</nav>

<!-- Modal for sign in-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Sign In</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="signIn" name="signIn" action="signin.php" method="post">
          <div class="d-flex flex-row align-items-center mb-4" style="margin-left:25%;">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="Email" name="Email" placeholder="name@example.com">
              <label class="form-label" for="floatingInput">Email address</label>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4" style="margin-left:25%;">
            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
            <div class="form-floating">
              <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
              <label class="form-label" for="floatingPassword">Password</label>
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

<script>
  function checkSession() {
    // Make AJAX request to PHP script
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "checksessioncomplaint.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseText;
        if (response == "available") {
          // Redirect to page 1 if session data is available
          window.location.href = "complaint.php";
        } else {
          // Open modal if session data is not available
          var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
          myModal.show();
        }
      }
    };
    xhr.send();
  }
</script>
