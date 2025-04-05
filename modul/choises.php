<style>
.content-4 {
    margin-top: 200px;
}

.content-4 h2 {
    color: #003092;
    font-family: aes;
    text-align: center;
}
.card.book-card {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-img-top {
    height: 250px; /* Gambar selalu sama tinggi */
    object-fit: cover;
    width: 100%;
}

.card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 15px;
    text-align: center;
}

.book-card:hover{
    transform: scale(1.05);
}

.price {
    color: #d9534f;
    font-weight: bold;
}
</style>
<div class="content-4" id="categories">
    <div class="container my-5">
        <h2>Recomendation For You</h2>
        <a href="#" class="btn btn-danger">View All →</a>
        <div class="row row-cols-1 row-cols-md-4 g-4" style="margin-left: 60px;">
            <?php
                     $sqlReslt = $pdo->prepare("SELECT * FROM tb_buku");
                     $sqlReslt->execute();
                
                while($rowResult = $sqlReslt->fetch(PDO::FETCH_ASSOC)) {
                    ?>

            <div class="col h-100">
                <div class="card h-100 book-card">
                    <img src="cover_book/<?=$rowResult['gambar_buku']?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?=$rowResult['judul']?></h5>
                        <p class="card-text"><?=$rowResult['penulis']?></p>
                        <a href="#" class="btn btn-danger">View a Book</a>
                    </div>
                </div>
            </div>
            <?php
                }
                    ?>
        </div>
    </div>
  
</div>