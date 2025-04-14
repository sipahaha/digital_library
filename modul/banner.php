<style>
.banner {
    background-color: #FFF2DB;
    height: 500px;
}

.col-lg-6 h2 {
    font-family: aes;
    color: #003092;
}

.text-banner p {
    margin-top: 30px;
    font-family: biasa;
    color: #003092;
}

.col-lg-6 .btn-md {
    margin-top: 20px;
    font-family: biasa;
    background-color: #FF9D23;
    color: #003092;
}

.col-lg-6 .btn-md:hover {
    margin-top: 20px;
    font-family: biasa;
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
}
.text-name{
    color: #003092;
    font-family: biasa; 
}
</style>
<div class="row" id="banner">
    <div class="banner d-flex">
        <div class="col-lg-6" style="margin-top: 65px;">
            <div class="text-banner" style="margin-left: 75px;">
            <?php if (isset($_SESSION['id'])): ?>
                <p class="text-name">Halo, <?= htmlspecialchars($_SESSION['user']); ?></p>
                <?php endif; ?>
                <h2>Welcome to Eterna Libri - <br> Where Knowledge Never Fades </h2>
                <p>Eterna Libri is more than just a digital library. We provide an <br> exclusive, elegant and
                    insightful reading experience. Explore our <br> collection, find new inspiration and join a
                    vibrant literacy community.<br>
                    Start reading today and be part of a limitless literacy journey!</p>
                <a type="button" href="?page=book" class="btn btn-md">Explore Now</a>
            </div>
        </div>
        <div class="col-lg-6" style="margin-top: 20px;">
            <img src="asset/img/image.png" alt="" width="400" height="400" style="margin-left: 120px;">
        </div>
    </div>
</div>