<?php
include "../../lib/koneksi.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_ulasan WHERE id_ulasan = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ?page=data_ulasan");
    } else {
        echo "Berhasil Di hapus";
    }
} else {
    echo "ID tidak ditemukan";
}
?>
