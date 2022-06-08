<?php 

require 'functionS.php';

//cek apakah tombol tambah sudah di tekan
if (isset($_POST['tambah'])) {
    if (tambah($_POST)) {
        echo "<script>
                alert('Data Berhasil Di Tambahkan');
                document.location.href = 'index.php';
            </script>";
    }else{
        echo 'data gagal di tambahkan';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    <h3>Form Tambah Data Siswa</h3>

    <form action="" method="post">
        <ul>
            <li>
                <label>
                    Nama :
                    <input type="text" name="nama" autofocus required >
                </label>
            </li>
            <li>
                <label>
                    NRP :
                    <input type="text" name="nrp" required >
                </label>
            </li>
            <li>
                <label>
                    Email :
                    <input type="text" name="email" required >
                </label>
            </li>
            <li>
                <label>
                    Jurusan :
                    <input type="text" name="jurusan" required >
                </label>
            </li>
            <li>
                <label>
                    Gambar :
                    <input type="text" name="gambar" required >
                </label>
            </li>
            <br>
            <li>
                <button type="submit" name="tambah">Tambah</button>
            </li>
        </ul>
    </form>
    
</body>
</html>