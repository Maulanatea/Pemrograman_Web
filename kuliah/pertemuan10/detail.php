<?php 
require 'functions.php';

//ambil id dari url
$id = $_GET['id'];

//query siswa berdasarkan id
$s = query("SELECT * FROM siswa WHERE id = $id");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
</head>
<body>
    <h3>Detail Siswa</h3>

    <ul>
        <li><img src="img/<?= $s['gambar']; ?>" width='60'></li>
        <li>NRP : <?= $s['nrp']; ?></li>
        <li>Nama : <?= $s['nama']; ?></li>
        <li>Email : <?= $s['email']; ?></li>
        <li>Jurusan : <?= $s['jurusan']; ?></li>
        <li><a href="">ubah</a> | <a href="">hapus</a></li>
        <li><a href="latihan3.php">Kembali ke daftar Siswa</a></li>
    </ul>
    
</body>
</html>