<style>
.sidebar {
    width: 285px;
    background: #FFF2DB;
    color: white;
    padding-top: 20px;
    position: fixed;
    height: 100vh;
}

.sidebar ul {
    list-style: none;
    padding: 0;
    margin-top: 50px;
}

.sidebar ul li {
    padding: 12px;
}

.sidebar ul li a {
    color: #003092;
    text-decoration: none;
    display: flex;
    align-items: center;
}

.sidebar ul li a i {
    margin-right: 10px;
}

.sidebar button {
    background-color: #FF9D23;
    color: #003092;
    position: absolute;
    font-size: medium;
    bottom: 10px;
    margin-left: 30px;
    margin-bottom : 10px;
}

.sidebar button:hover {
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
}
</style>
<nav class="sidebar">
    <div class="logo mb-4 mt-4">
        <img src="../../asset/img/image11.png" alt="" width="auto" height="75">
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="pages/databuku.php" class="nav-link active"><i class="bi bi-archive"></i>Data Buku</a>
        </li>
        <li class="nav-item">
            <a href="pages/datapengguna.php" class="nav-link "><i class="bi bi-person-bounding-box"></i>Data
                Pengguna</a>
        </li>
        <li class="nav-item">
            <a href="pages/datapetugas.php" class="nav-link"><i class="bi-person-badge"></i>Tambah Petugas</a>
        </li>
        <li class="nav-item">
            <a href="pages/datapeminjaman.php" class="nav-link"><i class="bi bi-clipboard-data"></i>Riwayat
                Peminjaman</a>
        </li>
        <li class="nav-item">
            <a href="pages/dataulasan.php" class="nav-link"><i class="bi-file-text"></i>Riwayat Ulasan</a>
        </li>
    </ul>

    <button class="btn btn-md">Logout</button>
</nav>