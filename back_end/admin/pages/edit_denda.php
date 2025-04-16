<?php
include '../../lib/koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID Denda tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nilai = $_POST['nilai'];

    $sql = "UPDATE tb_denda SET nilai = :nilai WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([
        ':nilai' => $nilai,
        ':id' => $id
    ]);

    if ($success) {
        header("Location: ?page=set_denda");
        exit();
    } else {
        echo "Terjadi kesalahan saat memperbarui denda.";
    }
}

$stmt_denda = $pdo->prepare("SELECT * FROM tb_denda WHERE id = :id");
$stmt_denda->execute([':id' => $id]);
$dendaData = $stmt_denda->fetch(PDO::FETCH_ASSOC);

if (!$dendaData) {
    die("Denda tidak ditemukan.");
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
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4 class="mb-4">Edit Denda</h4>
            </center>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nilai">Denda per Hari (Rp):</label>
                    <input type="number" class="form-control" name="nilai" value="<?= $dendaData['nilai'] ?>" oninput="formatRupiah(this)">
                </div>
                <button type="submit" class="btn btn-md">Simpan</button>
            </form>
        </div>
    </div>
</div>
