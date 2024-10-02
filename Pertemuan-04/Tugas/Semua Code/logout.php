<?php
// File     : logout.php
// Deskripsi: untuk logout (menghapus session yang dibuat saat login)
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 18 September 2024

session_start(); // Mulai session
// Cek apakah session username ada, jika ada hapus session tersebut
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy(); // Hancurkan semua session
}
// Redirect ke login.php setelah logout
header('Location: login.php');
exit;
?>