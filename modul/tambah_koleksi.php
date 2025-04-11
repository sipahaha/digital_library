<?php
session_start();
include "lib/koneksi.php"; 

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['idkol'];
$stmt = $pdo->prepare("SELECT * FROM tb_buku WHERE id_buku = :id_buku");
$stmt->bindParam(':id_buku', $id);
$stmt->execute();

$view = $stmt->fetch(PDO::FETCH_ASSOC);
$id_buku = $view['id_buku'];

// session buat user
$id_user = $_SESSION['id_user'];
$id_buku = isset($_GET['id_buku']) ? $_GET['id_buku'] : null;

if ($id_buku) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM koleksi WHERE id_user = ? AND id_buku = ?");
        $stmt->execute([$id_user, $id_buku]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['flash'] = "Buku sudah ada di koleksi kamu.";
        } else {
            $insert = $pdo->prepare("INSERT INTO koleksi (id_user, id_buku) VALUES (?, ?)");
            $insert->execute([$id_user, $id_buku]);
            $_SESSION['flash'] = "Buku berhasil ditambahkan ke koleksi.";
        }
    } catch (PDOException $e) {
        $_SESSION['flash'] = "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    $_SESSION['flash'] = "ID buku tidak valid.";
}

header("Location: koleksi.php");
exit;
?>
