<?php 
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//jika tidak ada id di url
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

//mengambil id dari url
$id =($_GET['id']);

if (hapus($id)) {
    echo "<script>
            alert('Data Berhasil Di Hapus');
            document.location.href = 'index.php';
        </script>";
}else{
    echo 'data gagal di Hapus';
}


?>