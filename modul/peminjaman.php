<?php
include "lib/koneksi.php";

$id_buku = $_GET['idpinjam'];
$stmt = $pdo->prepare("SELECT judul FROM tb_buku WHERE id_buku = ?");
$stmt->execute([$id_buku]);
$buku = $stmt->fetch();

$tanggal_peminjaman = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lama'])) {
    $lama = (int) $_POST['lama'];
    $tanggal_pengembalian = date('Y-m-d', strtotime("+$lama days"));
    $id_user = $_SESSION['id']; 
    $status = 'borrowed';
    $denda = '0';
    
    $cek = $pdo->prepare("SELECT * FROM tb_peminjaman WHERE id_user = :id_user AND id_buku = :id_buku AND status_peminjaman = 'orrowed'");
    $cek->execute([
        ':id_user' => $id_user,
        ':id_buku' => $id_buku
    ]);

    if ($cek->rowCount() > 0) {
        echo "<script>alert('Buku ini sudah Anda pinjam.'); window.location.href='?page=koleksi_pinjam';</script>";
    } else {
   
    $sql = "INSERT INTO tb_peminjaman (id_user, id_buku, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman, denda)
            VALUES (:id_user, :id_buku, :tgl_pinjam, :tgl_kembali, :status, 0)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id_user' => $id_user,
        ':id_buku' => $id_buku,
        ':tgl_pinjam' => $tanggal_peminjaman,
        ':tgl_kembali' => $tanggal_pengembalian,
        ':status' => $status
    ]);
  
        $id_peminjaman = $pdo->lastInsertId();
        header("Location: ?page=sukses&id=$id_peminjaman");
    exit();
}
}

?>
<style>
h2 {
    font-family: aes;
    margin-top: 50px;
    color: #003092;

}

form {
    font-family: biasa;
    color: #003092;
}

.btn-md {
    margin-top: 20px;
    font-family: biasa;
    background-color: #FF9D23;
    color: #003092;
}

.btn-md:hover {
    margin-top: 20px;
    font-family: biasa;
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h2 class="mb-5">Form Peminjaman Buku</h2>
            </center>

            <form method="post">
                <input type="hidden" name="id_buku" value="<?= htmlspecialchars($id_buku) ?>">
                <div class="mb-3">
                    <label>Judul Buku:</label>
                    <input class="form-control" type="text" value="<?= htmlspecialchars($buku['judul']) ?>" readonly>
                </div>
                <div class="mb-3">
                    <label>Tanggal Peminjaman:</label>
                    <input class="form-control" type="date" value="<?= $tanggal_peminjaman ?>" readonly>
                </div>
                <div class="mb-3">
                    <label>Berapa Lama Peminjaman:</label>
                    <select class="form-control" name="lama" required>
                        <option value="">Pilih</option>
                        <option value="1">1 Hari</option>
                        <option value="3">3 Hari</option>
                        <option value="7">7 Hari</option>
                        <option value="14">14 Hari</option>
                    </select>
                </div>
                <button class="btn btn-md" type="submit">Konfirmasi Peminjaman</button>
            </form>

        </div>
    </div>
</div>