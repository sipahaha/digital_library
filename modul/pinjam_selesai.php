<?php
include "lib/koneksi.php";

$id = $_GET['id'];
$sql = "SELECT * FROM tb_peminjaman a
        INNER JOIN tb_user b ON a.id_user = b.id_user
        INNER JOIN tb_buku c ON a.id_buku = c.id_buku 
        WHERE a.id_buku = :id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute(); 
$resl = $stmt->fetch(PDO::FETCH_ASSOC);

$sql_status = "UPDATE tb_peminjaman SET status_peminjaman = 'returned' WHERE id_buku = :id";
$stmt = $pdo->prepare($sql_status);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ulasan = $_POST['ulasan'];
    $rate = $_POST['rating'];
    $id_user = $resl['id_user'];
    $id_buku = $resl['id_buku'];

    $sql = "INSERT INTO tb_ulasan (id_user, id_buku, ulasan, rating) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([$id_user, $id_buku, $ulasan, $rate]);

    if ($success) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal, coba lagi ya!";
    }
}
?>

<style>
.container {
    font-size: 14px;
    font-family: biasa;
    color: #003092;
}

.col-md-8 {
    margin-top: 50px;
}

.col-md-8 h4 {
    font-family: aes;
    color: #003092;

}

.col-md-8 .btn {
    color: #FFF2DB;
    width: 100px;
    height: auto;
    float: right;
    font-size: 14px;
    background-color: #003092;
}
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: start;
}

.rating input {
    display: none;
}

.rating label {
    font-size: 2rem;
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s;
}

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: gold;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4 class="mb-4">Silahkan Isi Form Ulasan</h4>
                <p>Isi form ulasan untuk buku yang kamu baca ! 😊 </p>
            </center>
            <form method="post">
                <input type="hidden" name="id_ulasan">

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="user" class="form-control" id="" value="<?= htmlspecialchars($resl['username']) ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="title" class="form-control" id="" value="<?= htmlspecialchars($resl['judul']) ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ulasan</label>
                    <textarea name="ulasan" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Rating:</label>
                    <div class="rating">
                        <input type="radio" name="rating" id="bintang5" value="5"><label for="bintang5">&#9733;</label>
                        <input type="radio" name="rating" id="bintang4" value="4"><label for="bintang4">&#9733;</label>
                        <input type="radio" name="rating" id="bintang3" value="3"><label for="bintang3">&#9733;</label>
                        <input type="radio" name="rating" id="bintang2" value="2"><label for="bintang2">&#9733;</label>
                        <input type="radio" name="rating" id="bintang1" value="1"><label for="bintang1">&#9733;</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Kirim Ulasan</button>
            </form>
        </div>
    </div>
</div>