<?php
include "../../lib/koneksi.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_buku WHERE id_buku = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ?page=daftar_buku");
    } else {
        echo "Berhasil Di hapus";
    }
} else {
    echo "ID tidak ditemukan";
}
?>
