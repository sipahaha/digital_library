<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilihan Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
    .content-4 {
        margin-top: 200px;
    }

    .content-4 h2 {
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

    /* .icon-card a i {
        position: absolute;
        top: 5px;
        right: 5px;
        padding: 5px;
        font-size: 15px;
        color: black;
        border-radius: .5rem;
        z-index: 1;
    } */
    </style>

</head>

<body>

    <div class="content-4" id="categories">
        <div class="container my-5">
            <h2>Recomendation For You</h2>
            <div class="row" style="margin-left: 60px;">
                <?php

                $stmt = $pdo->query("SELECT * FROM tb_buku");
                while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id_buku = $rowResult['id_buku'];

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</body>

</html>