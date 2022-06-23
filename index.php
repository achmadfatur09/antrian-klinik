<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="Indra Styawantoro">

  <!-- Title -->
  <title>Aplikasi Antrian Klinik Drg. Sri Wulansari</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="assets/img/logo.svg" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- Custom Style -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-5">
      <!-- tampilkan pesan selamat datang -->
      <div class="alert alert-light d-flex align-items-center mb-5" role="alert">
        <i class="bi-info-circle text-success me-3 fs-3"></i>
        <div>
          Selamat Datang di <strong>Aplikasi Antrian Klinik Drg. Sri Wulansari</strong>
        </div>
      </div>

      <div class="row gx-5">
        <!-- login admin -->
        <div class="col-lg-4 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="feature-icon-1 bg-gradient mb-4">
                <img src="assets/img/logo.svg" width="90%">
              </div>
              <h5 align="center">Selamat Datang</h5>
              <form action="" method="post" id="formlogin">
                <div class="row">
                  <input type="text" class="rounded-pill px-4 py-2" id="email" placeholder="Masukkan email" autocomplete="off" required name="email">              
                </div><br>
                <div class="row">
                  <input type="password" class="rounded-pill px-4 py-2" id="password" placeholder="Masukkan Password" autocomplete="off" required name="password">
                </div><br>
                <button type="submit" class="btn btn-success rounded-pill px-4 py-2">Sign In</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container-fluid">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2021 - <a href="https://github.com/achmadfatur09" target="_blank" class="text-danger text-decoration-none">Achmad Faturohman</a>. All rights reserved.
      </div>
    </div>
  </footer>


  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <script src="config/firebase.js" type="module"></script>
  <script type="module">

    import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-auth.js"

    const auth = getAuth();

    $('#formlogin').submit((e)=>{
      e.preventDefault();

      const user = {
        email : $('#email').val(), 
        password : $('#password').val()
      };
      
      signInWithEmailAndPassword(auth, user.email, user.password)
        .then((userCredential) => {
          // Signed in
          const user = userCredential.user;
          location.href="dashboard.php";
        })
        .catch((error) => {
          const errorCode = error.code;
          const errorMessage = error.message;
        });

    });

  </script>
</body>

</html>