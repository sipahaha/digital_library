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
    height: 380px;
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

                    $sql = "SELECT * FROM tb_peminjaman a   
                    INNER JOIN tb_user b ON a.id_user = b.id_user 
                    INNER JOIN tb_buku c ON a.id_buku = c.id_buku 
                    WHERE a.id_user = :id_user AND status_peminjaman = 'borrowed'";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':id_user' => $_SESSION['id']]);

                    while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                    <a href="?page=pinjam_selesai&id=<?= $rowResult['id_buku'] ?>" class="btn btn-md">Pinjam Selesai</a>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>
</div>