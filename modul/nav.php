<style>
.navbar {
    background-color: #FFF2DB;
    padding: 5px;
}

.navbar-nav li {
    margin-right: 30px;
}

.nav-item a{
    color: #003092;
    font-size: 15px;
    font-family: biasa;
}

.nav-item a:hover {
    color: #FF9D23;
}

.navbar .btn-md {
    font-family: biasa;
    background-color: #FF9D23;
    color: #003092;
}

.navbar .btn-md:hover {
    font-family: biasa;
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
}
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="asset/img/image11.png" alt="" width="auto" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo isset($_SESSION['id']) ? '?page=koleksi_buku' : 'login.php'; ?>">
                        My Collection   
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="?page=book">Book</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="index.php#blog">Blog</a>
                </li>
            </ul>

            <?php if (isset($_SESSION['id'])): ?>
                <a href="?page=koleksi_pinjam&id_user=<?= $_SESSION['id'] ?>" class="btn btn-md me-2"><i class="bi-archive-fill"></i></a>
                <a href="logout.php" class="btn btn-md">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-md">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>