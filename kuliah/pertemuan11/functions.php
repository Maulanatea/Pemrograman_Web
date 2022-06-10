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

function tambah($data) {
    $conn = koneksi();

    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "INSERT INTO siswa VALUES (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar' ) ";
    mysqli_query($conn, $query);

    //mengembalikan nilai
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    $conn = koneksi();
    
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id") or die(mysqli_error($conn));
    //kalo berhasil
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    $conn = koneksi();

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "UPDATE siswa SET
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id ";
    mysqli_query($conn, $query);

    //mengembalikan nilai
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $conn = koneksi();

    $query = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' ";

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {    //looping biar data tampilnya tidak hanya satu
        $rows[] = $row; //rows di isi row
    }

    return $rows;
}

 ?>