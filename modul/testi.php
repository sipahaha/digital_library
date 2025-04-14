<?php
include "lib/koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* .testimoni {
        margin-top: 200px;
    } */
    .card{
        margin-left: 30px;
    }
    .text-center {
        color: #003092;
        font-family: aes;
        text-align: center;
    }

    .rating {
        color: #f39c12;
        font-size: 14px;
    }

    .title {
        color: #003092;
        font-family: aes;
    }

    .ulasan {
        color: #003092;
        font-family: biasa;
        font-size: 12px;
    }

    small {
        position: absolute;
        bottom: 0;
        left: 0;
        margin-bottom: 10px;
        margin-left: 10px;
        font-size: 10px;
        font-family: biasa;

    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Testimonial Pelanggan</h2>
        <div class="row d-flex">
            <div class="col-md-8 offset-md-2 d-flex">
                <?php
                $sql = "SELECT a.id_ulasan, b.username, c.judul, a.ulasan, a.rating
                FROM tb_ulasan a
                INNER JOIN tb_user b ON a.id_user = b.id_user
                INNER JOIN tb_buku c ON a.id_buku = c.id_buku";
                $sqlReslt = $pdo->prepare($sql);
                $sqlReslt->execute();
                
                $id_buku = $rowResult['id_buku'];
                $avg = $pdo->prepare("SELECT AVG(rating) as rata_rating FROM tb_ulasan WHERE id_buku = ?");
                $avg->execute([$id_buku]);
                $dataAvg = $avg->fetch(PDO::FETCH_ASSOC);
                $rating = round($dataAvg['rata_rating'], 1);

            while($rowResult = $sqlReslt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="card mb-3 p-3 border-0 shadow-sm" style="width: 18rem;">
                    <div class="rating">
                        <?php
                       for ($i = 1; $i <= 5; $i++) {
                             echo ($i <= $rowResult['rating']) ? "&#9733;" : "&#9734;";
                        }
                            echo " ({$rowResult['rating']} / 5)";
                        ?>
                    </div>
                    <p class="title mt-3"><?= $rowResult['judul'];?></p>
                    <p class="ulasan"><?= $rowResult['ulasan'];?></p>
                    <small class="text-muted">- <?= $rowResult['username'];?></small>
                </div>
                <?php
            }
                ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>