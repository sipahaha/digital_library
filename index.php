<?php
    session_start();
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

    .footer {
        background-color: #FFF2DB;
        margin-top: 200px;
        color: #003092;
    }

    .footer .row {
        margin-left: 30px;
    }

    .col-md-3 {
        margin-top: 20px;
        padding: 20px;
    }
    .link{
      display: flex;
    }

    .link .btn-md {
        border-radius: 100px;
        color: #003092;
        border-color: #003092;
        margin-top: 20px;
        margin-left: 7px;
    }
    .link .btn-md:hover{
      border-color: #FF9D23;
    }

    .link .btn-md a {
        text-decoration: none;
        color: #003092;
    }
    .link .btn-md a:hover {
        text-decoration: none;
        color: #FF9D23;
    }

     .isi a {
        text-decoration: none;
        color: #003092;
        line-height: 34px;

    }

    .fft b {
        border-bottom: 2px solid;
        border-color: #003092;
    }

    .col-md-3 .isi   {
        margin-top: 28px;
        color: #003092;
    }

    .end .text {
        background-color:  #003092;
        color: #FF9D23;
        height: 60px;
        text-align: center;
    }

    .end .text a {
        text-decoration: none;
        color: #FFF2DB;;
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
              if($page=='sukses'){
                include "modul/sukses_pinjam.php";
              }
              if($page=='koleksi_buku'){
                include "modul/koleksi_buku.php";
              }
              if($page=='koleksi_pinjam'){
                include "modul/koleksi_pinjam.php";
              }
              if($page=='pinjam_selesai'){
                include "modul/pinjam_selesai.php";
              }
        }else{
            include "modul/default.php";
        }
        
      ?>

        <div class="footer">
            <div class="container-fluid" style ="font-family: biasa;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="company">
                            <img src="asset/img/image11.png" alt="" width="auto" height="60">
                            <div class="link">
                                <button type="button" class="btn btn-md"><a href="#" class="bi-instagram"></a></button>
                                <button type="button" class="btn btn-md"><a href="#" class="bi-twitter"></a></button>
                                <button type="button" class="btn btn-md"><a href="#" class="bi-facebook"></a></button>
                                <button type="button" class="btn btn-md"><a href="#" class="bi-envelope"></a></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 fft">
                        <b>Our Services</b><br>
                        <div class="isi">
                            <a href="?page=book">Peminjaman Buku Secara Online</a><br>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <b>Contact Us</b><br>
                        <div class="isi">
                            <p><i class="bi-telephone-fill">&nbsp;</i>+644 686 083</p>
                            <p><i class="bi-envelope"></i>&nbsp;eternalibri@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <b>Offline Store</b><br>
                        <div class="isi">
                            <p style="line-height: 30px;"><i class="bi-shop"></i>&nbsp; Jl. Kp. Kedungwaringin No.7 Blok
                                E,
                                Waringin Jaya, Kecamatan
                                Bojonggede, Kabupaten Bogor, Jawa Barat 16320</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="end">
            <div class="text p-3">
                © 2024 Copyright : &nbsp;<a href="#">Eterna_libri.com</a>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>