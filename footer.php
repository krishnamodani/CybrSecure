<!-- footer -->
<div class="container" style="
          border: none;
          outline: none;
          padding: 20px;
          max-width: 100%;
          background-color:  rgb(51, 45, 45);
          margin-top: 20px;
          height: 250px;
          bottom:0;
          display:grid;
        ">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item">
        <a href="./index.php" class="nav-link px-2 text-muted">
          <p style="color: white">Home</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link px-2 text-muted">
          <p style="color: white" onclick="checkSession()">Report</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="./trackcomplaint.php" class="nav-link px-2 text-muted">
          <p style="color: white">Track</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="./checksessionforum.php" class="nav-link px-2 text-muted">
          <p style="color: white">Forum</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="about.php" class="nav-link px-2 text-muted">
          <p style="color: white">About</p>
        </a>
      </li>
    </ul>
    <ul class="nav justify-content-center pb-0 mb-0">
      <li class="nav-item">
        <a href="./index.php" class="nav justify-content-center pb-3 mb-3 nav-link px-2 text-muted">
          <p style="color: white">&copy CybrSecure</p>
        </a>
      </li>
    </ul>
  </footer>
</div>

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