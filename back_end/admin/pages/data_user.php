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
    h3{
      font-family: aes;
      color: #003092;
    }
    th{
      font-family: biasa;
      
    }
    tbody tr td{
      font-family: biasa;
      font-size: 14px;
    }
</style>
</head>

<body>
    <center>
        <h3 class="mt-3 mb-4">Data Pengguna</h3>
    </center>

    <!-- tabel -->
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th style="color: #003092;">No</th>
                        <th style="color: #003092;">Nama Pengguna</th>
                        <th style="color: #003092;">Nama Lengkap</th>
                        <th style="color: #003092;">Email</th>
                        <th style="color: #003092;">Alamat</th>
                        <th style="color: #003092;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $sql = "SELECT id_user, username, nama_lengkap, email, alamat FROM tb_user WHERE role = 'pelanggan' ";

                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(); // Hanya panggil execute(), tidak perlu disimpan ke variabel

                        while ($rowResult = $stmt->fetch(PDO::FETCH_ASSOC)) { // Ambil hasil query dari $stmt
                        ?>
                    <tr>
                        <td style="color: #003092;"><?=$no++?></td>
                        <td style="color: #003092;"><?=$rowResult['username']?></td>
                        <td style="color: #003092;"><?=$rowResult['nama_lengkap']?></td>
                        <td style="color: #003092;"><?=$rowResult['email']?></td>
                        <td style="color: #003092;"><?=$rowResult['alamat']?></td>
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