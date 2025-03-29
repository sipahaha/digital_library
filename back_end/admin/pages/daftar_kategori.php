<?php
include "../../lib/koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
  <body>
    <center><h3>Daftar Kategori</h3></center>
    <a href="input_buku.php" type="button" class="btn btn-success">Input New Book</a>

    <!-- tabel -->
    <div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
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
                    <td><?=$no++?></td>
                    <td><img width="100" src="../../../gbrcategori/<?=$rowResult['gambar_kategori']?>"></td>
                    <td><?=$rowResult['nama_kategori']?></td>
                    <td><a href="?page=hapus&id=<?=$rowResult['id_buku']?>"><i class="bi-trash"></i></a> <a href=""><i class="bi-pencil-square"></i></a></td>
                </tr>
                <?php
              }
                ?>
            </tbody>
        </table>
    </div>
</div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>