<?php
session_start();
include "lib/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT id_user, username, password, role FROM tb_user WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['id'] = $user['id_user'];
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        
        if ($user['role'] == 'admin') {
            echo "<script>document.location.href = 'back_end/admin/index.php';</script>";
        } elseif ($user['role'] == 'petugas') {
            echo "<script>document.location.href = 'back_end/petugas/index.php';</script>";
        } else {
            echo "<script>document.location.href = 'index.php';</script>";
        }
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    @font-face {
        font-family: aes;
        src: url(asset/font/AtemicaSans_PERSONAL_USE_ONLY.otf);
    }

    @font-face {
        font-family: biasa;
        src: url(asset/font/GTVCS-Book.otf);
    }

    .container {
        width: 1300px;
        height: 500px;
        margin-top: 80px;
        background-color: #FFF2DB;
        border-radius: 20px;
    }
    h2{
        color: #003092;
        font-family: aes;
        margin-top: 80px;
    }
    .col-md-6 form {
        font-size: 14px;
        margin-right: 50px;
        color: #003092;
        font-family: biasa;
    }

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
    p{
        margin-top: 30px;
        color: #003092;
        font-family: biasa;
        font-size: 14px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <center><img src="asset/img/login.png" alt="" height="auto" width="500"></center>
            </div>
            <div class="col-md-6">
                <center><h2 class="mb-5">Login In Here</h2></center>
                <form action="" method="post">
                <input type="hidden" name="id" class="form-control">
                    <div class="mb-3">
                        <label>Nama Pengguna</label>
                        <input type="text" name="user" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-md">Log In</button>
                </form>
                    <p>Don't have account ? <a href="register.php">Sign up Here</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>