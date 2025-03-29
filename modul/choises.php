<style>
.content-4 {
    margin-top: 200px;
}

.content-4 h2 {
    color: #003092;
    font-family: aes;
    text-align: center;
}

/* 
.content-4 .col-md-3 {
    margin-top: 100px;
}

.content-4 .card {
    width: min-content;
}
.content-4 .card:hover{
    transform: scale(1.1, 1.1);
}

.content-4 .card img {
    width: 200px;
    height: auto;
    border-radius: 5px;
}

.card-title {
    color: #003092;
    font-family: aes;
}

.card-text {
    color: #FF9D23;
    font-size: small;
}

.card a {
    font-family: biasa;
    background-color: #FF9D23;
    color: #003092;
    font-size: 14px;
}

.card a:hover {
    font-family: biasa;
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
} */
.book-card img {
    height: 250px;
    object-fit: cover;
}

.book-card {
    text-align: center;
}
.book-card:hover{
    transform: scale(1.1, 1.1);
}

.price {
    color: #d9534f;
    font-weight: bold;
}
</style>
<div class="content-4" id="categories">
    <div class="container my-5">
        <h2>Recomendation For You</h2>
        <a href="" class="btn btn-danger">View All →</a>
        <div class="row row-cols-1 row-cols-md-4 g-4" style="margin-left: 60px;">
            <?php
                     $sqlReslt = $pdo->prepare("SELECT * FROM tb_buku");
                     $sqlReslt->execute();
                
                while($rowResult = $sqlReslt->fetch(PDO::FETCH_ASSOC)) {
                    ?>

            <div class="col">
                <div class="card book-card">
                    <img src="coverbook/<?=$rowResult['gambar']?>" class="card-img-top" alt="Heartland Stars">
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