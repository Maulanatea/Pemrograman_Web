<?php 

require 'functionS.php';

//jika tidak ada id di url
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

//ambil id dari url
$id = $_GET['id'];

//query mahasiswa berdasarkan id
$s = query("SELECT * FROM siswa WHERE id = $id");

//cek apakah tombol ubah sudah di tekan
if (isset($_POST['ubah'])) {
    if (ubah($_POST)) {
        echo "<script>
                alert('Data Berhasil Di Ubah');
                document.location.href = 'index.php';
            </script>";
    }else{
        echo 'data gagal di Ubah';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Siswa</title>
</head>
<body>
    <h3>Form Ubah Data Siswa</h3>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $s['id']; ?>" >
        <ul>
            <li>
                <label>
                    Nama :
                    <input type="text" name="nama" autofocus required value="<?= $s['nama']; ?>" >
                </label>
            </li>
            <li>
                <label>
                    NRP :
                    <input type="text" name="nrp" required value="<?= $s['nrp']; ?>" >
                </label>
            </li>
            <li>
                <label>
                    Email :
                    <input type="text" name="email" required value="<?= $s['email']; ?>" >
                </label>
            </li>
            <li>
                <label>
                    Jurusan :
                    <input type="text" name="jurusan" required value="<?= $s['jurusan']; ?>" >
                </label>
            </li>
            <li>
                <label>
                    Gambar :
                    <input type="text" name="gambar" required value="<?= $s['gambar']; ?>" >
                </label>
            </li>
            <br>
            <li>
                <button type="submit" name="ubah">Ubah</button>
            </li>
        </ul>
    </form>
    
</body>
</html>