<?php

include "lib/koneksi.php";

$id_user = $_SESSION['id'];
$id_buku = $_GET['idkol'] ?? null;

if ($id_buku) {
    $cek = $pdo->prepare("SELECT COUNT(*) FROM tb_koleksi WHERE id_user = :id_user AND id_buku = :id_buku");
    $cek->execute([':id_user' => $id_user, ':id_buku' => $id_buku]);
    $sudahAda = $cek->fetchColumn();

    if ($sudahAda == 0) {
        $stmt = $pdo->prepare("INSERT INTO tb_koleksi (id_user, id_buku) VALUES (:id_user, :id_buku)");
        $stmt->execute([':id_user' => $id_user, ':id_buku' => $id_buku]);
        $pesan = "Buku berhasil ditambahkan ke koleksi!";
        header("Location: ?page=koleksi_buku");
    } else {
        $pesan = "Buku ini sudah ada di koleksi kamu.";
    }
} else {
    $pesan = "ID buku tidak valid.";
}

?>
