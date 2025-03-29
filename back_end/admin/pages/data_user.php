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
</head>

<body>
    <center>
        <h3>Data Pengguna</h3>
    </center>

    <!-- tabel -->
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $sql = "SELECT id_user, username, nama_lengkap, email, alamat FROM tb_user WHERE role = 'pengguna'";

                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(); // Hanya panggil execute(), tidak perlu disimpan ke variabel

                        while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) { // Ambil hasil query dari $stmt
                        ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$rowResult['username']?></td>
                        <td><?=$rowResult['nama_lengkap']?></td>
                        <td><?=$rowResult['email']?></td>
                        <td><?=$rowResult['alamat']?></td>
                        <td>
                            <a href="?page=hapus&id=<?=$rowResult['id_user']?>"><i class="bi-trash"></i></a>
                            <a href="?page=edit&id=<?=$rowResult['id_user']?>"><i class="bi-pencil-square"></i></a>
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