<?php
include "../../lib/koneksi.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_peminjaman WHERE id_peminjaman = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ?page=data_peminjaman");
    } else {
        echo "Berhasil Di hapus";
    }
} else {
    echo "ID tidak ditemukan";
}
?>
