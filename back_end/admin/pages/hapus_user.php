<?php
include "../../lib/koneksi.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_user WHERE id_user = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ?page=data_user");
    } else {
        echo "Berhasil Di hapus";
    }
} else {
    echo "ID tidak ditemukan";
}
?>
