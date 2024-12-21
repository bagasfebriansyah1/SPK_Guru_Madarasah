<?php
    include "koneksi.php";
?>
<html>
<head>
    <title>Hasil | Profile Matching</title>
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


    <!-- Table -->
    <form  role="form" method="post" class="form-inline">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Pendidikan</th>
                  <th scope="col">Pengalaman Mengajar</th>
                  <th scope="col">Kompetensi Pedagogik</th>
                  <th scope="col">Wawancara</th>
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
            <tbody>
                <?php 
                    $query = mysqli_query($koneksi,"SELECT * FROM gapguru");
                    if(mysqli_num_rows($query)>0){ 
                ?>
                <?php
                    $a = 1;
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <th scope="row"><?php echo $a; ?></th>
                  <td><?php echo $data["nama"];?></td>
                  <td><?php echo $data["gappendidikan"];?></td>
                  <td><?php echo $data["gappengalaman"];?></td>
                  <td><?php echo $data["gappedagogik"];?></td>
                  <td><?php echo $data["gapwawancara"];?></td>
                  <td><?php echo $data["gapkedisiplinan"];?></td>
                </tr>
                <?php $a++; } ?>
                <?php } ?>
            </tbody>
        </table>
    </form>
    <!-- /Tabel -->

    <!-- Tabel -->
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Pendidikan</th>
                <th scope="col">Pengalaman Mengajar</th>
                <th scope="col">Kompetensi Pedagogik</th>
                <th scope="col">Wawancara</th>
                <th scope="col">Kedisiplinan</th>
                <th scope="col">NCF (60%)</th>
                <th scope="col">NSF (40%)</th>
                <th scope="col">Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = mysqli_query($koneksi,"SELECT * FROM hasilguru");
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
    <!-- /Tabel -->

    <br><br>

    <!-- Hapus Record -->
    <form  role="form" method="post" action="rangking.php" class="form-inline">
        <div class="form-group mb-2">
            <label class="sr-only"></label>
            <input type="text" readonly class="form-control-plaintext" value="Perankingan">
        </div>
        <button type="submit" name="submitranking" class="btn btn-info">Ranking!</button>
    </form>
    <!-- /Hapus Record -->

    </div>

</body>
</html>