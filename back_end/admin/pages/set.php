<?php
include '../../lib/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = 'denda';
    $nilai = $_POST['nilai'];

    $sql = "INSERT INTO tb_denda (nama_pengaturan, nilai) VALUES (:nama, :nilai)";
    $stmt = $pdo->prepare($sql);
    $succes = $stmt->execute([
        ':nama' => $nama,
        ':nilai' => $nilai
    ]);

    if ($succes) {
        echo ("Denda Berhasil Ditambahkan");
    }

}
?>
<style>
.container {
    font-size: 14px;
    font-family: biasa;
    color: #003092;
}

.col-md-8 {
    margin-top: 30px;
}

.col-md-8 h4 {
    font-family: aes;
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4 class="mb-4">Set Up Denda</h4>
            </center>
            <form action="" method="post">
                <input type="hidden" name="id">
                <div class="mb-3">
                    <label for="nilai">Denda per Hari (Rp):</label>
                    <input type="number" class="form-control" name="nilai" oninput="formatRupiah(this)">
                </div>
                <button type="submit" class="btn btn-md">Simpan</button>
            </form>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-hover align-middle">
                <thead class="table">
                    <tr>
                        <th style="color: #003092;">No</th>
                        <th style="color: #003092;">Denda Per Hari</th>
                        <th style="color: #003092;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                         $stmt_denda = $pdo->prepare("SELECT id, nilai FROM tb_denda ORDER BY id DESC LIMIT 1");
                         $stmt_denda->execute();
                         $dendaData = $stmt_denda->fetch(PDO::FETCH_ASSOC);
                         $denda = $dendaData['nilai'] ?? 0;
                        ?>
                        <td>1</td>
                        <td>Rp <?= number_format($denda, 0, ',', '.') ?></td> 
                        <td> <div class="action">
                                <a href="?page=edit_denda&id=<?= $dendaData['id']; ?>" class="btn btn-md"><i
                                        class="bi-pencil-square"></i></a>
                            </div></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>