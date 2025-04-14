<?php
include "../../lib/koneksi.php";

$id_kat = $_GET['id'];
$sql = "SELECT * FROM tb_kategoribuku WHERE id_kategori = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id_kat);
$stmt->execute();

$resl = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id_kategori'];
    $nama = $_POST['name'];
    $folder = '../../gbrcategori/'; 

    if (isset($_FILES['gbr']) && $_FILES['gbr']['error'] == 0) {
        $file = $_FILES['gbr']['name'];
        move_uploaded_file($_FILES['gbr']['tmp_name'], $folder . $file);

        $sql = "UPDATE tb_kategoribuku 
                SET nama_kategori = :nama, gambar_buku = :file 
                WHERE id_kategori = :id";
    } else {
        $sql = "UPDATE tb_kategoribuku 
                SET nama_kategori = :nama 
                WHERE id_kategori = :id";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nama", $nama);

    if (isset($file)) {
        $stmt->bindParam(":file", $file);
    }

    if ($stmt->execute()) {
        header("Location: ?page=daftar_kat");
        exit();
    } else {
        echo "Gagal Memperbarui, silahkan coba lagi !";
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
    margin-top: 100px;
}

.col-md-8 h4 {
    font-family: aes;
    color: #003092;

}

.btn {
    background-color: #FF9D23;
    width: 100px;
    height: auto;
    float: right;
    font-size: 14px;
}

.btn:hover {
    border-color: #FF9D23;
    background-color: #FFF2DB;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4 class="mb-4">Tambah Kategori Buku</h4>
            </center>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_kategori" value="<?=$resl['id_kategori'];?>">
                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="name" class="form-control" value="<?=$resl['nama_kategori'];?>">
                </div>
                <div class="mb-3">
                    <label>Gambar Saat Ini:</label><br>
                    <img src="<?='../../gbrcategori/' . $resl['gambar_kategori']; ?>" alt="cover" width="120"><br><br>
                    <label>Upload Gambar Baru (Opsional):</label>
                    <input type="file" name="gbr" class="form-control">
                </div>

                <button type="submit" class="btn btn-md">Input Data</button>
            </form>
        </div>
    </div>
</div>