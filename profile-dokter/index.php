<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  
  <!-- Title -->
  <title>Aplikasi Antrian Klinik Drg. Sri Wulansari</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/logo.svg" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-5">
      <div class="row justify-content-lg-center">
        <div class="col-lg-5 mb-4">
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Nomor Antrian</h1>
            </div>
            <!-- breadcrumbs -->
            <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
              <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard.php"><i class="bi-house-fill text-success"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                  <li class="breadcrumb-item" aria-current="page">Profile Doctor</li>
                </ol>
              </nav>
            </div>
          </div>

          <div class="card border-0 shadow-sm">
            <form action="" method="post" id="formdoctor">
              <div class="card-body text-center d-grid p-5">
                <h5>Dokter</h5>
                <div class="mb-2">
                  <input type="text" class="rounded-pill px-4 py-2" id="nama" placeholder="Masukkan Nama" autocomplete="off" required name="nama">
                  <input type="text" class="rounded-pill px-4 py-2" id="username" placeholder="Masukkan Username" autocomplete="off" required name="username">
                  <input type="text" class="rounded-pill px-4 py-2" id="alumni" placeholder="Masukkan Alumni" autocomplete="off" required name="alumni">

                  <select name="pekerjaan" id="pekerjaan" required class="rounded-pill px-4 py-2">
                    <option value="">Spesialis Dokter</option>
                    <option value="Dokter Umum">Dokter Umum</option>
                    <option value="Dokter Anak">Dokter Anak</option>
                    <option value="Dokter Gigi">Dokter Gigi</option>
                  </select>
                  <br>
                  <select name="tempat_praktik" id="tempat_praktik" required class="rounded-pill px-4 py-2">
                    <option value="Drg. Sri Wulansari">Drg. Sri Wulansari</option>
                  </select>

                  <!-- <input type="text" class="rounded-pill px-4 py-2" id="tempat_praktik" placeholder="Drg. Sri Wulansari" autocomplete="off" required name="tempat_praktik"> -->

                  <input type="text" class="rounded-pill px-4 py-2" id="no_str" placeholder="Masukkan No. STR" autocomplete="off" required name="no_str">
                  <input type="email" class="rounded-pill px-4 py-2" id="email" placeholder="Masukkan Email" autocomplete="off" required name="email">
                  <input type="password" class="rounded-pill px-4 py-2" id="password" min="6" placeholder="Masukkan Password" autocomplete="off" required name="password">
                  <div class="row">
                    <input type="file" id="photo" name="photo" required accept="image/*"><br><br>
                  </div>
                </div>
                <!-- button pengambilan nomor antrian -->
                <button type="submit" class="btn btn-success btn-block rounded-pill mb-2">
                  <i class="bi-person-plus fs-4 me-2"></i> Register
                </button>
                <a href="../dashboard.php" class="btn btn-success btn-block rounded-pill mb-2">
                  <i class="bi-house-fill fs-4 me-2"></i> Kembali Dashboard
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container">
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

  <script src="../config/firebase.js" type="module"></script>
  <script type="module">

    import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-auth.js"
    import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-database.js";
    import { getStorage, ref as refStorage, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-storage.js";

    $('#formdoctor').submit( async (e)=>{
      e.preventDefault();

      let docter = {
        nama : $('#nama').val(),
        username : $('#username').val(), 
        alumni : $('#alumni').val(), 
        pekerjaan : $('#pekerjaan').val(), 
        tempat_praktik : $('#tempat_praktik').val(), 
        no_str : $('#no_str').val(), 
        email : $('#email').val(), 
      };

      if(createUser(docter.email, $('#password').val(), docter )) $('#formdoctor')[0].reset();

    });

    function createUser(email, password, docter) {
      const auth = getAuth();
      createUserWithEmailAndPassword(auth, email, password)
        .then(async (userCredential) => {
          const user = userCredential.user;

          const photo = await uploadAndContinue($('#photo')[0].files[0]);

          if (photo) {
            docter = {...docter, photo:photo};
  
            insertDocter(user.uid, docter)
          }
        })
        .catch((error) => {
          const errorCode = error.code;
          const errorMessage = error.message;
          console.log(errorCode, errorMessage);
        });
    }

    function insertDocter(uid, docter) {
      const db = getDatabase();
      set(ref(db, 'docter/'+ uid), docter);
    }

    const uploadAndContinue = async (file) => {
      const storage = getStorage();

      const d = new Date();
      const referStorage = refStorage(storage, 'docter/' + d.getTime()+file.name);

      const upload = await uploadBytes(referStorage, file);

      if (upload) {
        return await getDownloadURL(referStorage);
      }

      return false;
    };

  </script>
</body>

</html>