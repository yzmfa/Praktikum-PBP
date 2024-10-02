<?php
// File     : logout.php
// Deskripsi: untuk logout (menghapus session yang dibuat saat login)
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 18 September 2024

session_start();
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
?>