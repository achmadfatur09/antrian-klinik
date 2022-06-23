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
    <div class="container pt-4">
      <div class="row justify-content-lg-center">
        <!-- <div class="col-lg-5 mb-4"> -->
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
                  <li class="breadcrumb-item" aria-current="page">News Content</li>
                </ol>
              </nav>
            </div>
          </div>

          <div class="card border-0 shadow-sm">
            <div class="card-body text-center d-grid p-5">
              <h5>Content</h5>
              <div class="mb-2">
                <form action="" method="post" id="forminput">
                  <div class="row">
                    <input type="text" class="rounded-pill px-2" id="title" placeholder="Masukkan Judul" autocomplete="off" required name="title"><br><br>
                  </div>
                  <br>
                  <div class="row">
                    <input type="file" id="image" name="image" required accept="image/*"><br><br>
                  </div>
                  <div class="row">
                    <textarea cols="50" rows="10" type="text" class="container" id="description" placeholder="Tulis Content" autocomplete="off" required name="description"></textarea>
                  </div>
                  <br>
                  <button class="btn btn-success btn-block rounded-pill mb-2">
                    <i class="bi-person-plus fs-4 me-2"></i> Post
                  </button>
                  <a href="../dashboard.php" class="btn btn-success btn-block rounded-pill mb-2">
                    <i class="bi-house-fill fs-4 me-2"></i> Kembali Dashboard
                  </a>
                </form>
            </div>
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
    import { getDatabase, ref, push } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-database.js";
    import { getStorage, ref as refStorage, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-storage.js";

    $('#forminput').submit( async (e)=>{
      e.preventDefault();

      let news = {
        title : $('#title').val(), 
        description : $('#description').val(),
        date: waktuIndonesiaSekarang()
      };

      const image = await uploadAndContinue($('#image')[0].files[0])
      if (image) {
        news = {...news, image: image}
        insertNews(news);
        $('#forminput')[0].reset();
      }

    });


    const uploadAndContinue = async (file) => {
      const storage = getStorage();

      const d = new Date();
      const referStorage = refStorage(storage, 'news/' + d.getTime()+file.name);

      const upload = await uploadBytes(referStorage, file);

      if (upload) {
        return await getDownloadURL(referStorage);
      }

      return false;
    };


    function insertNews(news) {
      const db = getDatabase();
      push(ref(db, 'news/'), news);
    };

    function waktuIndonesiaSekarang(){
      var date = new Date();
      var tahun = date.getFullYear();
      var bulan = date.getMonth();
      var tanggal = date.getDate();
      var hari = date.getDay();
      var jam = date.getHours();
      var menit = date.getMinutes();
      var detik = date.getSeconds();
      
      switch(hari) {
        case 0: hari = "Minggu"; break;
        case 1: hari = "Senin"; break;
        case 2: hari = "Selasa"; break;
        case 3: hari = "Rabu"; break;
        case 4: hari = "Kamis"; break;
        case 5: hari = "Jum'at"; break;
        case 6: hari = "Sabtu"; break;
      }
      switch(bulan) {
        case 0: bulan = "Januari"; break;
        case 1: bulan = "Februari"; break;
        case 2: bulan = "Maret"; break;
        case 3: bulan = "April"; break;
        case 4: bulan = "Mei"; break;
        case 5: bulan = "Juni"; break;
        case 6: bulan = "Juli"; break;
        case 7: bulan = "Agustus"; break;
        case 8: bulan = "September"; break;
        case 9: bulan = "Oktober"; break;
        case 10: bulan = "November"; break;
        case 11: bulan = "Desember"; break;
      }

      return hari + ", " + tanggal + " " + bulan + " " + tahun;
      // var tampilWaktu = "Jam: " + jam + ":" + menit + ":" + detik;
      // console.log(tampilTanggal);
      // console.log(tampilWaktu);
      // return tampilTanggal;
    }

  </script>
</body>

</html>
