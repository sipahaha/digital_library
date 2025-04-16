<?php
session_start();
include "../../lib/koneksi.php";

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    if ($_SESSION['role'] == 'admin') {
        $sql = "UPDATE tb_user SET role = 'admin' WHERE id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ?page=daftar_petugas");
            exit; 
        } else {
            echo "<script>alert('Terjadi kesalahan.'); window.location.href='?page=daftar_petugas';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Anda tidak memiliki izin untuk melakukan ini.'); window.location.href='?page=daftar_petugas';</script>";
        exit;
    }
}
?>
