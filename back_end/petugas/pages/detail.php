<?php
include "../../lib/koneksi.php"; 

    $id = $_GET['idbuku'];
    $stmt = $pdo->prepare("SELECT * FROM tb_buku WHERE id_buku = :id_buku");
    $stmt->bindParam(':id_buku', $id);
    $stmt->execute();

    $view = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_buku = $view['id_buku'];
?>
<style>
.col-md-6 {
    margin-top: 75px;
}

.judul h2 {
    color: #003092;
    font-family: aes;
    margin-top: 10px;
}

.judul p {
    opacity: 0.5;
    font-family: biasa;
}

.detail {
    margin-top: 50px;
    color: #003092;
    font-family: biasa;
    font-size: 15px;
}

.icon .btn {
    color: #003092;
    background-color: #FF9D23;
    margin-top: 40px;
}

.icon .btn:hover {
    border-color: #FF9D23;
    color: #003092;
}

.icon a {
    text-decoration: none;
    color: #003092;
}
</style>
<div class="container-fluid">
    <div class="row">
        <?php
      $id_buku = $_GET['idbuku'];
      $stmt = $pdo->prepare("SELECT * FROM tb_buku WHERE id_buku = :id_buku");
      $stmt->execute([':id_buku' => $id_buku]);
    
      $stmt_kat = $pdo->prepare("
      SELECT a.nama_kategori 
      FROM tb_kategoribuku a
      INNER JOIN kategoribuku_relasi b ON a.id_kategori = b.id_kategori
      WHERE b.id_buku = :id_buku");
      $stmt_kat->execute([':id_buku' => $id_buku]);
      $kat = $stmt_kat->fetch(PDO::FETCH_ASSOC);

      while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_buku = $rowResult['id_buku'];

      $stmtRating = $pdo->prepare("SELECT AVG(rating) as rata FROM tb_ulasan WHERE id_buku = ?");
      $stmtRating->execute([$id_buku]);
      $rRating = $stmtRating->fetch();
      $rating = round($rRating['rata']);
      $ratingDecimal = number_format($rRating['rata'], 1);


        ?>
        <div class="col-md-6">
            <center><img src="../../cover_book/<?= $rowResult['gambar_buku']; ?>" alt="" width="350"></center>
        </div>
        <div class="col-md-6">
            <div class="judul">
                <h2><?= $rowResult['judul']; ?></h2>
                <p><?= $rowResult['penulis']; ?></p>
            </div>

            <div class="detail">
                <div class="overall-rating mb-3">
                    <p>
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                             echo ($i <= $rating) ? "&#9733;" : "&#9734;";
                        }
                            echo " ($ratingDecimal / 5)";
                        ?>
                    </p>
                </div>
                </p>
                <p>Nama Kategori : <?= $kat['nama_kategori']; ?> </p>
                <p>Penerbit : <?= $rowResult['penerbit']; ?></p>
                <p>Tahun Terbit : <?= $rowResult['tahun_terbit']; ?></p>
                <p>Deskripsi: <br>
                <p style="font-size: 13px; color: black; opacity: 0.6;"><?= $rowResult['deskripsi_buku']; ?></p>
                </p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>