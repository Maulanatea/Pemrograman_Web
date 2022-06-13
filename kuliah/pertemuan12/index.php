<?php 
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$siswa = query("SELECT * FROM siswa");

//ketika tombol cari di klik
if (isset($_POST['cari'])) {
    $siswa = cari($_POST['keyword']);
}
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
    <a href="logout.php">Logout</a>
        <h3>Daftar Mahasiswa</h3>

        <a href="tambah.php">Tambah Data Siswa</a>
        <br><br>

        <form action="" method="POST">
            <input type="text" name="keyword" placeholder="cari atuu.." autocomplete="off" autofocus >
            <button type="submit" name="cari" >cari</button>
        </form>
        <br>

        <table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

            <?php if(empty($siswa)) : ?>
            <tr>
                <td colspan="4" >
                   <p style="color: red; font-style: italic;"> Data Siswa Tidak ditemukan...!!</p>
                </td>
            </tr>
            <?php endif; ?>
            
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