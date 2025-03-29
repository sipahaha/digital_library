<?php
include "../../lib/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_buku'];
    $title = $_POST['title'];
    $categories = $_POST['categories'];
    $writter = $_POST['writter'];
    $publisher = $_POST['publish'];
    $year = $_POST['year'];
    $file = $_FILES['gbr']['name'];
    $folder = '../../../cover_book/';

    if(isset($_FILES['gbr']) && $_FILES['gbr']['error'] == 0) {
        move_uploaded_file($_FILES['gbr']['tmp_name'], $folder.$file);

        $sql = "INSERT INTO tb_buku (id_buku, id_kategori, judul, penulis, penerbit, tahun_terbit, gambar_buku) VALUES (:id, :title, :categories, :writter, :publisher, :year, :file)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":categories", $categories);
        $stmt->bindParam(":writter", $writter);
        $stmt->bindParam(":publisher", $publisher);
        $stmt->bindParam(":year", $year);
        $stmt->bindParam(":file", $file);

        if ($stmt->execute()) {
            header("Location: data_buku.php");
            exit();
        }else{
            echo "Silahkan Input Kembali";
        }

        
    }else{
        echo "Gagal mengupload gambar";
    }

}
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
                    <input type="hidden" name="id_buku">
                    <div class="mb-3">
                        <label>Judul Buku</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Kategori Buku</label>
                        <select name="categories">
                            <?php
                        $sqlkat = "SELECT * FROM tb_kategoribuku";
                        $stmt =$pdo->prepare($sqlkat);

                        $categories = $sqlkat->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($categories as $result) {
                            echo "<option value='".$result['id_kategori']."'>'".$result['nama_kategori']."'</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Penulis Buku</label>
                        <input type="text" name="writter" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Penerbit Buku</label>
                        <input type="text" name="publish" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Tahun Terbit</label>
                        <input type="text" name="year" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Upload Gambar :</label>
                        <input type="file" name="gbr" class="form-control" required>
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