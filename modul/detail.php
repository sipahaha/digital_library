<?php
include "lib/koneksi.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT FROM tb_buku WHERE id_buku = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
}
?>
