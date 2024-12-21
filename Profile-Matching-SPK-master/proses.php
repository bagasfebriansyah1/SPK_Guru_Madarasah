<?php
    include "koneksi.php";
?>
<html>
<head>
    <title>Proses | Profile Matching</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang yang lembut */
        }
        .navbar {
            margin-bottom: 20px; /* Menambah jarak di bawah navbar */
        }
        .table {
            background-color: #ffffff; /* Latar belakang tabel putih */
            border: 1px solid #dee2e6; /* Memberi batas di sekitar tabel */
        }
        .thead-dark th {
            background-color: #343a40; /* Warna header tabel */
            color: #fff; /* Teks putih */
        }
        .btn-success, .btn-danger {
            margin-right: 10px; /* Memberi jarak antar tombol */
        }
        form {
            margin-bottom: 20px; /* Memberi jarak bawah pada form */
        }
        .form-inline .form-group {
            margin-right: 15px; /* Jarak antar elemen form */
        }
        th, td {
            text-align: center; /* Teks dalam tabel rata tengah */
        }
        
        .table th, .table td {
        word-wrap: break-word;
        white-space: normal;
        }

        .table th:nth-child(7), .table td:nth-child(7) {
        width: 150px; /* Atur lebar kolom kedisiplinan */
        }

        .table th:nth-child(8), .table td:nth-child(8) {
        width: 80px; /* Atur lebar kolom aksi */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="inputdata.php">Input Data</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="proses.php">Record</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rangking.php">Ranking</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
        </ul>
        </div>
    </nav>
    <!-- /Navbar -->

    <div class="container"><br><br>

    <!-- Hapus Record -->
    <form  role="form" method="post" action="inputdata.php" class="form-inline">
        <div class="form-group mb-2">
            <label class="sr-only"></label>
            <input type="text" readonly class="form-control-plaintext" value="Tambah Calon Guru">
        </div>
        <button type="submit" name="submitdelete" class="btn btn-success">Tambah</button>
    </form>
    <!-- /Hapus Record -->

    <!-- Hapus Record -->
    <form  role="form" method="post" action="recorddelete.php" class="form-inline">
        <div class="form-group mb-2">
            <label class="sr-only"></label>
            <input type="text" readonly class="form-control-plaintext" value="Hapus Semua Record">
        </div>
        <button type="submit" name="submitdelete" class="btn btn-danger">Hapus</button>
    </form>
    <!-- /Hapus Record -->

    <?php
        session_start();
        if (isset($_POST['submitform'])) {

            if(isset($_SESSION['jumlahguru'])){

                $jumlah = $_SESSION['jumlahguru'];
                $nama = array();

                $nilaipendidikan = array();
                $textpendidikan = array();
                $gappendidikan = array();
                $bobotpendidikan = array();

                $nilaipengalaman = array();
                $textpengalaman = array();
                $gappengalaman = array();
                $bobotpengalaman = array();

                $nilaipedagogik = array();
                $textpedagogik = array();
                $gappedagogik = array();
                $bobotpedagogik = array();

                $nilaiwawancara = array();
                $textwawancara = array();
                $gapwawancara = array();
                $bobotwawancara = array();

                $nilaikedisiplinan = array();
                $textkedisiplinan = array();
                $gapkedisiplinan = array();
                $bobotkedisiplinan = array();

                $ncfguru = array();
                $nsfguru = array();
                $hasilguru = array();

                for($a=1;$a<=$jumlah;$a++) {

        	       $nama[$a] = $_POST['namasiswa'.$a];
                   $nilaipendidikan[$a] = $_POST['pendidikan'.$a];
                   $nilaipengalaman[$a] = $_POST['pengalaman'.$a];
                   $nilaipedagogik[$a] = $_POST['pedagogik'.$a];
                   $nilaiwawancara[$a] = $_POST['wawancara'.$a];
                   $nilaikedisiplinan[$a] = $_POST['kedisiplinan'.$a];

                   $sql = mysqli_query($koneksi,"INSERT INTO guru (nama, pendidikan, pengalaman, pedagogik, wawancara, kedisiplinan ) VALUES('$nama[$a]','$nilaipendidikan[$a]','$nilaipengalaman[$a]','$nilaipedagogik[$a]','$nilaiwawancara[$a]','$nilaikedisiplinan[$a]')") or die (mysqli_error($koneksi));

                }

                for($a=1;$a<=$jumlah;$a++) {

                    if ($nilaipendidikan[$a] == "1"){
                        $textpendidikan[$a] = "D3";
                    } elseif ($nilaipendidikan[$a] == "2") {
                        $textpendidikan[$a] = "D4/S1";
                    } elseif ($nilaipendidikan[$a] == "3") {
                        $textpendidikan[$a] = "S2";
                    } else {
                        $textpendidikan[$a] = "S3";
                    }

                    if ($nilaipengalaman[$a] == "1"){
                        $textpengalaman[$a] = "Kurang dari 1 tahun";
                    } elseif ($nilaipengalaman[$a] == "2") {
                        $textpengalaman[$a] = "1-2 tahun";
                    } elseif ($nilaipengalaman[$a] == "3") {
                        $textpengalaman[$a] = "3-4 tahun";
                    } elseif ($nilaipengalaman[$a] == "4") {
                        $textpengalaman[$a] = "5-6 tahun";                        
                    } else {
                        $textpengalaman[$a] = "Lebih dari 6 tahun";
                    }

                    if ($nilaipedagogik[$a] == "1"){
                        $textpedagogik[$a] = "Sangat Rendah";
                    } elseif ($nilaipedagogik[$a] == "2") {
                        $textpedagogik[$a] = "Rendah";
                    } elseif ($nilaipedagogik[$a] == "3") {
                        $textpedagogik[$a] = "Cukup";
                    } elseif ($nilaipedagogik[$a] == "4") {
                        $textpedagogik[$a] = "Baik";
                    } else {
                        $textpedagogik[$a] = "Sangat Baik";
                    }

                    if ($nilaiwawancara[$a] == "1"){
                        $textwawancara[$a] = "Kurang Memuaskan";
                    } elseif ($nilaiwawancara[$a] == "2") {
                        $textwawancara[$a] = "Cukup Memuaskan";
                    } elseif ($nilaiwawancara[$a] == "3") {
                        $textwawancara[$a] = "Memuaskan";
                    } elseif ($nilaiwawancara[$a] == "4") {
                        $textwawancara[$a] = "Baik";
                    } else {
                        $textwawancara[$a] = "Sangat Baik";
                    }

                    if ($nilaikedisiplinan[$a] == "1"){
                        $textkedisiplinan[$a] = "Sangat Buruk";
                    } elseif ($nilaikedisiplinan[$a] == "2") {
                        $textkedisiplinan[$a] = "Buruk";
                    } elseif ($nilaikedisiplinan[$a] == "3") {
                        $textkedisiplinan[$a] = "Cukup";
                    } elseif ($nilaikedisiplinan[$a] == "4") {
                        $textkedisiplinan[$a] = "Baik";
                    } else {
                        $textkedisiplinan[$a] = "Sangat Baik";
                    }

                    $sql = mysqli_query($koneksi,"INSERT INTO keteranganguru (nama, ket_pendidikan, ket_pengalaman, ket_pedagogik, ket_wawancara, ket_kedisiplinan) VALUES('$nama[$a]','$textpendidikan[$a]','$textpengalaman[$a]','$textpedagogik[$a]','$textwawancara[$a]', '$textkedisiplinan[$a]')") or die (mysqli_error($koneksi));

                }

                for($a=1;$a<=$jumlah;$a++) {
                    
                    $nama[$a] = $_POST['namasiswa'.$a];
                    $gappendidikan[$a] = $nilaipendidikan[$a] - 5;
                    $gappengalaman[$a] = $nilaipengalaman[$a] - 5;
                    $gappedagogik[$a] = $nilaipedagogik[$a] - 5;
                    $gapwawancara[$a] = $nilaiwawancara[$a] - 5;
                    $gapkedisiplinan[$a] = $nilaikedisiplinan[$a] - 5;

                    $sql = mysqli_query($koneksi,"INSERT INTO gapguru (nama, gappendidikan, gappengalaman, gappedagogik, gapwawancara, gapkedisiplinan) VALUES('$nama[$a]','$gappendidikan[$a]','$gappengalaman[$a]','$gappedagogik[$a]','$gapwawancara[$a]', '$gapkedisiplinan[$a]')") or die (mysqli_error($koneksi));

                }

                for($a=1;$a<=$jumlah;$a++) {

                    if ($gappendidikan[$a] == "0"){
                        $bobotpendidikan[$a] = "5";
                    } elseif ($gappendidikan[$a] == "1") {
                        $bobotpendidikan[$a] = "4.5";
                    } elseif ($gappendidikan[$a] == "-1") {
                        $bobotpendidikan[$a] = "4";
                    } elseif ($gappendidikan[$a] == "2") {
                        $bobotpendidikan[$a] = "3.5";
                    } elseif ($gappendidikan[$a] == "-2") {
                        $bobotpendidikan[$a] = "3";
                    } elseif ($gappendidikan[$a] == "3") {
                        $bobotpendidikan[$a] = "2.5";
                    } elseif ($gappendidikan[$a] == "-3") {
                        $bobotpendidikan[$a] = "2";
                    } elseif ($gappendidikan[$a] == "4") {
                        $bobotpendidikan[$a] = "1.5";
                    } else {
                        $bobotpendidikan[$a] = "1";
                    }

                    if ($gappengalaman[$a] == "0"){
                        $bobotpengalaman[$a] = "5";
                    } elseif ($gappengalaman[$a] == "1") {
                        $bobotpengalaman[$a] = "4.5";
                    } elseif ($gappengalaman[$a] == "-1") {
                        $bobotpengalaman[$a] = "4";
                    } elseif ($gappengalaman[$a] == "2") {
                        $bobotpengalaman[$a] = "3.5";
                    } elseif ($gappengalaman[$a] == "-2") {
                        $bobotpengalaman[$a] = "3";
                    } elseif ($gappengalaman[$a] == "3") {
                        $bobotpengalaman[$a] = "2.5";
                    } elseif ($gappengalaman[$a] == "-3") {
                        $bobotpengalaman[$a] = "2";
                    } elseif ($gappengalaman[$a] == "4") {
                        $bobotpengalaman[$a] = "1.5";
                    } else {
                        $bobotpengalaman[$a] = "1";
                    }

                    if ($gappedagogik[$a] == "0"){
                        $bobotpedagogik[$a] = "5";
                    } elseif ($gappedagogik[$a] == "1") {
                        $bobotpedagogik[$a] = "4.5";
                    } elseif ($gappedagogik[$a] == "-1") {
                        $bobotpedagogik[$a] = "4";
                    } elseif ($gappedagogik[$a] == "2") {
                        $bobotpedagogik[$a] = "3.5";
                    } elseif ($gappedagogik[$a] == "-2") {
                        $bobotpedagogik[$a] = "3";
                    } elseif ($gappedagogik[$a] == "3") {
                        $bobotpedagogik[$a] = "2.5";
                    } elseif ($gappedagogik[$a] == "-3") {
                        $bobotpedagogik[$a] = "2";
                    } elseif ($gappedagogik[$a] == "4") {
                        $bobotpedagogik[$a] = "1.5";
                    } else {
                        $bobotpedagogik[$a] = "1";
                    }

                    if ($gapwawancara[$a] == "0"){
                        $bobotwawancara[$a] = "5";
                    } elseif ($gapwawancara[$a] == "1") {
                        $bobotwawancara[$a] = "4.5";
                    } elseif ($gapwawancara[$a] == "-1") {
                        $bobotwawancara[$a] = "4";
                    } elseif ($gapwawancara[$a] == "2") {
                        $bobotwawancara[$a] = "3.5";
                    } elseif ($gapwawancara[$a] == "-2") {
                        $bobotwawancara[$a] = "3";
                    } elseif ($gapwawancara[$a] == "3") {
                        $bobotpendidikan[$a] = "2.5";
                    } elseif ($gapwawancara[$a] == "-3") {
                        $bobotwawancara[$a] = "2";
                    } elseif ($gapwawancara[$a] == "4") {
                        $bobotwawancara[$a] = "1.5";
                    } else {
                        $bobotwawancara[$a] = "1";
                    }

                    if ($gapkedisiplinan[$a] == "0") {
                        $bobotkedisiplinan[$a] = "5";
                    } elseif ($gapkedisiplinan[$a] == "1") {
                        $bobotkedisiplinan[$a] = "4.5";
                    } elseif ($gapkedisiplinan[$a] == "-1") {
                        $bobotkedisiplinan[$a] = "4";
                    } elseif ($gapkedisiplinan[$a] == "2") {
                        $bobotkedisiplinan[$a] = "3.5";
                    } elseif ($gapkedisiplinan[$a] == "-2") {
                        $bobotkedisiplinan[$a] = "3";
                    } elseif ($gapkedisiplinan[$a] == "3") {
                        $bobotkedisiplinan[$a] = "2.5";
                    } elseif ($gapkedisiplinan[$a] == "-3") {
                        $bobotkedisiplinan[$a] = "2";
                    } elseif ($gapkedisiplinan[$a] == "4") {
                        $bobotkedisiplinan[$a] = "1.5";
                    } else {
                        $bobotkedisiplinan[$a] = "1";
                    }
                    
                    $ncfguru[$a] = (($bobotpendidikan[$a]) + ($bobotpengalaman[$a])+ (($bobotpedagogik[$a])))/3;
                    $nsfguru[$a] = (($bobotwawancara[$a]) + ($bobotkedisiplinan[$a]))/2;
                    $hasilguru[$a] = (0.6 * $ncfguru[$a]) + (0.4 * $nsfguru[$a]);

                    $sql = mysqli_query($koneksi,"INSERT INTO hasilguru (nama, bobotpendidikan, bobotpengalaman, bobotpedagogik, bobotwawancara, bobotkedisiplinan, ncf, nsf, hasil) VALUES('$nama[$a]','$bobotpendidikan[$a]','$bobotpengalaman[$a]','$bobotpedagogik[$a]','$bobotwawancara[$a]', '$bobotkedisiplinan[$a]', '$ncfguru[$a]','$nsfguru[$a]','$hasilguru[$a]')") or die (mysqli_error($koneksi));

                }

    ?>

    <!-- TUTUP -->
    <?php
            }
        }
    ?>
    <!-- /TUTUP -->
    <br><br>
    <!-- Table -->
    <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">pendidikan</th>
              <th scope="col">Pengalaman Mengajar</th>
              <th scope="col">Kompetensi Pedagogik</th>
              <th scope="col">wawancara</th>
              <th scope="col">Kedisiplinan</th>
              <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query1 = mysqli_query($koneksi,"SELECT * FROM keteranganguru");
                if(mysqli_num_rows($query1)>0){ 
            ?>
            <?php
                $a = 1;
                while($data = mysqli_fetch_array($query1)){
            ?>
            <tr>
                <th scope="row"><?php echo $a; ?></th>
                <td><?php echo $data["nama"];?></td>
                <td><?php echo $data["ket_pendidikan"];?></td>
                <td><?php echo $data["ket_pengalaman"];?></td>
                <td><?php echo $data["ket_pedagogik"];?></td>
                <td><?php echo $data["ket_wawancara"];?></td>
                <td><?php echo $data["ket_kedisiplinan"];?></td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                   <button type="button" class="btn btn-danger" 
                    onclick="window.location.href='delete.php?id=<?php echo $data['nama']; ?>'">Hapus</button>
                </div>
            </td>

                </td>
            </tr>
            <?php $a++; } ?>
            <?php } ?>
            </tbody>
    </table>
    <!-- /Tabel -->


    <br><br>


    <!-- Table -->
    <form  role="form" method="post" action="hasil.php" class="form-inline">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">pendidikan</th>
                  <th scope="col">Pengalaman Mengajar</th>
                  <th scope="col">Kompetensi Pedagogik</th>
                  <th scope="col">wawancara</th>
                  <th scope="col">Kedisiplinan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = mysqli_query($koneksi,"SELECT * FROM guru");
                    if(mysqli_num_rows($query)>0){ 
                ?>
                <?php
                    $a = 1;
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <th scope="row"><?php echo $a; ?></th>
                  <td><?php echo $data["nama"];?></td>
                  <td><?php echo $data["pendidikan"];?></td>
                  <td><?php echo $data["pengalaman"];?></td>
                  <td><?php echo $data["pedagogik"];?></td>
                  <td><?php echo $data["wawancara"];?></td>
                  <td><?php echo $data["kedisiplinan"];?></td>
                </tr>
                <?php $a++; } ?>
                <?php } ?>
            </tbody>
            <thead class="thead-dark">
                <tr>
                  <th scope="col">GAP</th>
                  <th scope="col"></th>
                  <th scope="col">5</th>
                  <th scope="col">5</th>
                  <th scope="col">5</th>
                  <th scope="col">5</th>
                  <th scope="col">5</th>
                </tr>
            </thead>
        </table>
        <button type="submit" name="hitunggap" class="btn btn-primary mb-2">Hitung</button>
    </form>
    <!-- /Tabel -->

    </div>

</body>
</html>