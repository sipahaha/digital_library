<?php
session_start();
include "lib/koneksi.php";
if (isset($_SESSION['flash'])) {
    echo "<div class='alert alert-info'>" . $_SESSION['flash'] . "</div>";
    unset($_SESSION['flash']);
}


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
        <h2>Your Book Collection</h2>
        <div class="row" style="margin-left: 60px;">
            <?php

                    $sql = "SELECT * FROM tb_koleksi a  INNER JOIN tb_user b ON a.id_user = b.id_user INNER JOIN tb_buku c ON a.id_buku = c.id_buku";
                    $stmt = $pdo->prepare($sql);
                    while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $stmtRating = $pdo->prepare("SELECT AVG(rating) as rata FROM tb_ulasan WHERE id_buku = ?");
                    $stmtRating->execute([$id_buku]);
                    $rRating = $stmtRating->fetch();
                    $rating = round($rRating['rata']);
                    $ratingDecimal = number_format($rRating['rata'], 1);
                ?>

            <div class="col-md-3 mt-4 d-flex">
                <div class="card">
                    <a href="?page=detail&idbuku=<?= $rowResult['id_buku']; ?>" style="text-decoration: none;">
                        <div class="cover">
                            <center><img src="cover_book/<?= $rowResult['gambar_buku'] ?>" alt="" width="140">
                            </center>
                        </div>
                        <div class="detail text-center">
                            <b><?= $rowResult['judul'] ?></b><br>
                            <i><?= $rowResult['penulis'] ?></i>
                            <p>
                                <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo ($i <= $rating) ? "&#9733;" : "&#9734;";
                                    }
                                    echo " ($ratingDecimal / 5)";
                                    ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</div>