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

    tbody tr td {
        font-family: biasa;
        font-size: 14px;
        color: #003092;
    }
    </style>
</head>

<body>
    <center>
        <h3 class="mb-4 mt-3">Daftar Buku</h3>
    </center>

    <div class="container">
        <a href="?page=input_buku" type="button" class="btn btn-md mb-3">Input New Book</a>

        <!-- Search Form -->
        <form method="GET" action="">
            <input type="hidden" name="page" value="daftar_buku">
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari buku..."
                        value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-md">Cari</button>
                </div>
            </div>
        </form>

        <!-- tabel -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th style="color: #003092;">No</th>
                        <th style="color: #003092;">Cover Book</th>
                        <th style="color: #003092;">Judul Buku</th>
                        <th style="color: #003092;">Kategori Buku</th>
                        <th style="color: #003092;">Penulis</th>
                        <th style="color: #003092;">Penerbit</th>
                        <th style="color: #003092;">Tahun Terbit</th>
                        <th style="color: #003092;">Deskripsi</th>
                        <th style="color: #003092;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $keyword = isset($_GET['keyword']) ? '%' . $_GET['keyword'] . '%' : '%';

                    $sqlReslt = $pdo->prepare("
                        SELECT * FROM tb_buku a 
                        INNER JOIN tb_kategoribuku b ON a.id_kategori = b.id_kategori 
                        WHERE a.judul LIKE :judul 
                            OR a.penulis LIKE :penulis 
                            OR a.penerbit LIKE :penerbit 
                            OR b.nama_kategori LIKE :kategori
                        ORDER BY a.id_buku DESC
                    ");
                    
                    $sqlReslt->bindValue(':judul', $keyword);
                    $sqlReslt->bindValue(':penulis', $keyword);
                    $sqlReslt->bindValue(':penerbit', $keyword);
                    $sqlReslt->bindValue(':kategori', $keyword);
                    
                    $sqlReslt->execute();
                    
                    

                    while($rowResult = $sqlReslt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td style="color: #003092;"><?= $no++ ?></td>
                        <td><img width="100" src="../../cover_book/<?= $rowResult['gambar_buku'] ?>"></td>
                        <td style="color: #003092;"><?= $rowResult['judul'] ?></td>
                        <td style="color: #003092;"><?= $rowResult['nama_kategori'] ?></td>
                        <td style="color: #003092;"><?= $rowResult['penulis'] ?></td>
                        <td style="color: #003092;"><?= $rowResult['penerbit'] ?></td>
                        <td style="color: #003092;"><?= $rowResult['tahun_terbit'] ?></td>
                        <td style="color: #003092;"><?= $rowResult['deskripsi_buku'] ?></td>
                        <td>
                            <a href="?page=hapus_buku&id=<?= $rowResult['id_buku']; ?>"><i class="bi-trash"></i></a>
                            <a href="?page=edit_buku&id=<?= $rowResult['id_buku']; ?>"><i
                                    class="bi-pencil-square"></i></a>
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