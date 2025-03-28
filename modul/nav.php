<style>
.navbar {
    background-color: #FFF2DB;
    padding: 5px;
}

.navbar-nav li {
    margin-right: 30px;
}

.nav-link {
    color: #003092;
    font-size: 15px;
}

.nav-link:hover {
    color: #FF9D23;
}

.navbar button {
    font-family: biasa;
    background-color: #FF9D23;
    color: #003092;
}

.navbar button:hover {
    font-family: biasa;
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
}
</style>

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="asset/img/image11.png" alt="" width="auto" height="70"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=koleksi">My Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=koleksi">Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog</a>
                </li>
            </ul>
            <button class="btn btn-md">Logout</button>
        </div>
    </div>
</nav>