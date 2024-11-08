<?php
session_start();

// Cek jika pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Arahkan ke halaman login jika belum login
    exit();
}

require "koneksi.php";  // Pastikan koneksi sudah benar

$user_id = $_SESSION['user_id'];  // Ambil ID pengguna dari session

// Menampilkan pesan sukses atau error
$message = "";

// Handle penambahan produk ke keranjang
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_name']) && isset($_POST['product_price'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        // Cek apakah produk sudah ada di keranjang
        $check_sql = "SELECT * FROM cart WHERE user_id = ? AND product_name = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("is", $user_id, $product_name);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            // Jika produk sudah ada, hanya update jumlah
            $update_sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_name = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("is", $user_id, $product_name);
            if ($update_stmt->execute()) {
                $message = "Jumlah produk berhasil diperbarui!";
            } else {
                $message = "Terjadi kesalahan saat memperbarui jumlah produk.";
            }
        } else {
            // Jika produk belum ada, tambahkan produk baru ke keranjang
            $insert_sql = "INSERT INTO cart (user_id, product_name, product_price, quantity) VALUES (?, ?, ?, 1)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("isii", $user_id, $product_name, $product_price);

            if ($insert_stmt->execute()) {
                $message = "Produk berhasil ditambahkan ke keranjang!";
            } else {
                $message = "Terjadi kesalahan saat menambahkan produk ke keranjang.";
            }
        }
    }
}

// Query untuk menampilkan produk di keranjang
$sql = "SELECT * FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
</head>
<body>
    <h1>Keranjang Belanja Anda</h1>

    <?php if ($message): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>
                    <!-- Tombol untuk menghapus produk dari keranjang -->
                    <form method="POST" action="cart.php">
                        <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_cart">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a href="checkout.php">Lanjutkan ke Pembayaran</a>
    <br>
    <a href="logout.php">Logout</a>

</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
