<?php
include "../../lib/koneksi.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    @font-face {
        font-family: aes;
        src: url(../../asset/font/AtemicaSans_PERSONAL_USE_ONLY.otf);
    }

    @font-face {
        font-family: biasa;
        src: url(../../asset/font/GTVCS-Book.otf);
    }

    .content {
        margin-left: 250px;
        /* Sesuaikan dengan lebar sidebar */
        padding: 20px;
        flex-grow: 1;
    }
    </style>
</head>

<body>
    <div class="nav">
        <?php
    include "sidebar.php";
    ?>
    </div>
    <div class="content" style="margin-left: 285px;">

        <?php
      $page = isset($_GET['page'])?$_GET['page']:'';
      if ($page) {
          if($page=='input_buku'){
              include "pages/input_buku.php";
            }
            if($page=='input_kat'){
              include "pages/input_kategori.php";
            }
            if($page=='daftar_buku'){
                include "pages/daftar_buku.php";
              }
              if($page=='daftar_kat'){
                include "pages/daftar_kategori.php";
              }
              if($page=='data_user'){
                include "pages/data_user.php";
              }
              if($page=='data_peminjaman'){
                include "pages/data_peminjaman.php";
              }
              if($page=='data_ulasan'){
                include "pages/data_ulasan.php";
              }
              if($page=='input_petugas'){
                include "pages/input_petugas.php";
              }
            }else{
              if($page=='dashboard'){
              include "pages/dashboard.php";
              }
            }
        
      ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>