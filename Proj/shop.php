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
    <script>
        // Fungsi untuk menambahkan produk ke keranjang
        function addToCart(productName, productPrice) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push({ name: productName, price: productPrice });
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
        }

        // Fungsi untuk menghapus produk dari keranjang
        function removeFromCart(productName) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart = cart.filter(item => item.name !== productName);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
        }

        // Fungsi untuk memperbarui jumlah item di keranjang
        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            document.getElementById('cart-count').textContent = cart.length;
        }

        // Memperbarui jumlah item di keranjang saat halaman dimuat
        window.onload = function() {
            updateCartCount();
        };
    </script>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Merchandise Justin Bieber</h1>
            <nav>
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i> Beranda</a></li>
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
                    <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Keranjang (<span id="cart-count">0</span>)</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="shop" class="container">
            <h2>Toko</h2>
            <div id="gallery">
                <!-- Produk 1 -->
                <div class="product-item">
                    <img src="media/Peaches.webp" alt="Kaos Justin Bieber">
                    <div class="product-info">
                        <h3>Kaos Tanaman Jeruk Persik</h3>
                        <p class="price">Rp 623.664,00</p>
                        <div class="product-buttons">
                        <form method="POST" action="cart.php">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 2 -->
                <div class="product-item">
                    <img src="media/PeachesCrop.webp" alt="Topi Justin Bieber">
                    <div class="product-info">
                        <h3>TANAMAN PERSIH BIEBER</h3>
                        <p class="price">Rp 623.664,00</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 3 -->
                <div class="product-item">
                    <img src="media/PeachesTank.webp" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>Bralette Tangki Tanaman Persik Putih</h3>
                        <p class="price">Rp 623.664,00</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 4 -->
                <div class="product-item">
                    <img src="merah.avif" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>Hoodie Merah Tur Dunia</h3>
                        <p class="price">Rp 1.169.422,50</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 5 -->
                <div class="product-item">
                    <img src="celana.avif" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>Celana Pendek PE Hijau Persik</h3>
                        <p class="price">Rp 857.560,00</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 6 -->
                <div class="product-item">
                    <img src="baju1.avif" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>KAOS FOTO KEADILAN</h3>
                        <p class="price">Rp 545.894,95</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 7 -->
                <div class="product-item">
                    <img src="PeachesHoodie.avif" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>HOODIE TIE DYE PEACHES</h3>
                        <p class="price">Rp 1.247.831,90</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 8 -->
                <div class="product-item">
                    <img src="topi.avif" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>Beanie Tur Keadilan</h3>
                        <p class="price">Rp 623.959,74</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 9 -->
                <div class="product-item">
                    <img src="FUNNYTEE1.webp" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>KAOS SAYA MERASA LUCU</h3>
                        <p class="price">Rp 545.917,94</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 10 -->
                <div class="product-item">
                    <img src="pinlarge.avif" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>Paket Pin JB</h3>
                        <p class="price">Rp 202.774,00</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 11 -->
                <div class="product-item">
                    <img src="sweatpants3.avif" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>Celana Olahraga Universitas Siapapun</h3>
                        <p class="price">Rp 1.169.942,77</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 12 -->
                <div class="product-item">
                    <img src="JUSTICEKEYCHAIN_46ecb0e6-a110-4591-ba18-a995e806df9e.webp" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>GANTUNGAN KUNCI KEADILAN</h3>
                        <p class="price">Rp 233.984.904,00</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 13 -->
                <div class="product-item">
                    <img src="image_3_932a90e9-96bf-4866-ae63-2cc5b041a19a.webp" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>KAOS JUSTICE TIE DYE</h3>
                        <p class="price">623.950,01</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 14 -->
                <div class="product-item">
                    <img src="BABYBLUE.webp" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>Penutup Wajah Suci</h3>
                        <p class="price">Rp 117.456,00</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>

                <!-- Produk 14 -->
                <div class="product-item">
                    <img src="UPDATEDSORRYTEE.avif" alt="Hoodie Justin Bieber">
                    <div class="product-info">
                        <h3>Tujuan Maaf T-Shirt</h3>
                        <p class="price">Rp 546.061,25</p>
                        <div class="product-buttons">
                            <button class="add-to-cart">Masukkan ke Keranjang</button>
                            <button class="cancel">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p style="text-align: center;">&copy; 2024 Merchandise Beliebers</p>
        </div>
    </footer>
</body>
</html>
