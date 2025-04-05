<?php
include "../../lib/koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
    .btn-md {
        color: #FFF2DB;
        background-color: #003092;
    }

    .btn-md:hover {
        background-color: #FF9D23;
        color: #003092;
    }

    h3 {
        font-family: aes;
        color: #003092;
    }

    th {
        font-family: biasa;

    }
    tbody tr td{
      font-family: biasa;
        font-size: 14px;
        color: #003092;
    }
    </style>
</head>

<body>
    <center>
        <h3 class="mt-3 mb-4">Daftar Kategori</h3>
    </center>
    <a href="?page=input_kat" type="button" class="btn btn-md">Input New Categories</a>

    <!-- tabel -->
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th style="color: #003092;">No</th>
                        <th style="color: #003092;">Gambar</th>
                        <th style="color: #003092;">Nama Kategori</th>
                        <th style="color: #003092;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            $no = 1;
            $sqlReslt = $pdo->prepare("
                SELECT * FROM tb_kategoribuku
            ");
            $sqlReslt->execute(); 
            
            while($rowResult = $sqlReslt->fetch(PDO::FETCH_ASSOC)) {
           
            
            ?>
                    <tr>
                        <td style="color: #003092;"><?=$no++?></td>
                        <td><img width="100" src="../../gbrcategori/<?=$rowResult['gambar_kategori']?>"></td>
                        <td style="color: #003092;"><?=$rowResult['nama_kategori']?></td>
                        <td style="color: #003092;"><a href="?page=hapus_kat&id=<?=$rowResult['id_kategori'];?>"><i class="bi-trash"></i></a> <a
                                href=""><i class="bi-pencil-square"></i></a></td>
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