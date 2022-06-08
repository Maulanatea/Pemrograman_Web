<?php 
// koneksi ke DB & pilih database
$conn = mysqli_connect('localhost', 'root', '', 'sekolah');

// Query isi table siswa
$result = mysqli_query($conn, "SELECT * FROM siswa");

// Ubah data ke dalam array
// $row = mysqli_fetch_row($result);       //array numerik
// $row = mysqli_fetch_assoc($result);    //array associativ
// $row = mysqli_fetch_array($result     //keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {    //looping biar data tampilnya tidak hanya satu
    $rows[] = $row; //rows di isi row
}

// Tampung ke variable siswa
$siswa = $rows;
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