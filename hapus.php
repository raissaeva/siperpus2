<?php
include '../koneksi.php';

$id = $_GET['id'];



$result = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = $id") or die(mysqli_error($koneksi));



if ($result) {
    echo "<script>
    alert('BUKU BERHASIL DIHAPUS');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('BUKU GAGAL DIHAPUS');
    document.location.href = 'index.php';
    </script>";
}
