<?php
include 'koneksi.php';
include 'aset/header.php';


$buku = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(stok) AS jb FROM buku"));
$jumlah_buku = $buku["jb"];


$anggota = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS ja FROM anggota"));
$jumlah_anggota = $anggota["ja"];


?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md" bg-warning>
            <h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
            <hr class="bg-light">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-danger" style="width: 18rem;">
                <div class="card-body text-white">
                    <h5 class="card-title">Jumlah Buku</h5>
                    <p class="card-text" style="font-size:60px"><?= $jumlah_buku; ?></p>
                    <a href="http://localhost/siperpus/buku/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning" style="width: 18rem;">
                <div class="card-body text-white">
                    <h5 class="card-title">Jumlah Anggota</h5>
                    <p class="card-text" style="font-size:60px"><?= $jumlah_anggota; ?></p>
                    <a href="http://localhost/siperpus/anggota/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-primary" style="width: 18rem;">
                <div class="card-body text-white">
                    <h5 class="card-title">Jumlah Transaksi</h5>
                    <p class="card-text" style="font-size:60px">279</p>
                    <a href="http://localhost/siperpus/transaksi/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include 'aset/footer.php';
?>