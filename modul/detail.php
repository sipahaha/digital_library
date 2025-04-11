<?php
include "lib/koneksi.php"; 

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
.detail{
    margin-top: 50px;
    color: #003092;
    font-family: biasa;
    font-size: 15px;
}
.icon .btn{
    color: #003092;
    font-family: biasa;
    background-color: #FF9D23;
    margin-top: 40px;
}
.icon .btn:hover{
    border-color: #FF9D23;
    color: #003092;
}
.icon a{
    text-decoration: none;
    color: #003092;
}
</style>
<div class="container-fluid">
    <div class="row">
        <?php
      $id_buku = $_GET['idbuku'];
      $stmt = $pdo->prepare("SELECT * FROM tb_buku a INNER JOIN tb_kategoribuku b ON a.id_kategori = b.id_kategori  WHERE id_buku = :id_buku");
      $stmt->execute([':id_buku' => $id_buku]);

      $stmtRating = $pdo->prepare("SELECT AVG(rating) as rata FROM tb_ulasan WHERE id_buku = ?");
                    $stmtRating->execute([$id_buku]);
                    $rRating = $stmtRating->fetch();
                    $rating = round($rRating['rata']);
                    $ratingDecimal = number_format($rRating['rata'], 1);
  
      while($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="col-md-6">
            <center><img src="cover_book/<?= $rowResult['gambar_buku']; ?>" alt="" width="350"></center>
        </div>
        <div class="col-md-6">
            <div class="judul">
                <h2><?= $rowResult['judul']; ?></h2>
                <p><?= $rowResult['penulis']; ?></p>
            </div>
            <div class="icon">
            <a href="?page=koleksi&idkol=<?= $rowResult['id_buku']; ?>" ><button class="btn btn-md"><i class="bi-bookmark" style="font-size: 15px;"></i></button></a>
            <a href="?page=pinjam&idpinjam=<?= $rowResult['id_buku']; ?>"><button class="btn btn-md" style="font-size: 15    px;">Pinjam Buku</button></a>
            </div>
            <div class="detail">
            <p>
                <?php
                    for ($i = 1; $i <= 5; $i++) {
                    echo ($i <= $rating) ? "&#9733;" : "&#9734;";
                     }
                    echo " ($ratingDecimal / 5)";
                 ?>
             </p>
                <p>Nama Kategori : <?= $rowResult['nama_kategori']; ?> </p>
                <p>Penerbit : <?= $rowResult['penerbit']; ?></p>
                <p>Tahun Terbit : <?= $rowResult['tahun_terbit']; ?></p>
                <p>Deskripsi: <br> <p style="font-size: 13px; color: black; opacity: 0.6;"><?= $rowResult['deskripsi_buku']; ?></p> </p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
