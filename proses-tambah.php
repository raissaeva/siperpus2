<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['kategori'];

    $sql = "INSERT INTO buku (judul, penerbit, pengarang, ringkasan, cover, stok, id_kategori) VALUES ( '$judul', '$penerbit', '$pengarang', '$ringkasan', '$cover', '$stok', '$id_kategori')";

    $res = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));


    echo mysqli_error($koneksi);

    if ($res) {
        echo "<script>
        alert('BUKU BERHASIL DITAMBAH');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('BUKU GAGAL DITAMBAH');
        document.location.href = 'tambah.php';
        </script>";
    }
} else {
    header("Location: tambah.php");
}
