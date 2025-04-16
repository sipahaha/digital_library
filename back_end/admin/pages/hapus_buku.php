<?php
include "../../lib/koneksi.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $cekPeminjaman = $pdo->prepare("SELECT COUNT(*) FROM tb_peminjaman WHERE id_buku = :id");
        $cekPeminjaman->bindParam(":id", $id, PDO::PARAM_INT);
        $cekPeminjaman->execute();
        $jumlahPeminjaman = $cekPeminjaman->fetchColumn();

        if ($jumlahPeminjaman > 0) {
            echo "Buku tidak bisa dihapus karena memiliki riwayat peminjaman.";
            exit;
        }
        $pdo->beginTransaction();

        $stmtRelasi = $pdo->prepare("DELETE FROM kategoribuku_relasi WHERE id_buku = :id");
        $stmtRelasi->bindParam(":id", $id, PDO::PARAM_INT);
        $stmtRelasi->execute();

        $stmtBuku = $pdo->prepare("DELETE FROM tb_buku WHERE id_buku = :id");
        $stmtBuku->bindParam(":id", $id, PDO::PARAM_INT);
        $stmtBuku->execute();

        $pdo->commit();

        header("Location: ?page=daftar_buku");
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Gagal menghapus buku: " . $e->getMessage();
    }

} else {
    echo "ID tidak ditemukan";
}
