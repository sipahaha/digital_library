<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tanggal_peminjaman'];
    $tgl_kembali = $_POST['tanggal_pengembalian'];

    $status = 'pinjam';
    $denda = 0;

    $stmt = $pdo->prepare("INSERT INTO peminjaman (id_user, id_buku, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman, denda)
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$id_user, $id_buku, $tgl_pinjam, $tgl_kembali, $status, $denda]);

    echo "";
}
?>
