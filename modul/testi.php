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

    .text-center {
        color: #003092;
        font-family: aes;
        text-align: center;
    }

    .rating {
        color: #f39c12;
        font-size: 14px;
    }
    .title{
        color: #003092;
        font-family: aes;
    }
    .ulasan{
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
            //      $sqlReslt = $pdo->prepare("SELECT * FROM tb_ulasan");
            //      $sqlReslt->execute();
     
            
            // while($rowResult = $sqlReslt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="card mb-3 p-3 border-0 shadow-sm" style="width: 18rem;">
                    <div class="rating"><i class="bi-star"></i><i class="bi-star"></i><i class="bi-star"></i><i class="bi-star"></i><i class="bi-star"></i></div>
                    <p class="title mt-3">When The Rains Meets Hema</p>
                    <p class="ulasan">Buku ini sangat bangus! memiliki alur yang keren!</p>
                    <small class="text-muted">- Nia Carpanter</small>
                </div>
                <?php
            
                ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>