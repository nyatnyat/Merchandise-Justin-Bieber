document.addEventListener('DOMContentLoaded', function() {
    // 2. Sign-up Form
    const signupForm = document.getElementById('signupForm');
    if (signupForm) {
        signupForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const newUsername = document.getElementById('newUsername').value;
            const newPassword = document.getElementById('newPassword').value;

            // Simpan data pengguna ke LocalStorage
            const users = JSON.parse(localStorage.getItem('users')) || [];
            users.push({ username: newUsername, password: newPassword });
            localStorage.setItem('users', JSON.stringify(users));

            alert(`Akun berhasil dibuat untuk ${newUsername}`);
            // Redirect ke halaman login setelah pendaftaran
            window.location.href = "login.php";
        });
    }

    // 3. Produk Merchandise
    const merchandiseItems = [
        { id: 1, name: 'T-Shirt', image: 'tshirt.jpg', price: 20 },
        { id: 2, name: 'Hoodie', image: 'hoodie.jpg', price: 50 },
        { id: 3, name: 'Cap', image: 'cap.jpg', price: 15 }
    ];

    // Menampilkan daftar produk di galeri
    function renderGallery() {
        const gallery = document.getElementById('gallery');
        if (gallery) {
            gallery.innerHTML = ''; // Clear gallery
            merchandiseItems.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'gallery-item';
                itemDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <h3>${item.name}</h3>
                    <p>$${item.price}</p>
                    <button class="order-btn" onclick="orderItem(${item.id})">Order</button>
                    <button class="cancel-btn" onclick="cancelItem(${item.id})">Cancel</button>
                `;
                gallery.appendChild(itemDiv);
            });
        }
    }

    // Order Produk
    window.orderItem = function(itemId) {
        const item = merchandiseItems.find(item => item.id === itemId);
        alert(`Ordered: ${item.name}`);
        // Menambahkan produk ke keranjang belanja atau memperbarui status pesanan
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push(item);
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Cancel Produk
    window.cancelItem = function(itemId) {
        const item = merchandiseItems.find(item => item.id === itemId);
        alert(`Cancelled: ${item.name}`);
        // Menghapus produk dari keranjang atau membatalkan pesanan
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart = cart.filter(cartItem => cartItem.id !== item.id);
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    renderGallery(); // Render the gallery of products

    // 4. Dropdown Menu for account
    const accountMenu = document.querySelector('.account-menu');
    const dropdown = document.querySelector('.dropdown');

    accountMenu.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent event bubbling
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!accountMenu.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    // 5. Menangani klik pada tombol "Tambah ke Keranjang"
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const productItem = event.target.closest('.product-item');
            const productName = productItem.querySelector('h3').textContent;
            const productPrice = productItem.querySelector('p').textContent;

            const product = {
                name: productName,
                price: productPrice
            };

            // Menyimpan produk ke dalam LocalStorage (keranjang belanja)
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push(product);
            localStorage.setItem('cart', JSON.stringify(cart));

            // Memberi pemberitahuan
            alert(`${productName} telah ditambahkan ke keranjang!`);
        });
    });

    // Tombol Selanjutnya
    const nextButton = document.getElementById('nextBtn');
    if (nextButton) {
        nextButton.addEventListener('click', function() {
            window.location.href = 'shop.php';  // Ganti dengan URL halaman shop Anda
        });
    }
});

let cartItems = 0;

// Update jumlah item di keranjang
function updateCartCount() {
    document.getElementById('cartCount').textContent = cartItems;
}

// Menambahkan item ke keranjang
function addToCart() {
    cartItems++;
    updateCartCount();
}

// Simulasikan penambahan barang ke keranjang ketika tombol diklik
const addButtons = document.querySelectorAll('.add-to-cart');
addButtons.forEach(button => {
    button.addEventListener('click', addToCart);
});

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
