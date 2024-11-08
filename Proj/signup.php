<?php
// Sertakan file koneksi ke database
require "koneksi.php";

// Inisialisasi variabel untuk pesan error dan sukses
$error = "";
$success = "";

// Cek jika form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form registrasi
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi form
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Semua kolom harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Silakan masukkan email yang valid.";
    } elseif ($password !== $confirm_password) {
        $error = "Konfirmasi password tidak sesuai.";
    } else {
        // Periksa apakah email atau username sudah terdaftar
        $sql = "SELECT id FROM users WHERE email = ? OR username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Email atau username sudah terdaftar. Silakan gunakan yang lain.";
        } else {
            // Hash password untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Query untuk menyimpan data ke dalam database
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            // Eksekusi query
            if ($stmt->execute()) {
                // Jika berhasil, arahkan ke halaman login
                header("Location: login.php");
                exit();
            } else {
                $error = "Terjadi kesalahan saat registrasi. Silakan coba lagi.";
            }
        }

        // Tutup statement
        $stmt->close();
    }
}

// Tutup koneksi
$conn->close();
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justin Bieber Merchandise - Sign Up</title>
    <link rel="stylesheet" href="css_signup.css">
</head>
<body>
    <header>
        <div class="logo">Beliebers Merchandise</div>
    </header>
    
    <main>
        <section id="signup">
            <div id="login">
                <h2>Sign Up</h2>
                
                <!-- Tampilkan pesan error atau sukses -->
                <?php if (!empty($error)): ?>
                    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($success)): ?>
                    <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
                <?php endif; ?>

                <form id="signupForm" method="POST" action="signup.php">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    
                    <label>
                        <input type="checkbox" id="terms" name="terms" required>
                        I agree to the <a href="#">terms and conditions</a>
                    </label>
                    
                    <button type="submit">Sign Up</button>
                </form>
                
                <!-- Link kembali ke login -->
                <p>Already have an account? <a href="login.php">Back to Login</a></p>
            </div>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Beliebers Merchandise</p>
    </footer>
</body>
</html>
