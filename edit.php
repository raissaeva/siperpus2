<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['kategori'];

    $result = mysqli_query($koneksi, "UPDATE buku SET 
    judul = '$judul',
    penerbit = '$penerbit',
    Pengarang = '$pengarang',
    ringkasan = '$ringkasan',
    cover = '$cover',
    stok = '$stok',
    id_kategori = '$id_kategori'
    WHERE id_buku = $id");
    if ($result) {
        echo "<script>
        alert('BUKU BERHASIL DI EDIT');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('BUKU GAGAL DI EDIT');
        document.location.href = 'index.php';
        </script>";
    }
}
include '../aset/header.php';

$id = $_GET['id'];

$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
$buku = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM buku INNER JOIN kategori USING(id_kategori) WHERE buku.id_buku = '$id' "));

?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Data Buku</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" value="<?= $id; ?>" name="id">
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul buku" value="<?= $buku['judul']; ?>">
                            <small class="form-text text-muted">Contoh: Tere Liye</small>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan penerbit" value="<?= $buku['penerbit']; ?>">
                            <small class="form-text text-muted">Contoh: Gramedia</small>
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukkan nama pengarang" value="<?= $buku['pengarang']; ?>">
                            <small class="form-text text-muted">Contoh: Raissa</small>
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan</label>
                            <textarea name="ringkasan" id="ringkasan" cols="30" rows="5" placeholder="masukkan ringkasan buku" class="form-control" value="<?= $buku['ringkasan']; ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover">cover</label>
                            <input type="text" class="form-control" name="cover" id="cover" placeholder="Masukkan cover buku" value="<?= $buku['cover']; ?>">
                            <small class="form-text text-muted">NOTE: tidak harus diisi</small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan stok buku" value="<?= $buku['stok']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kategori">ID Kategori</label>
                            <select name="kategori" id="kategori" style="width: 100%" required>
                                <option value="<?= $buku['id_kategori']; ?>"><?= $buku['kategori']; ?></option>
                                <option value="">-- PILIH KATEGORI BUKU --</option>
                                <?php while ($k = mysqli_fetch_assoc($kategori)) :
                                    if ($k['kategori'] != $buku['kategori']) :
                                ?>
                                        <option value="<?= $k["id_kategori"]; ?>"><?= $k["kategori"]; ?></option>
                                <?php
                                    endif;
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../aset/footer.php';
?>