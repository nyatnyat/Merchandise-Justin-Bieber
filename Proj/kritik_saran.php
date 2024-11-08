<?php
// Koneksi ke database
$host = '127.0.0.1';
$db = 'jbmerchant';
$user = 'root'; // Sesuaikan dengan username database Anda
$pass = ''; // Sesuaikan dengan password database Anda

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kritik_saran = $_POST['pesan'];

    // Query untuk menyimpan data ke tabel `kritik`
    $sql = "INSERT INTO kritik (nama, email, kritik_saran) VALUES (:nama, :email, :kritik_saran)";
    $stmt = $conn->prepare($sql);

    // Bind parameter dan eksekusi
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':kritik_saran', $kritik_saran);
    $stmt->execute();

    // Redirect kembali ke halaman utama setelah berhasil
    header("Location: index.php?success=1");
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
