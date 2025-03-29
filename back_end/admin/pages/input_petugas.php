<?php
include "../../lib/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $user = $_POST['username'];
    $name = $_POST['nml'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $address = $_POST['address'];
    $role = "petugas";

    $sql = "INSERT INTO tb_user (id_user, username, nama_lengkap, password, email, alamat, role) VALUES (:id, :user, :name, :pass, :email, :address, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam("id", $id);
    $stmt->bindParam("user", $user);
    $stmt->bindParam("name", $name);
    $stmt->bindParam("pass", $pass);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("address", $address);
    $stmt->bindParam("role", $role);
  

    if ($stmt->execute()) {
        echo "Data Berhasil Ditambahkan";
    }else{
        echo "Sudah mempunyai akun";
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
      .btn {
        background-color: #FF9D23;
        width: 100px;
        height: auto;
        float: right;
    }

    .btn:hover {
        border-color: #FF9D23;
        background-color: #FFF2DB;
    }
  </style>
</head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                <input type="hidden" name="id">
                    <div class="mb-3">
                        <label>Nama Pengguna</label>
                        <input type="text" name="username" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nml" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="pass" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="Email" name="email" id="" class="form-control" placeholder="name@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <input type="textarea" name="address" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-md">Input Data</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>