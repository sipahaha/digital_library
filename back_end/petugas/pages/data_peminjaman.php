<?php
include "../../lib/koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Peminjaman</title>
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

    .search-form {
        margin: 20px 0;
    }

    .btn-md {
        color: #FFF2DB;
        background-color: #003092;
    }

    .btn-md:hover {
        background-color: #FF9D23;
        color: #003092;
    }

    .action {
        display: flex;
    }

    .action a {
        margin-left: 5px;
    }
    </style>
</head>

<body>
    <center>
        <h3 class="mt-3 mb-4">Data Peminjaman</h3>
    </center>

    <div class="container mt-3">
        <form method="GET" action="">
            <input type="hidden" name="page" value="data_peminjaman">
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari username/judul buku..."
                        value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-md">Cari</button>
                </div>
            </div>
        </form>

        <!-- Tabel -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th style="color: #003092;">No</th>
                        <th style="color: #003092;">Nama Pengguna</th>
                        <th style="color: #003092;">Judul Buku</th>
                        <th style="color: #003092;">Tanggal Peminjaman</th>
                        <th style="color: #003092;">Tanggal Pengembalian</th>
                        <th style="color: #003092;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $keyword = isset($_GET['keyword']) ? '%' . $_GET['keyword'] . '%' : '%';

                    $sql = "
                        SELECT a.id_peminjaman, b.username, c.judul, a.tanggal_peminjaman, a.tanggal_pengembalian, a.status_peminjaman, a.denda
                        FROM tb_peminjaman a
                        INNER JOIN tb_user b ON a.id_user = b.id_user
                        INNER JOIN tb_buku c ON a.id_buku = c.id_buku
                        WHERE b.username LIKE ? OR c.judul LIKE ?
                        ORDER BY a.id_peminjaman DESC
                    ";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$keyword, $keyword]);

                    while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($rowResult['username']) ?></td>
                        <td><?= htmlspecialchars($rowResult['judul']) ?></td>
                        <td><?= $rowResult['tanggal_peminjaman'] ?></td>
                        <td><?= $rowResult['tanggal_pengembalian'] ?></td>
                        <td><?= $rowResult['status_peminjaman'] ?></td>
                        <td><?= $rowResult['denda'] ?></td>
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