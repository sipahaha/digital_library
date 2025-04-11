<?php
    include "lib/koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
    @font-face {
        font-family: aes;
        src: url(asset/font/AtemicaSans_PERSONAL_USE_ONLY.otf);
    }

    @font-face {
        font-family: biasa;
        src: url(asset/font/GTVCS-Book.otf);
    }
    </style>
</head>

<body>
    <?php
    include "modul/nav.php";
    ?>

    <div class="container-fluid">
        <?php
      $page = isset($_GET['page'])?$_GET['page']:'';
      if ($page) {
          if($page=='categories'){
              include "modul/catalog.php";
            }
            if($page=='detail'){
              include "modul/detail.php";
            }
            if($page=='koleksi'){
                include "modul/koleksi.php";
              }
              if($page=='book'){
                include "modul/book.php";
              }
              if($page=='pinjam'){
                include "modul/peminjaman.php";
              }
              if($page=='proses'){
                include "modul/proses_peminjaman.php";
              }
        }else{
            include "modul/default.php";
        }
        
      ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>