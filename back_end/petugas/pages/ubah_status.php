<?php
include '../../lib/koneksi.php';

if (isset($_GET['id']) && isset($_GET['to'])) {
    $id = $_GET['id'];
    $status = $_GET['to'];

    $allowed = ['borrowed', 'returned'];
    if (in_array($status, $allowed)) {
        $stmt = $pdo->prepare("UPDATE tb_peminjaman SET status_peminjaman = :status WHERE id_peminjaman = :id");
        $stmt->execute([
            ':status' => $status,
            ':id' => $id
        ]);
    }
}

header("Location: ?page=data_peminjaman");
exit();
?>
