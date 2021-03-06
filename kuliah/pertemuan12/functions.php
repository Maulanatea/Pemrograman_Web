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

    $query = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' or nrp LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {    //looping biar data tampilnya tidak hanya satu
        $rows[] = $row; //rows di isi row
    }

    return $rows;
}

function login($data) {
    $conn = koneksi();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    //cek dulu username nya
    if ($user = query("SELECT * FROM user WHERE username = '$username' ")) {
        //cek password nya
        if(password_verify($password, $user['password'])) {
            //set session
            $_SESSION['login'] = true;
            
            header("Location: index.php");
            exit;
            
        }
    }
     return [
          'error' => true ,
         'pesan' => 'username/password anda salah'
     ];
    
}

function registrasi($data) {
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username'])); //strtolower agar apa yg di inputan menjadi hurup kecil semua
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    //jika usernam/password kosong
    if(empty($username) || empty($password1) || empty($password2)) {
        echo "<script>
                alert('username/password tidak boleh kosong');
                document.location.href = 'registrasi.php'
            </script>";
        
        return false;
    }

    //jika username sudah ada di database
    if(query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
                alert('username sudah ada');
                document.location.href = 'registrasi.php'
            </script>";
        
        return false;
    }

    //jika konfirmasi password tidak sesuai
    if($password1 !== $password2) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
                document.location.href = 'registrasi.php'
            </script>";
        
        return false;
    }

    //jika password kurang dari 5 digit
    if(strlen($password1) < 5) {
        echo "<script>
                alert('Password Anda terlalu pendek!');
                document.location.href = 'registrasi.php'
            </script>";
        
        return false;
    }

    //juka usernama/password sudah sesuai
    //enskripsi password
    $password_baru = password_hash($password1, PASSWORD_DEFAULT);
    //insert ke table user
    $query = "INSERT INTO user VALUES (null, '$username', '$password_baru')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

 ?>