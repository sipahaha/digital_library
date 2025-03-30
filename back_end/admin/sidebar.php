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
    padding: 5px;
    
}

.sidebar ul li a {
    color: #003092;
    text-decoration: none;
    display: flex;
    align-items: center;
    font-size: 15px;
}

.sidebar ul li a:hover {
    color: #FF9D23;
}

.sidebar ul li a i {
    margin-right: 10px;
    font-size: 18px;
}

.sidebar .nav-link.active {
    background-color: #003092;
    color:   #FFF2DB;
    border-radius: 5px;
    height: 50px;
}
.sidebar .nav-link.active:hover {
    background-color:  #FF9D23;
    color: #003092;
    border-radius: 5px;
}

.sidebar button {
    background-color: #FF9D23;
    color: #003092;
    position: absolute;
    font-size: medium;
    bottom: 10px;
    margin-left: 30px;
    margin-bottom: 10px;
}

.sidebar button:hover {
    border-style: solid 1px 1px;
    border-color: #FF9D23;
    color: #003092;
}

.dropdown-menu {
    background-color: #FFF2DB;
    color: #003092;

}

.dropdown-menu a:hover {
    background-color: #FFF2DB;
    color: #FF9D23;

}
</style>
<nav class="sidebar">
    <div class="logo mb-4 mt-4">
        <img src="../../asset/img/image11.png" alt="" width="auto" height="75">
    </div>
    <!--<i class="bi bi-archive">-->
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="?page=dashboard" class="nav-link active "><i class="bi-house-door-fill"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="?page=daftar_buku" class="nav-link "><i class="bi-archive"></i>Daftar
                Buku</a>
        </li>
        <li class="nav-item">
            <a href="?page=daftar_kat" class="nav-link "><i class="bi-file-earmark-text"></i></i>Daftar
                Kategori Buku</a>
        </li>
        <li class="nav-item">
            <a href="?page=data_user" class="nav-link "><i class="bi bi-person-bounding-box"></i>Data
                Pengguna</a>
        </li>
        <li class="nav-item">
            <a href="?page=input_petugas" class="nav-link"><i class="bi-person-badge"></i>Tambah Petugas</a>
        </li>
        <li class="nav-item">
            <a href="?page=data_peminjaman" class="nav-link"><i class="bi bi-clipboard-data"></i>Riwayat
                Peminjaman</a>
        </li>
        <li class="nav-item">
            <a href="?page=data_ulasan" class="nav-link"><i class="bi-file-text"></i>Riwayat Ulasan</a>
        </li>
    </ul>

    <button class="btn btn-md">Logout</button>
</nav>