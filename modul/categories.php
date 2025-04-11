<style>
     .content2 {
        margin-top: 100px;
    }

    .content2 h2 {
        font-family: aes;
        text-align: center;
        color: #003092;
    }
    
    .col-lg-12 img:hover {
        transform: scale(1.5, 1.5);
    }
</style>
<div class="content2" id="categories">
            <div class="row">
                <h2>Categories Book</h2>
                <div class="col-lg-12 d-flex text-center justify-content-center"
                    style="font-family: biasa; color: #FF9D23">
                    <?php
                     $sqlReslt = $pdo->prepare("SELECT * FROM tb_kategoribuku");
                     $sqlReslt->execute();
                
                while($rowResult = $sqlReslt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="roman p-4">
                        <a href="?page=categories&id=<?=$rowResult['id_kategori']?>"><img src="gbrcategori/<?=$rowResult['gambar_kategori']?>" class="rounded-circle" alt="" height="100"
                                width="auto"></a><br>
                        <div class="text-book pt-4"><b><?=$rowResult['nama_kategori']?></b></div>
                    </div>
                    <?php
                }
                    ?>
                </div>
            </div>
        </div>