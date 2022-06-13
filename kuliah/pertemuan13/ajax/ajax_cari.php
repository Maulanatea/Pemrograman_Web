<?php 
require '../functions.php';

$siswa = cari($_GET['keyword']);

?>

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