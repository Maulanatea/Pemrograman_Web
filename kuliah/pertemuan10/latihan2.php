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

        <table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            
            <?php $i = 1;
            foreach( $siswa as $s ) : ?>
            <tr>
                <th><?= $i++; ?></th>
                <th><img src="img/<?= $s['gambar']; ?>" width='60'></th>
                <th><?= $s['nrp']; ?></th>
                <th><?= $s['nama']; ?></th>
                <th><?= $s['email']; ?></th>
                <th><?= $s['jurusan']; ?></th>
                <th>
                    <a href="">ubah</a> | <a href="">hapus</a>
                </th>
            </tr>
            <?php endforeach; ?>

        </table>
</body>
</html>