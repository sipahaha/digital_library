<?php
include "lib/koneksi.php"; 

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tb_kategoribuku WHERE id_kategori = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

$view = $stmt->fetch(PDO::FETCH_ASSOC);
$id_kat = $view['id_kategori'];
?>
<style>
    h2{
        font-family: aes;
        color: #003092;
    }
        .col-md-3 {
        margin-top: 50px;
    }

    .card:hover {
        transform: scale(1.1, 1.1);
    }

    .col-md-3 .card {
        width: 200px;
        height: 320px;
    }

    .col-md-3 a {
        text-decoration: none;
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

    .detail p {
        font-size: 13px;
        font-family: biasa;
        margin-top: 10px;

    }

    .detail i {
        font-size: 11px;
        font-family: biasa;
        color: #FF9D23;

    }
</style>
<div class="container my-5">
<div class="row"  style="margin-left: 60px;">
    <center><h2><?= $view['nama_kategori']; ?></h2></center>

    <?php
    $sql = "SELECT * FROM tb_buku WHERE id_kategori = :id_kat";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_kat', $id_kat);
    $stmt->execute();

    while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_buku = $rowResult['id_buku']; 
    
        $stmtRating = $pdo->prepare("SELECT AVG(rating) as rata FROM tb_ulasan WHERE id_buku = ?");
        $stmtRating->execute([$id_buku]);
        $rRating = $stmtRating->fetch();
    
        $rating = $rRating['rata'] !== null ? round($rRating['rata']) : 0;
        $ratingDecimal = $rRating['rata'] !== null ? number_format($rRating['rata'], 1) : "0.0";
    
    ?>
        <div class="col-md-3 mt-4 d-flex">
            <div class="card">
                <a href="?page=detail&idbuku=<?= $rowResult['id_buku']; ?>" style="text-decoration: none;">
                    <div class="cover">
                        <center><img src="cover_book/<?= $rowResult['gambar_buku'] ?>" alt="" width="140"></center>
                    </div>
                    <div class="detail text-center">
                        <b><?= $rowResult['judul'] ?></b><br>
                        <i><?= $rowResult['penulis'] ?></i>
                        <p>
                            <?php
                            if ($rating == 0) {
                                echo "Belum ada rating";
                            } else {
                                for ($i = 1; $i <= 5; $i++) {
                                    echo ($i <= $rating) ? "&#9733;" : "&#9734;";
                                }
                                echo " ($ratingDecimal / 5)";
                            }
                            
                            ?>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>
</div>
</div>