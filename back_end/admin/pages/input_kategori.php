<?php
include "../../lib/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_kategori'];
    $name = $_POST['name'];
    $file = $_FILES['gbr']['name'];
    $folder = '../../gbrcategori/';

    if(isset($_FILES['gbr']) && $_FILES['gbr']['error'] == 0) {
        move_uploaded_file($_FILES['gbr']['tmp_name'], $folder.$file);

        $sql = "INSERT INTO tb_kategoribuku VALUES (:id, :name, :file)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":file", $file);

        if ($stmt->execute()) {
            header("Location: ?page=daftar_kat");
            exit();
        }else{
            echo "Silahkan Input Kembali";
        }
    }else{
        echo "Gagal MengUpload Gambar";
    }

    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Kategori Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <center><h4 class="mb-4">Tambah Kategori Buku</h4></center>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_kategori">
                    <div class="mb-3">
                        <label>Nama Kategori</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Upload Gambar :</label>
                        <input type="file" name="gbr" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-md">Input Data</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>