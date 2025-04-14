<?php
include "../../lib/koneksi.php";

$id_pinjam = $_GET['id'];
$sql = "SELECT * FROM tb_peminjaman WHERE id_peminjaman = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id_pinjam);
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
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_user = $_POST['id_user'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_peminjaman'];
    $tanggal_kembali = $_POST['tanggal_pengembalian'];
    $status = $_POST['status_peminjaman'];
    $denda = $_POST['denda'];

    $sql = "UPDATE tb_peminjaman 
            SET id_user = :id_user, 
                id_buku = :id_buku, 
                tanggal_peminjaman = :tanggal_pinjam, 
                tanggal_pengembalian = :tanggal_kembali,
                status_peminjaman = :status,
                denda = :denda 
            WHERE id_peminjaman = :id_peminjaman";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id_user", $id_user);
    $stmt->bindParam(":id_buku", $id_buku);
    $stmt->bindParam(":tanggal_pinjam", $tanggal_pinjam);
    $stmt->bindParam(":tanggal_kembali", $tanggal_kembali);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":denda", $denda);
    $stmt->bindParam(":id_peminjaman", $id_peminjaman);

    if ($stmt->execute()) {
        header("Location: ?page=data_peminjaman");
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

.btn:hover {
    color: #003092;
    background-color: #FF9D23;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4 class="mb-4">Perbarui Data User</h4>
            </center>
            <form method="post">
                <input type="hidden" name="id_peminjaman" value="<?= $resl['id_peminjaman'] ?>">

                <div class="mb-3">
                    <label for="id_user" class="form-label">User</label>
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
                    <label class="form-label">Tanggal Peminjaman</label>
                    <input type="date" name="tanggal_peminjaman" class="form-control"
                        value="<?= $resl['tanggal_peminjaman'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pengembalian</label>
                    <input type="date" name="tanggal_pengembalian" class="form-control"
                        value="<?= $resl['tanggal_pengembalian'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status_peminjaman" class="form-control">
                        <option value="borrowed" <?= $resl['status_peminjaman'] == 'borrowed' ? 'selected' : '' ?>>
                           Borrowed </option>
                        <option value="returned"
                            <?= $resl['status_peminjaman'] == 'returned' ? 'selected' : '' ?>>Returned</option>
                        <option value="overdue" <?= $resl['status_peminjaman'] == 'overdue' ? 'selected' : '' ?>>
                            Overdue</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Denda (Rp)</label>
                    <input type="number" name="denda" class="form-control" value="<?= $resl['denda'] ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Update data</button>
            </form>
        </div>
    </div>
</div>