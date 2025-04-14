<?php
include "../../lib/koneksi.php";

$id_ulasan = $_GET['id'];
$sql = "SELECT * FROM tb_ulasan WHERE id_ulasan = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id_ulasan);
$stmt->execute();
$resl = $stmt->fetch(PDO::FETCH_ASSOC);

$sql_user = "SELECT id_user, username FROM tb_user";
$stmt_user = $pdo->prepare($sql_user);
$stmt_user->execute();
$users = $stmt_user->fetchAll(PDO::FETCH_ASSOC);

$sql_buku = "SELECT id_buku, judul FROM tb_buku";
$stmt_buku = $pdo->prepare($sql_buku);
$stmt_buku->execute();
$buku = $stmt_buku->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_ulasan'];
    $id_user = $_POST['id_user'];
    $id_buku = $_POST['id_buku'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    $sql = "UPDATE tb_ulasan SET id_user = :id_user, id_buku = :id_buku, ulasan = :ulasan, rating = :rating 
            WHERE id_ulasan = :id_ulasan";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id_user", $id_user);
    $stmt->bindParam(":id_buku", $id_buku);
    $stmt->bindParam(":ulasan", $ulasan);
    $stmt->bindParam(":rating", $rating);
    $stmt->bindParam(":id_ulasan", $id);

    if ($stmt->execute()) {
        header("Location: ?page=data_ulasan");
        exit();
    } else {
        echo "Gagal memperbarui, silakan coba lagi!";
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
    margin-top: 100px;
}

.col-md-8 h4 {
    font-family: aes;
    color: #003092;

}

.btn {
    color: #FFF2DB;
    width: 100px;
    height: auto;
    float: right;
    font-size: 14px;
    background-color: #003092;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4 class="mb-4">Perbarui Data Ulasan</h4>
            </center>
            <form method="post">
                <input type="hidden" name="id_ulasan" value="<?= $resl['id_ulasan'] ?>">

                <div class="mb-3">
                    <label for="id_user" class="form-label">Username</label>
                    <select name="id_user" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id_user'] ?>"
                            <?= $user['id_user'] == $resl['id_user'] ? 'selected' : '' ?>>
                            <?= $user['username'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_buku" class="form-label">Judul Buku</label>
                    <select name="id_buku" class="form-control" required>
                        <option value="">-- Pilih Buku --</option>
                        <?php foreach ($buku as $b): ?>
                        <option value="<?= $b['id_buku'] ?>" <?= $b['id_buku'] == $resl['id_buku'] ? 'selected' : '' ?>>
                            <?= $b['judul'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ulasan</label>
                    <textarea name="ulasan" class="form-control" rows="4" required><?= $resl['ulasan'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rating (1-5)</label>
                    <input type="number" name="rating" class="form-control" min="1" max="5"
                        value="<?= $resl['rating'] ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>