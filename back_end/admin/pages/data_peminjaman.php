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
</head>

<body>
    <center>
        <h3>Data Peminjaman</h3>
    </center>

    <!-- tabel -->
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      <?php
                            $no = 1;
                            $sql = "SELECT a.id_peminjaman, b.username, c.judul, a.tanggal_peminjaman, a.tanggal_pengembalian, a.status_peminjaman
                                    FROM tb_peminjaman a
                                    INNER JOIN tb_user b ON a.id_user = b.id_user
                                    INNER JOIN tb_buku c ON a.id_buku = c.id_buku"; // Hapus WHERE jika ingin semua data

                                $stmt = $pdo->prepare($sql);
                                $stmt->execute(); // Hapus parameter karena WHERE dihapus

                        while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$rowResult['username']?></td>
                        <td><?=$rowResult['judul']?></td>
                        <td><?=$rowResult['tanggal_peminjaman']?></td>
                        <td><?=$rowResult['tanggal_pengembalian']?></td>
                        <td><?=$rowResult['status_peminjaman']?></td>
                        <td>
                            <a href="?page=hapus&id=<?=$rowResult['id_peminjaman']?>"><i class="bi-trash"></i></a>
                            <a href="?page=edit&id=<?=$rowResult['id_peminjaman']?>"><i
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