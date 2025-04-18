<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .col-lg-12 {
        background-color: #FFF2DB;
        color: #003092;
        width: 70%;
        border-radius: 20px;
    }

    .col-lg-12 .text {
        margin-top: 30px;
        margin-left: 50px;
    }

    .col-lg-12 .text h5 {
        font-family: aes;
    }

    .col-lg-12 .text p {
        font-family: biasa;
        font-size: 13px;
    }

    .content-4 {
        margin-top: 50px;
    }

    .content-4 h5 {
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
        font-family: biasa;
    }

    .detail p {
        font-size: 11px;
        font-family: biasa;
    }

    .detail i {
        font-size: 11px;
        font-family: biasa;
        color: #FF9D23;
    }

    .content-4 .btn {
        color: #003092;
        background-color: #FF9D23;
        font-size: 14px;
        float: right;
    }

    .content-4 .btn:hover {
        border-color: #FF9D23;
        color: #003092;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex">
                <div class="text">
                    <h5>Hai, <?= htmlspecialchars($_SESSION['user']); ?> ! Selamat bekerja.</h5>
                    <p class="pt-2">Eterna Libri is more than just a digital library. We provide an exclusive,
                        elegant and
                        Start reading today and be part of a limitless literacy journey!</p>
                </div>
                <img src="../../asset/img/admin.png" alt="" height="200">
            </div>
        </div>
    </div>
    <div class="content-4">
        <div class="container my-5">
            <h5>Buku Rating Tertinggi</h5>
            <div class="row" style="margin-left: 60px;">
                <?php

                    $stmt = $pdo->query("
                    SELECT tb_buku.*, AVG(tb_ulasan.rating) as rata 
                    FROM tb_buku 
                    LEFT JOIN tb_ulasan ON tb_buku.id_buku = tb_ulasan.id_buku 
                    GROUP BY tb_buku.id_buku 
                    ORDER BY rata DESC 
                    LIMIT 8
                    ");

                    while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $rating = round($rowResult['rata']);
                    $ratingDecimal = number_format($rowResult['rata'], 1);
                ?>

                <div class="col-md-3 mt-4 d-flex">
                    <div class="card">
                        <a href="?page=detail&idbuku=<?= $rowResult['id_buku']; ?>" style="text-decoration: none;">
                            <div class="cover">
                                <center><img src="../../cover_book/<?= $rowResult['gambar_buku'] ?>" alt="" width="140">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>