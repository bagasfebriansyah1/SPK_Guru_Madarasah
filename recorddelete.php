<?php
    include "koneksi.php";

    if (isset($_POST['submitdelete'])) {

    $sql=mysqli_query($koneksi,"DELETE FROM guru;") or die($conn);
    $sql1=mysqli_query($koneksi,"DELETE FROM keteranganguru;") or die($conn);
    $sql2=mysqli_query($koneksi,"DELETE FROM gapguru;") or die($conn);
    $sql3=mysqli_query($koneksi,"DELETE FROM hasilguru;") or die($conn);
    if ($sql && $sql1) {

		echo "<script>window.location='proses.php'</script>";
    }
	}
?>
