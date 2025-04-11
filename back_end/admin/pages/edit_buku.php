<?php
include "../../lib/koneksi.php";

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    $sql = "SELECT * FROM tb_buku WHERE id_buku = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_buku);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        echo "Buku tidak ditemukan!";
        exit();
    }
} else {
    echo "ID buku tidak ditemukan di URL!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_buku'];
    $title = $_POST['title'];
    $categories = $_POST['categories'];
    $writter = $_POST['writter'];
    $publisher = $_POST['publish'];
    $year = $_POST['year'];
    $desk = $_POST['desk'];
    $folder = '../../cover_book/';

    if (isset($_FILES['gbr']) && $_FILES['gbr']['error'] == 0) {
        $file = $_FILES['gbr']['name'];
        move_uploaded_file($_FILES['gbr']['tmp_name'], $folder . $file);

        $sql = "UPDATE tb_buku 
                SET judul = :title, 
                    id_kategori = :categories, 
                    penulis = :writter, 
                    penerbit = :publisher, 
                    tahun_terbit = :year,
                    deskripsi_buku = :desk, 
                    gambar_buku = :file 
                WHERE id_buku = :id";
    } else {
        $sql = "UPDATE tb_buku 
                SET judul = :title, 
                    id_kategori = :categories, 
                    penulis = :writter, 
                    penerbit = :publisher, 
                    tahun_terbit = :year,
                    deskripsi_buku = :desk 
                WHERE id_buku = :id";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":categories", $categories);
    $stmt->bindParam(":writter", $writter);
    $stmt->bindParam(":publisher", $publisher);
    $stmt->bindParam(":year", $year);
    $stmt->bindParam(":desk", $desk);

    if (isset($file)) {
        $stmt->bindParam(":file", $file);
    }

    if ($stmt->execute()) {
        header("Location: ?page=daftar_buku");
        exit();
    } else {
        echo "Gagal mengupdate data, silakan coba lagi.";
    }
}

// id buku nya
    $sql = "SELECT * FROM tb_buku WHERE id_buku = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $resl = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .container {
        font-size: 14px;
        font-family: biasa;
        color: #003092;
    }

    .col-md-8 {
        margin-top: 30px;
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
                <center>
                    <h4 class="mb-4">Tambah Buku</h4>
                </center>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_buku" value="<?= $resl['id_buku']; ?>">

                    <div class="mb-3">
                        <label>Judul Buku</label>
                        <input type="text" name="title" class="form-control" value="<?= $resl['judul']; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Kategori Buku</label>
                        <select name="categories" class="form-control">
                            <?php
            $sqlkat = "SELECT * FROM tb_kategoribuku";
            $stmtkat = $pdo->prepare($sqlkat);
            $stmtkat->execute();
            $categories = $stmtkat->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $result) {
                $selected = ($resl['id_kategori'] == $result['id_kategori']) ? "selected" : "";
                echo "<option value='".$result['id_kategori']."' $selected>".$result['nama_kategori']."</option>";
            }
            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Penulis Buku</label>
                        <input type="text" name="writter" class="form-control" value="<?= $resl['penulis']; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Penerbit Buku</label>
                        <input type="text" name="publish" class="form-control" value="<?= $resl['penerbit']; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Tahun Terbit</label>
                        <input type="text" name="year" class="form-control" value="<?= $resl['tahun_terbit']; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea type="text" name="desk" class="form-control"
                            value="<?= $resl['deskripsi_buku']; ?>"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Gambar Saat Ini:</label><br>
                        <img src="../../cover_book/<?= $resl['gambar_buku']; ?>" alt="cover" width="120"><br><br>
                        <label>Upload Gambar Baru (Opsional):</label>
                        <input type="file" name="gbr" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-md">Update Data</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>