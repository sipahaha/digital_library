<?php
include "../../lib/koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pengguna</title>
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
        font-family: biasa;
        font-size: 14px;
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
        <h3 class="mt-3 mb-4">Data Pengguna</h3>
    </center>

    <div class="container mt-5">
        <form method="GET" action="">
            <input type="hidden" name="page" value="data_user">
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari username/email..."
                        value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-md">Cari</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th style="color: #003092;">No</th>
                        <th style="color: #003092;">Nama Pengguna</th>
                        <th style="color: #003092;">Nama Lengkap</th>
                        <th style="color: #003092;">Email</th>
                        <th style="color: #003092;">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  $keyword = isset($_GET['keyword']) ? '%' . $_GET['keyword'] . '%' : '%';

                  $sql = "SELECT id_user, username, nama_lengkap, email, alamat
                          FROM tb_user
                          WHERE role = 'pelanggan' AND (username LIKE ? OR email LIKE ?)
                          ORDER BY id_user DESC";
                  
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute([$keyword, $keyword]);
                  
                  $no = 1;
                  while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                    <tr>
                        <td style="color: #003092;"><?=$no++?></td>
                        <td style="color: #003092;"><?=$rowResult['username']?></td>
                        <td style="color: #003092;"><?=$rowResult['nama_lengkap']?></td>
                        <td style="color: #003092;"><?=$rowResult['email']?></td>
                        <td style="color: #003092;"><?=$rowResult['alamat']?></td>
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