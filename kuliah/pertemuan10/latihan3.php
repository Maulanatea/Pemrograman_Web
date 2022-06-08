<?php 
require 'functions.php';
$siswa = query("SELECT * FROM siswa");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
        <h3>Daftar Mahasiswa</h3>

        <a href="tambah.php">Tambah Data Siswa</a>
        <br><br>

        <table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
            
            <?php $i = 1;
            foreach( $siswa as $s ) : ?>
            <tr>
                <th><?= $i++; ?></th>
                <th><img src="img/<?= $s['gambar']; ?>" width='60'></th>
                <th><?= $s['nama']; ?></th>
                <th>
                    <a href="detail.php?id=<?= $s['id']; ?>">lihat detail</a>
                </th>
            </tr>
            <?php endforeach; ?>

        </table>
</body>
</html>