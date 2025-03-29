<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .card {
        background-color: #FFF2DB;
        color: #003092;
        width: 80%;
        border-radius: 20px;
    }

    .text-card {
        margin-top: 30px;
        margin-left: 50px;
    }

    .text-card h5 {
        font-family: aes;
    }

    .text-card p {
        font-family: biasa;
        font-size: 13px;
    }

    .content-4 {
        margin-top: 50px;
    }

    .content-4 h5 {
        color: #003092;
        font-family: aes;
        text-align: left;
    }

    /* 
.content-4 .col-md-3 {
    margin-top: 100px;
}

.content-4 .card {
    width: min-content;
}
.content-4 .card:hover{
    transform: scale(1.1, 1.1);
}

.content-4 .card img {
    width: 200px;
    height: auto;
    border-radius: 5px;
}

.card-title {
    color: #003092;
    font-family: aes;
}

.card-text {
    color: #FF9D23;
    font-size: small;
}

.card a {
    font-family: biasa;
    background-color: #FF9D23;
    color: #003092;
    font-size: 14px;
}

.card a:hover {
    font-family: biasa;
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
} */
    .book-card img {
        height: 250px;
        object-fit: cover;
    }

    .book-card {
        text-align: center;
    }

    .book-card:hover {
        transform: scale(1.1, 1.1);
    }

    .price {
        color: #d9534f;
        font-weight: bold;
    }
    .content-4 a{
      float: right;
      font-size: 13px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-card">
                        <h5>Hello World !!</h5>
                        <p class="pt-2">Eterna Libri is more than just a digital library. We provide an exclusive,
                            elegant and
                            Start reading today and be part of a limitless literacy journey!</p>
                    </div>
                </div>
                <div class="col-lg-6 justify-content-center">
                    <img src="../../asset/img/admin.png" alt="" height="200" width="auto" style="margin-left: 60px;">
                </div>
            </div>
        </div>
    </div>
    <div class="content-4" id="categories">
        <div class="container my-5">
            <h5>Buku Rating Tertinggi</h5>
            <a href="" class="btn btn-danger mt-4">View All →</a>
            <div class="row row-cols-1 row-cols-md-4 g-4" style="margin-left: 60px;">
                <?php
                     $sqlReslt = $pdo->prepare("SELECT * FROM tb_buku");
                     $sqlReslt->execute();
                
                while($rowResult = $sqlReslt->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                <div class="col">
                    <div class="card book-card">
                        <img src="coverbook/<?=$rowResult['gambar']?>" class="card-img-top" alt="Heartland Stars">
                        <div class="card-body">
                            <h5 class="card-title"><?=$rowResult['judul']?></h5>
                            <p class="card-text"><?=$rowResult['penulis']?></p>
                            <a href="#" class="btn btn-danger">View a Book</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                    ?>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>