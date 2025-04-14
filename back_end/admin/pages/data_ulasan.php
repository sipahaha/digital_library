<?php
include "../../lib/koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Testimoni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
    h3 {
        font-family: aes;
        color: #003092;
    }

    th {
        font-family: biasa;

    }

    tbody tr td {
        font-size: 14px;
        color: #003092;
    }

    .btn-md {
        color: #FFF2DB;
        background-color: #003092;
    }

    .btn-md:hover {
        background-color: #FF9D23;
        color: #003092;
    }
    .action{
        display: flex;
    }
    .action a{
        margin-left: 5px;
    }
    </style>
</head>

<body>
    <center>
        <h3 class="mt-3 mb-4">Data Ulasan Pengguna</h3>
    </center>

    <div class="container mt-5">
        <form method="GET" action="">
            <input type="hidden" name="page" value="data_ulasan">
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari username/judul buku..."
                        value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-md">Cari</button>
                </div>
            </div>
            <button type="submit" class="btn btn-md" onclick="window.print()">Print</button>

        </form>

        <div class="table-responsive mt-3 ">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th style="color: #003092;">No</th>
                        <th style="color: #003092;">Nama Pengguna</th>
                        <th style="color: #003092;">Judul Buku</th>
                        <th style="color: #003092;">Ulasan</th>
                        <th style="color: #003092;">Rating</th>
                        <th style="color: #003092;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

            $keyword = isset($_GET['keyword']) ? '%' . $_GET['keyword'] . '%' : '%';

            $sql = "SELECT a.id_ulasan, b.username, c.judul, a.ulasan, a.rating
                    FROM tb_ulasan a
                    INNER JOIN tb_user b ON a.id_user = b.id_user
                    INNER JOIN tb_buku c ON a.id_buku = c.id_buku
                    WHERE b.username LIKE ? OR c.judul LIKE ?
                    ORDER BY a.id_ulasan DESC";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$keyword, $keyword]);
            
            $no = 1;
            while($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
             
            ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$rowResult['username']?></td>
                        <td><?=$rowResult['judul']?></td>
                        <td><?=$rowResult['ulasan']?></td>
                        <td><?=$rowResult['rating']?></td>
                        <td>
                        <div class="action">
                        <a href="?page=hapus_ulasan&id=<?=$rowResult['id_ulasan'];?>" class="btn btn-md"><i class="bi-trash"></i></a>
                            <a href="?page=edit_ulasan=<?=$rowResult['id_ulasan'];?>" class="btn btn-md"><i class="bi-pencil-square"></i></a>
                        </div>    
                        </td>
                    </tr>
                    <?php
              }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>