<?php
    include "koneksi.php";
?>
<html>
<head>
    <title>Ranking | Profile Matching</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <h5>Ranking</h5>
    <!-- Tabel Ranking -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">Nama</th>
                <th scope="col">Bobot Pendidikan</th>
                <th scope="col">Bobot Pengalaman Mengajar</th>
                <th scope="col">Bobot Kompetensi Pedagogik</th>
                <th scope="col">Bobot Wawancara</th>
                <th scope="col">Bobot Kedisiplinan</th>
                <th scope="col">NCF (60%)</th>
                <th scope="col">NSF (40%)</th>
                <th scope="col">Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = mysqli_query($koneksi,"SELECT * FROM hasilguru ORDER BY hasil DESC");
                if(mysqli_num_rows($query)>0){ 
            ?>
            <?php
                $a = 1;
                while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <th scope="row"><?php echo $a; ?></th>
                <td><?php echo $data["nama"];?></td>
                <td><?php echo $data["bobotpendidikan"];?></td>
                <td><?php echo $data["bobotpengalaman"];?></td>
                <td><?php echo $data["bobotpedagogik"];?></td>
                <td><?php echo $data["bobotwawancara"];?></td>
                <td><?php echo $data["bobotkedisiplinan"];?></td>
                <td><?php echo $data["ncf"];?></td>
                <td><?php echo $data["nsf"];?></td>
                <td><?php echo $data["hasil"];?></td>
            </tr>
            <?php $a++; } ?>
            <?php } ?>
        </tbody>
    </table>
    <!-- /Tabel Ranking --><br>

    <?php 
        $query = mysqli_query($koneksi,"SELECT * FROM hasilguru ORDER BY hasil DESC LIMIT 1");
        if(mysqli_num_rows($query)>0){ 
    ?>
    <?php
        $a = 1;
        while($data = mysqli_fetch_array($query)){
    ?>

    <div class="alert alert-primary" role="alert">
        Calon Guru dengan nama <b style="font-size: 15pt;"><?php echo $data["nama"];?></b> menjadi urutan pertama dalam pemilihan Guru Honorer MA MANARATUL ISLAM JAKARTA.
    </div>
    <!-- <h4>Guru dengan nama <mark><?php echo $data["nama"];?></mark> menjadi urutan pertama dalam pemilihan Guru Honorer MA MANARATUL ISLAM JAKARTA.</h4> -->

    <?php $a++; } ?>
    <?php } ?>

    </div>

</body>
</html>