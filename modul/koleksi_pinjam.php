<?php
include "lib/koneksi.php";

$id_user = $_GET['id_user'] ?? $_SESSION['id'] ?? null;

if (!$id_user) {
    echo "ID user tidak ditemukan.";
    exit();
}

$sql = "SELECT * FROM tb_peminjaman WHERE id_user = :id_user";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id_user' => $id_user]);

?>
<style>
h2 {
    color: #003092;
    font-family: aes;
    text-align: center;
}

.col-md-3 {
    margin-top: 50px;
}
.col-md-3 .card {
    width: 200px;
    height: 420px;
}
.card img {
    margin-top: 18px;
}

.detail {
    margin-top: 10px;
}

.detail b {
    font-size: 13px;
    font-family: aes;
    color: #003092;
}

.detail i {
    font-size: 11px;
    font-family: biasa;
    color: #FF9D23;

}
.detail p{
    font-size: 11px;
    font-family: biasa;
    color: #003092;
}
.detail .btn-md {
    font-family: biasa;
    background-color: #003092;
    color: #FFF2DB;
    font-size: 13px;
    margin-top: -10px;
}

.detail .btn-md:hover {
    font-family: biasa;
    border-style: solid 1px 1px;
    background-color: #FF9D23;
    color: #003092;
}

</style>
<div class="container my-5">
    <h2>Daftar Buku Dipinjam</h2>
    <div class="row" style="margin-left: 60px;">
        <?php
                    $id_user = $_SESSION['id'];
                    $sql = "SELECT * FROM tb_peminjaman a   
                    INNER JOIN tb_user b ON a.id_user = b.id_user 
                    INNER JOIN tb_buku c ON a.id_buku = c.id_buku 
                    WHERE a.id_user = :id_user";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':id_user' => $_SESSION['id']]);

                    while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $tgl_kembali = new DateTime($rowResult['tanggal_pengembalian']);
                        $today = new DateTime();
                        $denda = 0;

                    if ($today > $tgl_kembali && $rowResult['status_peminjaman'] === 'borrowed') {
                        $selisih = $today->diff($tgl_kembali)->days;
                        $denda = $selisih * 5000;
                    }
                    $btnClass = $denda > 0 ? 'btn btn-danger' : 'btn btn-md';
                ?>

        <div class="col-md-3 mt-4 d-flex">
            <div class="card">
                <div class="cover">
                    <center><img src="cover_book/<?= $rowResult['gambar_buku'] ?>" alt="" width="140">
                    </center>
                </div>
                <div class="detail text-center">
                    <b><?= $rowResult['judul'] ?></b><br>
                    <i><?= $rowResult['penulis'] ?></i><br>
                    <p class="mt-2">Tanggal Pengembalian <br> :<?= $rowResult['tanggal_pengembalian'] ?></p>
                    <?php if ($denda > 0): ?>
                        <p style="color: red; font-weight: bold;">Denda: Rp <?= number_format($denda, 0, ',', '.') ?></p>
                    <?php endif; ?>
                    <a href="?page=pinjam_selesai&id=<?= $rowResult['id_peminjaman'] ?>" class="<?= $btnClass ?>">Beri Ulasan</a>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>
</div>