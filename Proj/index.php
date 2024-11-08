<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise Justin Bieber</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Notable&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Underdog&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reenie+Beanie&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Merchandise Justin Bieber</h1>
            <nav>
                <ul>
                    <li><a href="#home"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="shop.php"><i class="fas fa-store"></i> Toko</a></li>
                    <li>
                        <input type="text" id="search" placeholder="Cari...">
                        <button onclick="searchProduct()"><i class="fas fa-search"></i></button>
                    </li>
                    <li class="account-menu">
                        <a href="#" onclick="toggleAccountMenu()"><i class="fas fa-user"></i> Akun</a>
                        <ul class="dropdown" id="accountDropdown">
                            <li><a href="login.php">Masuk</a></li>
                            <li><a href="signup.php">Daftar</a></li>
                        </ul>
                    </li>
                    <!-- Keranjang Belanja -->
                    <li class="cart-menu">
                        <a href="cart.php"><i class="fas fa-shopping-cart"></i> Keranjang</a>
                        <span id="cartCount" class="cart-count">0</span>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="promo-banner">
        <div class="promo-content">
            <h2>Penawaran Eksklusif: Diskon 20% untuk Semua Merchandise!</h2>
            <p>Gunakan kode <strong>JUSTIN20</strong> di checkout. Hanya untuk waktu terbatas!</p>
        </div>
    </section>

    <main>
        <section id="home">
            <h2>Selamat datang di Toko Merchandise Resmi Justin Bieber</h2>
            <p>Dapatkan merchandise Justin Bieber terbaru dan eksklusif di sini!</p>
        </section>

        <section id="shop">
            <h2 class="toko-title">Toko Koleksi Terbaru Kami</h2>
            <div class="product-display">
                <div class="product-item">
                    <img src="media/Peaches.webp" alt="T-Shirt Justin Bieber">
                    <h3>T-Shirt Justin Bieber</h3>
                    <p>Harga: Rp. 499.000</p>
                    <button class="add-to-cart">Tambah ke Keranjang</button>
                </div>
                <div class="product-item">
                    <img src="media/PeachesCrop.webp" alt="Hoodie Justin Bieber">
                    <h3>Hoodie Justin Bieber</h3>
                    <p>Harga: Rp. 749.000</p>
                    <button class="add-to-cart">Tambah ke Keranjang</button>
                </div>
                <div class="product-item">
                    <img src="media/PeachesTank.webp" alt="Topi Justin Bieber">
                    <h3>Topi Justin Bieber</h3>
                    <p>Harga: Rp. 249.000</p>
                    <button class="add-to-cart">Tambah ke Keranjang</button>
                </div>
            </div>
            <button id="nextBtn">Selanjutnya</button>
        </section>


    </main>

    <section id="about-us">
        <div class="video-background">
            <video autoplay muted loop id="video-bg">
                <source src="vidbaru.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="about-us-container">
            <h2>Tentang Kami</h2>
            <p>Kami adalah toko resmi merchandise Justin Bieber, menyediakan berbagai produk eksklusif mulai dari pakaian hingga aksesoris.</p>
            <p>Temukan koleksi merchandise terbaru kami yang hanya tersedia di sini!</p>
        </div>
    </section>
    
    <section id="kritik-saran">
        <div class="kritik-saran-wrapper">
            <h2>Berikan Kritik & Saran Anda</h2>
            <form id="kritikSaranForm" action="kritik_saran.php" method="post">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                
                <div class="form-group">
                    <label for="pesan">Kritik atau Saran</label>
                    <textarea id="pesan" name="pesan" placeholder="Tulis kritik atau saran Anda di sini" required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Kirim</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-section links">
                <h3>Tautan Cepat</h3>
                <ul>
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="shop.php">Toko</a></li>
                    <li><a href="login.php">Masuk</a></li>
                    <li><a href="signup.php">Daftar</a></li>
                </ul>
            </div>
            <div class="footer-section social">
                <h3>Ikuti Kami</h3>
                <p>Terhubung dengan Justin di media sosial!</p>
                <a href="#">Instagram</a> | 
                <a href="#">Twitter</a> | 
                <a href="#">Facebook</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Merchandise Beliebers. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>
