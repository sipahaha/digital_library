<?php
include "../../lib/koneksi.php";

$id_user = $_GET['id'];
$sql = "SELECT * FROM tb_user WHERE id_user = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id_user);
$stmt->execute();

$resl = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $nml = $_POST['nml'];
    $email = $_POST['email'];
    $address = $_POST['add'];

    $sql = "UPDATE tb_user SET username = :username, nama_lengkap = :nml, email = :email, alamat = :address WHERE id_user = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id_user", $id_user);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":nml", $nml);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":address", $address);
    $stmt->execute();

    if ( $stmt->execute()) {
        header("Location: ?page=data_user");
        exit();
    }else{
        echo "Gagal memperbarui, Silahkan Coba Lagi !";
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
    color: #FFF2DB;
    width: 100px;
    height: auto;
    float: right;
    font-size: 14px;
    background-color: #003092;
}

.btn:hover {
    color: #003092;
    background-color: #FF9D23;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4 class="mb-4">Perbarui Data User</h4>
            </center>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$resl['id_user'];?>">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?=$resl['username'];?>">
                </div>
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nml" class="form-control" value="<?=$resl['nama_lengkap'];?>">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?=$resl['email'];?>">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="add" class="form-control" value="<?=$resl['alamat'];?>">
                </div>
                <button type="submit" class="btn btn-md">Input Data</button>
            </form>
        </div>
    </div>
</div>