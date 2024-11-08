<?php
// Mulai session untuk melacak status login
session_start();

// Sertakan file koneksi ke database
require "koneksi.php";

// Inisialisasi variabel untuk pesan error
$error = "";

// Cek jika form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi form
    if (empty($username) || empty($password)) {
        $error = "Username dan Password tidak boleh kosong.";
    } else {
        // Query untuk memeriksa apakah username ada dalam database
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Ambil hasil query
            $stmt->bind_result($id, $stored_username, $hashed_password);
            $stmt->fetch();

            // Debug: tampilkan hash password dari database
            echo "Hash password dari database: " . $hashed_password . "<br>";

            // Verifikasi password
            if (password_verify($password, $hashed_password)) {
                // Password cocok, mulai sesi pengguna
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;

                header("Location: index.php");
                exit();
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Username tidak ditemukan.";
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
    <title>Login - Merchandise Justin Bieber</title>
    <link rel="stylesheet" href="css_login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Merchandise Justin Bieber</h1>
        </div>
    </header>
    <main>
        <section id="login">
            <h2>Login</h2>

            <!-- Tampilkan pesan error jika ada -->
            <?php
            if ($error) {
                echo "<p style='color:red;'>$error</p>";
            }
            ?>

            <form id="loginForm" method="POST" action="login.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
                <p><a href="forgot_password.php">Lupa Kata Sandi?</a></p>
                <p>Belum punya akun? <a href="signup.php">Daftar di sini</a></p>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Beliebers Merchandise</p>
    </footer>
    <script src="scripts.js"></script>
</body>
</html>
