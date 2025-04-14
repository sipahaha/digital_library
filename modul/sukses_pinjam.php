<?php
include "lib/koneksi.php";

$id_pinjam = $_GET['id'];
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT tanggal_peminjaman, tanggal_pengembalian FROM tb_peminjaman WHERE id_peminjaman = :id");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<style>
    .container{
        margin-top: 100px;
    }
h2{
    color: #003092;
    font-family: aes;
}
p{
    color: #003092;
    font-family: biasa;
}
i{
    color: #003092;
    font-family: biasa;
}
.btn-md {
    margin-top: 20px;
    font-family: biasa;
    background-color: #FF9D23;
    color: #003092;
}

.btn-md:hover {
    margin-top: 20px;
    font-family: biasa;
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
}
</style>
<div class="container">
    <div class="row">
        <center><h2>Berhasil Meninjam Buku !!</h2></center>
        <center><p>Jangan Lupa untuk mengembalikan buku sesuai dengan tengat waktu yang sudah di berikan, Terimakasih.</p></center><br><br>
        <center><p>Tanggal Peminjaman : <?= $data ['tanggal_peminjaman']; ?></center>
        <center><p>Tanggal Pengembalian : <?= $data ['tanggal_pengembalian']; ?></p></center>
        <center><i>- Selamat Membaca -</i></center>
        <center><a href="index.php" type="button" class="btn btn-md">Oke</a></center>
    </div>
</div>