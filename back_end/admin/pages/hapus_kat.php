<?php
include "../../lib/koneksi.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_kategoribuku WHERE id_kategori = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ?page=daftar_kat");
    } else {
        echo "Data gagal di hapus";
    }
} else {
    echo "ID tidak ditemukan";
}
?>
