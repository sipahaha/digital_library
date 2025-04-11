<?php
session_start();
include "lib/koneksi.php";

$id_buku = $_GET['idpinjam'];
$stmt = $pdo->prepare("SELECT judul FROM tb_buku WHERE id_buku = ?");
$stmt->execute([$id_buku]);
$buku = $stmt->fetch();

// if (!isset($_SESSION['id_user'])) {
//     echo "Harus login terlebih dahulu.";
// }

// $id_user = $_SESSION['id_user'];
$tanggal_peminjaman = date('Y-m-d');
$tanggal_pengembalian = null;
$lama = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lama'])) {
    $lama = (int) $_POST['lama'];
    $tanggal_pengembalian = date('Y-m-d', strtotime("+$lama days"));
}
?>
<style>
    h2{
        font-family: aes;
        margin-top: 50px;
        color: #003092;

    }
    form{
        font-family: biasa; 
        color: #003092;
    }
</style>
<div class="container">
    <center><h2>Form Peminjaman Buku</h2></center>

    <form method="post">
        <input type="hidden" name="id_buku" value="<?= htmlspecialchars($id_buku) ?>">
        <!-- <input type="hidden" name="id_user" value=" //htmlspecialchars($id_user) ?>"> -->
        <div class="mb-3">
            <label>Judul Buku:</label>
            <input class="form-control" type="text" value="<?= htmlspecialchars($buku['judul']) ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Tanggal Peminjaman:</label>
            <input class="form-control" type="date" value="<?= $tanggal_peminjaman ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Berapa Lama Peminjaman:</label>
            <select class="form-control" name="lama" required>
                <option value="">Pilih</option>
                <option value="3" <?= $lama == 3 ? 'selected' : '' ?>>3 Hari</option>
                <option value="7" <?= $lama == 7 ? 'selected' : '' ?>>7 Hari</option>
                <option value="14" <?= $lama == 14 ? 'selected' : '' ?>>14 Hari</option>
            </select>
        </div>
        <div class="mb-3">
            <?php if ($tanggal_pengembalian): ?>
            <label>Tanggal Pengembalian:</label>
            <input class="form-control" type="date" value="<?= $tanggal_pengembalian ?>" readonly>
        </div>

        <form method="post" action="proses_peminjaman.php">
            <input type="hidden" name="id_user" value="<?= $id_user ?>">
            <input type="hidden" name="id_buku" value="<?= $id_buku ?>">
            <input type="hidden" name="tanggal_peminjaman" value="<?= $tanggal_peminjaman ?>">
            <input type="hidden" name="tanggal_pengembalian" value="<?= $tanggal_pengembalian ?>">
            <button class="btn btn-primary" type="submit">Konfirmasi Peminjaman</button>
        </form>
        <?php else: ?>
        <button type="submit" class="btn btn-primary">Lanjutkan</button>
        <?php endif; ?>
    </form>
</div>