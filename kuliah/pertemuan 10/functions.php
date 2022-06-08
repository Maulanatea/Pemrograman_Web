<?php 

function koneksi() {

    return mysqli_connect('localhost', 'root', '', 'sekolah');      //mengkoneksi ke database
}

function query($query) {

    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    //jika hasilnya hanya satu data
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {    //looping biar data tampilnya tidak hanya satu
        $rows[] = $row; //rows di isi row
    }

    return $rows;
}

 ?>